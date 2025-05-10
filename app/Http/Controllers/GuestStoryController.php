<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class GuestStoryController extends Controller
{
    public function story()
    {
        $stories = Story::with('donationRequest.donationPost.clothingItem')
            ->latest()
            ->paginate(6);

        return view('stories', compact('stories'));
    }
}
