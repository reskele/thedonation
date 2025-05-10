<?php

namespace Database\Seeders;

use App\Models\ClothingItem;
use App\Models\OutfitPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClothingItemOutfitPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clothingItems = ClothingItem::all();
        $outfitPlans = OutfitPlan::all();

        // Create 20 random pivot entries
        for ($i = 0; $i < 20; $i++) {
            $item = $clothingItems->random();
            $plan = $outfitPlans->random();

            DB::table('clothing_item_outfit_plan')->insert([
                'clothing_item_id' => $item->id,
                'outfit_plan_id' => $plan->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
