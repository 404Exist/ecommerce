<?php

namespace Database\Factories;

use App\Enums\ProductStatuses;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fakerAR = \Faker\Factory::create('ar_SA');

        return [
            'brand_id' => Brand::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'title' => ['en' => $this->faker->name, 'ar' => $fakerAR->name],
            'image' => $this->faker->imageUrl(800, 600),
            'selling_price' => $this->faker->numberBetween(1000, 10000),
            'discount_price' => $this->faker->numberBetween(0, 999),
            'stock' => $this->faker->numberBetween(0, 100),
            'status' => ProductStatuses::PUBLISHED->value,
            'short_description' => $this->faker->sentence,
            'description' => $this->faker->paragraph(),
            'discount_for' => now()->addDays(30),
        ];
    }
}
