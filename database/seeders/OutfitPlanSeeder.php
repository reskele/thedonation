<?php

namespace Database\Seeders;

use App\Models\OutfitPlan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutfitPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            OutfitPlan::factory(2)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
