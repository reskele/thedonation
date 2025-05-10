<?php

namespace Database\Seeders;

use App\Models\ClothingItem;
use App\Models\DonationPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClothingItem::all()->each(function ($item) {
            DonationPost::factory()->create([
                'clothing_item_id' => $item->id,
                'donor_id' => $item->user_id,
            ]);
        });
    }
}
