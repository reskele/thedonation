<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClothingItem>
 */
class ClothingItemFactory extends Factory
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
            'name' => fake()->word(),
            'category' => fake()->randomElement(['tops', 'bottoms', 'onepiece', 'outerwear','sportswear','sleepwear', 'undergarments','footwear', 'accessories']),
            'condition' => fake()->randomElement(['used', 'new']),
            'size' => fake()->optional()->randomElement(['S', 'M', 'L', 'XL']),
            'color' => fake()->optional()->colorName(),
            'description' => fake()->optional()->text(),
            'image' => null,
            'is_donated' => fake()->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
