<?php

namespace Database\Seeders;

use App\Models\ClothingItem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClothingItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            ClothingItem::factory(5)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
