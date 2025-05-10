<?php

namespace Database\Factories;

use App\Models\ClothingItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonationPost>
 */
class DonationPostFactory extends Factory
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
            'donor_id' => User::factory(), // Random donor (user)
            'status' => $this->faker->randomElement(['available', 'claimed', 'closed']), // Random status
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
