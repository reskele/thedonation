<?php

namespace Database\Seeders;

use App\Models\DonationPost;
use App\Models\DonationRequest;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role', 'recipient')->get();

        DonationPost::all()->each(function ($post) use ($users) {
            if ($users->isEmpty()) return;
            DonationRequest::factory(5)->create();
        });
    }
}
