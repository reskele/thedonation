<?php

namespace Database\Seeders;

use App\Models\DonationRequest;
use App\Models\Story;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DonationRequest::where('status', 'approved')->get()->each(function ($request) {
            Story::factory()->create([
                'donation_request_id' => $request->id,
                'recipient_id' => $request->recipient_id,
            ]);
        });
    }
}
