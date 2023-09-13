<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            // 'user_id'=>User::all()->random()->id,
            'category_id'=>Category::all()->random()->id,
            'title'=>fake()->paragraph(3,true),
            'subTitle'=>fake()->paragraph(10,true),
            'descriptions'=>fake()->paragraph(50,true),
            'image'=>'noimage.jpg',
        ];
    }
}
