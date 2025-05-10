<?php

namespace App\Http\Controllers;

use App\Models\DonationRequest;
use App\Http\Requests\StoreDonationRequestRequest;
use App\Http\Requests\UpdateDonationRequestRequest;
use App\Models\DonationPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationRequestController extends Controller
{
    /**
     * List all requests made by the current recipient.
     */
    public function index()
    {
        $donationRequests = DonationRequest::with('donationPost.clothingItem')
            ->where('recipient_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('donation_requests.index', compact('donationRequests'));
    }

    /**
     * Show form to request a donation post.
     */
    public function create()
    {
        // Only show available posts not yet requested by user
        $availablePosts = DonationPost::where('status', 'available')
            ->whereDoesntHave('requests', function ($query) {
                $query->where('recipient_id', Auth::id());
            })
            ->with('clothingItem')
            ->latest()
            ->get();

        return view('donation_requests.create', compact('availablePosts'));
    }

    /**
     * Store a new donation request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'donation_post_id' => 'required|exists:donation_posts,id',
        ]);

        $donationPost = DonationPost::findOrFail($validated['donation_post_id']);

        if ($donationPost->status !== 'available') {
            return back()->withErrors(['donation_post_id' => 'This item is no longer available.']);
        }

        $alreadyRequested = DonationRequest::where('donation_post_id', $donationPost->id)
            ->where('recipient_id', Auth::id())
            ->exists();

        if ($alreadyRequested) {
            return back()->withErrors(['donation_post_id' => 'You already requested this item.']);
        }

        DonationRequest::create([
            'donation_post_id' => $donationPost->id,
            'recipient_id' => Auth::id(),
            'status' => 'pending',
            'requested_at' => now(),
        ]);

        return redirect()->route('donation-requests.index')->with('success', 'Donation request submitted.');
    }

    /**
     * Show a single request.
     */
    public function show(DonationRequest $donationRequest)
    {
        $this->authorizeRecipient($donationRequest);

        return view('donation_requests.show', compact('donationRequest'));
    }

    /**
     * Deleting a request (maybe user changed their mind).
     */
    public function destroy(DonationRequest $donationRequest)
    {
        $this->authorizeRecipient($donationRequest);

        if ($donationRequest->status !== 'pending') {
            return back()->withErrors(['error' => 'You can only delete pending requests.']);
        }

        $donationRequest->delete();

        return redirect()->route('donation-requests.index')->with('success', 'Request deleted.');
    }

    /**
     * Ensure the logged-in user is the owner (recipient).
     */
    protected function authorizeRecipient(DonationRequest $donationRequest)
    {
        if ($donationRequest->recipient_id !== Auth::id()) {
            abort(403, 'Unauthorized.');
        }
    }
}