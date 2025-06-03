<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Story;
use App\Models\DonationRequest;
use App\Models\ClothingItem;
use App\Models\OutfitPlan;
use App\Models\DonationPost;

class DashboardController extends Controller
{
    public function admin()
    {
        $usersCount = User::count();
        $requestsCount = DonationRequest::count();
        $donationPostsCount = DonationPost::count();
        $clothesCount = ClothingItem::count();
        $outfitPlansCount = OutfitPlan::count();

        return view('dashboards.admin', compact(
            'usersCount',
            'requestsCount',
            'donationPostsCount',
            'clothesCount',
            'outfitPlansCount'
        ));
    }

    public function donor()
    {
        $userId = Auth::id();
        $donationPostsCount = DonationPost::where('donor_id', $userId)->count();
        $clothesCount = ClothingItem::where('user_id', $userId)->count();
        $outfitPlansCount = OutfitPlan::where('user_id', $userId)->count();

        return view('dashboards.donor', compact(
            'donationPostsCount',
            'clothesCount',
            'outfitPlansCount'
        ));
    }

    public function recipient()
    {
        $userId = Auth::id();
        $storiesCount = Story::where('recipient_id', $userId)->count();
        $requestsCount = DonationRequest::where('recipient_id', $userId)->count();
        $clothesCount = ClothingItem::where('user_id', $userId)->count();
        $outfitPlansCount = OutfitPlan::where('user_id', $userId)->count();

        return view('dashboards.recipient', compact(
            'storiesCount',
            'requestsCount',
            'clothesCount',
            'outfitPlansCount'
        ));
    }
}