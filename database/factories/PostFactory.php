<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence;

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->paragraph,
            'body' => fake()->paragraph(20),
            'cover_image' => fake()->imageUrl(640, 480, 'animals', true),
            //'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'user_id' => User::whereHas('role', function ($query) {
                $query->where('name', 'auteur');
            })->get()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];
    }
}


