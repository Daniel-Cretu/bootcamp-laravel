<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = $this->faker->image('storage/app/public');
        $imageName = pathinfo($image, PATHINFO_FILENAME) . '.' . pathinfo($image, PATHINFO_EXTENSION);
        return [
            'product_id' => Product::factory(),
            'description' => $this->faker->sentence(),
            'image_location' => $imageName
        ];
    }
}
