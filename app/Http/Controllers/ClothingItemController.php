<?php

namespace App\Http\Controllers;

use App\Models\ClothingItem;
use App\Http\Requests\StoreClothingItemRequest;
use App\Http\Requests\UpdateClothingItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClothingItemController extends Controller
{
    /**
     * Display a listing of the user's clothing items.
     */
    public function index()
    {
        $clothingItems = ClothingItem::where('user_id', Auth::id())->latest()->paginate(10);
        return view('clothing_items.index', compact('clothingItems'));
    }

    /**
     * Show the form for creating a new clothing item.
     */
    public function create()
    {
        return view('clothing_items.create');
    }

    /**
     * Store a newly created clothing item.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:tops,bottoms,onepiece,outerwear,sportswear,sleepwear,undergarments,footwear,accessories',
            'color' => 'nullable|string|max:100',
            'size' => 'nullable|string|max:50',
            'brand' => 'nullable|string|max:100',
            'condition' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048', // 2MB max
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('clothing_images', 'public');
        }

        $validated['user_id'] = Auth::id();

        ClothingItem::create($validated);

        return redirect()->route('clothing-items.index')->with('success', 'Clothing item added successfully.');
    }

    /**
     * Display the specified clothing item.
     */
    public function show(ClothingItem $clothingItem)
    {
        $this->authorizeOwner($clothingItem);

        return view('clothing_items.show', compact('clothingItem'));
    }

    /**
     * Show the form for editing a clothing item.
     */
    public function edit(ClothingItem $clothingItem)
    {
        $this->authorizeOwner($clothingItem);

        return view('clothing_items.edit', compact('clothingItem'));
    }

    /**
     * Update the specified clothing item.
     */
    public function update(Request $request, ClothingItem $clothingItem)
    {
        $this->authorizeOwner($clothingItem);

        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'color' => 'nullable|string|max:100',
            'size' => 'nullable|string|max:50',
            'brand' => 'nullable|string|max:100',
            'condition' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($clothingItem->image) {
                Storage::disk('public')->delete($clothingItem->image);
            }
            $validated['image'] = $request->file('image')->store('clothing_images', 'public');
        }

        $clothingItem->update($validated);

        return redirect()->route('clothing-items.index')->with('success', 'Clothing item updated.');
    }

    /**
     * Remove the specified clothing item.
     */
    public function destroy(ClothingItem $clothingItem)
    {
        $this->authorizeOwner($clothingItem);

        if ($clothingItem->image) {
            Storage::disk('public')->delete($clothingItem->image);
        }

        $clothingItem->delete();

        return redirect()->route('clothing-items.index')->with('success', 'Clothing item deleted.');
    }

    /**
     * Ensure the current user owns the item.
     */
    protected function authorizeOwner(ClothingItem $clothingItem)
    {
        if ($clothingItem->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}