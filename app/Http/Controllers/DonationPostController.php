<?php

namespace App\Http\Controllers;

use App\Models\DonationPost;
use App\Http\Requests\StoreDonationPostRequest;
use App\Http\Requests\UpdateDonationPostRequest;
use App\Models\ClothingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationPostController extends Controller
{
    /**
     * Show all donation posts by current donor.
     */
    public function index()
    {
        $donationPosts = DonationPost::with('clothingItem')
            ->where('donor_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('donation_posts.index', compact('donationPosts'));
    }

    /**
     * Show form to create a new donation post.
     */
    public function create()
    {
        // Only show clothing items that are not already posted
        $clothingItems = ClothingItem::where('user_id', Auth::id())
        ->where('is_donated', 0)
        ->get();
        return view('donation_posts.create', compact('clothingItems'));
    }

    /**
     * Store a new donation post.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'clothing_item_id' => 'required|exists:clothing_items,id',
            'description' => 'nullable|string|max:2000', // 400 words ~ 2000 chars
            'gender' => 'required|in:male,female,other',
            'region' => 'required|string|max:30',
            'contacts' => 'required|string|max:255',
        ]);

        $clothingItem = ClothingItem::findOrFail($validated['clothing_item_id']);

        if ($clothingItem->user_id !== Auth::id()) {
            return back()->withErrors(['clothing_item_id' => 'You do not own this clothing item.']);
        }

        DonationPost::create([
            'clothing_item_id' => $clothingItem->id,
            'donor_id' => Auth::id(),
            'status' => 'available',
           'gender' => $validated['gender'],      
           'description' => $validated['description'],      
           'region' => $validated['region'],      
           'contacts' => $validated['contacts'],
        ]);

        return redirect()->route('donation-posts.index')->with('success', 'Donation post created.');
    }

    /**
     * Show a single donation post.
     */
    public function show(DonationPost $donationPost)
    {
        $this->authorizeDonor($donationPost);
        $donationPost->load('clothingItem');
        return view('donation_posts.show', compact('donationPost'));
    }

    /**
     * Show the form for editing a post.
     */
    public function edit(DonationPost $donationPost)
    {
        $this->authorizeDonor($donationPost);

        $clothingItems = ClothingItem::where('user_id', Auth::id())
            ->get();

        return view('donation_posts.edit', compact('donationPost', 'clothingItems'));
    }

    /**
     * Update an existing post.
     */
    public function update(Request $request, DonationPost $donationPost)
    {
        $this->authorizeDonor($donationPost);

        $validated = $request->validate([
            'clothing_item_id' => 'required|exists:clothing_items,id',
            'status' => 'required|in:available,pending,donated',
        ]);

        $clothingItem = ClothingItem::findOrFail($validated['clothing_item_id']);

        if ($clothingItem->user_id !== Auth::id()) {
            return back()->withErrors(['clothing_item_id' => 'You do not own this clothing item.']);
        }

        $donationPost->update([
            'clothing_item_id' => $validated['clothing_item_id'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('donation-posts.index')->with('success', 'Donation post updated.');
    }

    /**
     * Delete a donation post.
     */
    public function destroy(DonationPost $donationPost)
    {
        $this->authorizeDonor($donationPost);
        $donationPost->delete();

        return redirect()->route('donation-posts.index')->with('success', 'Donation post deleted.');
    }

    /**
     * Ensure the current user is the post's donor.
     */
    protected function authorizeDonor(DonationPost $donationPost)
    {
        if ($donationPost->donor_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Accept a donation request.
     */
    public function acceptRequest($id)
    {
        $donationPost = DonationPost::findOrFail($id);

        // Find the related request (assuming one-to-one for simplicity)
        $request = $donationPost->requests()->where('status', 'pending')->first();

        if ($request) {
            $request->status = 'accepted';
            $request->save();
        }

        $donationPost->status = 'donated';
        $donationPost->save();

        return redirect()->back()->with('success', 'Donation accepted and marked as donated.');
    }
}