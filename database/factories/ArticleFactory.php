<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use PharIo\Manifest\Author;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'author_id' => User::factory(),
            'image' => $this->faker->image('storage/app/public'),
            'published_at' => $this->faker->dateTime(),
            'excerpt' => $this->faker->sentence(),
            'blog_category_id' => BlogCategory::factory(),
            'seo_title' => $this->faker->sentence(),
            'seo_description' => $this->faker->sentence(),
        ];
    }
}
