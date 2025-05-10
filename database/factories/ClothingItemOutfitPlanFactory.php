<?php

namespace Database\Factories;

use App\Models\ClothingItem;
use App\Models\OutfitPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClothingItemOutfitPlan>
 */
class ClothingItemOutfitPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'clothing_item_id' => ClothingItem::factory(), // Random clothing item
            'outfit_plan_id' => OutfitPlan::factory(), // Random outfit plan
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
