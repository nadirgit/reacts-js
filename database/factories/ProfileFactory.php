<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();
        return [
            'bio' => fake()->sentence,
            'website' => fake()->url,
            'avatar' => fake()->imageUrl,
            'user_id' => fake()->unique()->randomElement($userIds),
        ];
    }
}
