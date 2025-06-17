<?php

namespace Database\Factories;

use App\Models\DonationPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonationRequest>
 */
class DonationRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'donation_post_id' => DonationPost::factory(), // Random donation post
            'recipient_id' => User::factory(), // Random recipient (user)
            'status' => $this->faker->randomElement(['pending', 'accepted']), // Random status
            'requested_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
