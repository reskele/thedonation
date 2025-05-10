<?php

namespace Database\Factories;

use App\Models\DonationRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'donation_request_id' => DonationRequest::factory(), // Random donation request
            'recipient_id' => User::factory(), // Random recipient (user)
            'content' => $this->faker->paragraph(), // Random content for the story
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
