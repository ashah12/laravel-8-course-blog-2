<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'thumbnail' => 'thumbnails/hpxRMEAcTJnhMTtDoupDafPXyR9BVHUv0xjYCUOO.jpg',
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->sentence,
            'body' => $this->faker->paragraphs(nb: 3, asText: true)
        ];
    }
}
