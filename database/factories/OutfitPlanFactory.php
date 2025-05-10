<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutfitPlan>
 */
class OutfitPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement([1, 2, 3]), // Assuming user IDs 1, 2, and 3 exist
            'date' => fake()->date(), // Random date
            'note' => fake()->optional()->sentence(), // Optional note
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
