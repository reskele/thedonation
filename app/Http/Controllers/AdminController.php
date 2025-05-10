<?php

namespace App\Http\Controllers;

use App\Models\DonationPost;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function donationPosts()
    {
        $donationPosts = DonationPost::with('clothingItem')
            ->latest()
            ->paginate(10);

        return view('admin.donations', compact('donationPosts'));
    }

    public function donationRequests()
    {
        $donationRequests = DonationRequest::with('donationPost.clothingItem')
            ->latest()
            ->paginate(10);

        return view('admin.requests', compact('donationRequests'));
    }

}
