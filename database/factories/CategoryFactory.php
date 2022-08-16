<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'title' => ['en' => $this->faker->name, 'ar' => $fakerAR->name],
            'image' => $this->faker->imageUrl(800, 600),
        ];
    }
}
