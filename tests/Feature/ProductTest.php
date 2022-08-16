<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    protected Product $product;

    public function setUp(): void
    {
        parent::setUp();
        Brand::factory()->create();
        Category::factory()->create();
        $this->product = Product::factory()->has(Image::factory())->create();
    }

    public function test_a_product_page_working_if_product_exist()
    {
        $response = $this->get($this->product->url);

        $response->assertStatus(200);
    }

    public function test_a_404_appears_if_product_not_exist()
    {
        $response = $this->get(route('product', ''));

        $response->assertStatus(404);
    }
}
