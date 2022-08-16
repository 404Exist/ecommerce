<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::factory(10)->has(Image::factory(4))->create();
    }
}
