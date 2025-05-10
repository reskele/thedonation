<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Http\Requests\StoreStoryRequest;
use App\Http\Requests\UpdateStoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stories = Story::with('donationRequest.donationPost.clothingItem')
            ->where('recipient_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $donationRequests = Auth::user()->donationRequests()->where('status', 'donated')->get();
        return view('stories.create', compact('donationRequests'));
    }

    /**
     * Store a newly created story in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'donation_request_id' => 'required|exists:donation_requests,id',
            'content' => 'required|string|max:1000',
        ]);

        $donationRequest = Auth::user()->donationRequests()->findOrFail($validated['donation_request_id']);

        if ($donationRequest->status !== 'donated') {
            return back()->withErrors(['donation_request_id' => 'This donation request has not been fulfilled yet.']);
        }

        Story::create([
            'recipient_id' => Auth::id(),
            'donation_request_id' => $validated['donation_request_id'],
            'story' => $validated['story'],
        ]);

        return redirect()->route('stories.index')->with('success', 'Thank you story submitted.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        $this->authorizeRecipient($story);
        return view('stories.show', compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
        $this->authorizeRecipient($story);
        return view('stories.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Story $story)
    {
        $this->authorizeRecipient($story);

        $validated = $request->validate([
            'story' => 'required|string|max:1000',
        ]);

        $story->update([
            'story' => $validated['story'],
        ]);

        return redirect()->route('stories.index')->with('success', 'Story updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
        $this->authorizeRecipient($story);
        $story->delete();

        return redirect()->route('stories.index')->with('success', 'Story deleted.');
    }

    /**
     * Ensure the logged-in user is the recipient of the story.
     */
    protected function authorizeRecipient(Story $story)
    {
        if ($story->recipient_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}