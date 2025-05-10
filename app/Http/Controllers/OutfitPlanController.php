<?php

namespace App\Http\Controllers;

use App\Models\OutfitPlan;
use App\Http\Requests\StoreOutfitPlanRequest;
use App\Http\Requests\UpdateOutfitPlanRequest;
use App\Models\ClothingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutfitPlanController extends Controller
{
    /**
     * List all outfit plans of the current user.
     */
    public function index()
    {
        $outfitPlans = OutfitPlan::with('clothingItems')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('outfit_plans.index', compact('outfitPlans'));
    }

    /**
     * Show form to create a new outfit plan.
     */
    public function create()
    {
        $clothingItems = ClothingItem::where('user_id', Auth::id())->get();
        return view('outfit_plans.create', compact('clothingItems'));
    }

    /**
     * Store a new outfit plan.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'note' => 'required|string|max:255',
            'date' => 'required|date',
            'clothing_item_ids' => 'required|array|min:1',
            'clothing_item_ids.*' => 'exists:clothing_items,id'
        ]);

        $outfitPlan = OutfitPlan::create([
            'user_id' => Auth::id(),
            'note' => $validated['note'],
            'date' => $validated['date'],
        ]);

        $outfitPlan->clothingItems()->attach($validated['clothing_item_ids']);

        return redirect()->route('outfit-plans.index')->with('success', 'Outfit plan created.');
    }

    /**
     * Display a specific outfit plan.
     */
    public function show(OutfitPlan $outfitPlan)
    {
        $this->authorizeUser($outfitPlan);
        return view('outfit_plans.show', compact('outfitPlan'));
    }

    /**
     * Show form to edit the outfit plan.
     */
    public function edit(OutfitPlan $outfitPlan)
    {
        $this->authorizeUser($outfitPlan);

        $clothingItems = ClothingItem::where('user_id', Auth::id())->get();
        return view('outfit_plans.edit', compact('outfitPlan', 'clothingItems'));
    }

    /**
     * Update an existing outfit plan.
     */
    public function update(Request $request, OutfitPlan $outfitPlan)
    {
        $this->authorizeUser($outfitPlan);

        $validated = $request->validate([
            'note' => 'required|string|max:255',
            'date' => 'required|date',
            'clothing_item_ids' => 'required|array|min:1',
            'clothing_item_ids.*' => 'exists:clothing_items,id'
        ]);

        $outfitPlan->update([
            'note' => $validated['note'],
            'date' => $validated['date'],
        ]);

        $outfitPlan->clothingItems()->sync($validated['clothing_item_ids']);

        return redirect()->route('outfit-plans.index')->with('success', 'Outfit plan updated.');
    }

    /**
     * Delete the outfit plan.
     */
    public function destroy(OutfitPlan $outfitPlan)
    {
        $this->authorizeUser($outfitPlan);

        $outfitPlan->clothingItems()->detach();
        $outfitPlan->delete();

        return redirect()->route('outfit-plans.index')->with('success', 'Outfit plan deleted.');
    }

    /**
     * Confirm the current user owns the plan.
     */
    protected function authorizeUser(OutfitPlan $outfitPlan)
    {
        if ($outfitPlan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized.');
        }
    }
}