<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body'=>fake()->paragraph(1),
            'valide'=>fake()->boolean(),
            'post_id'=>Post::all()->random()->id,
            'user_id'=>User::whereHas('role',function($query){
                $query->where('name','public');
            })->get()->random()->id,
        ];
    }
}
