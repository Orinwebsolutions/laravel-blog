<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(25),
            'slug' => $this->faker->slug,
            // 'category_id' => Category::factory(),
            // 'users_id' => User::factory(),
            'category_id' => Category::all()->random()->id,
            'users_id' => User::all()->random()->id,
            'body' => $this->faker->paragraph,
        ];
    }
}
