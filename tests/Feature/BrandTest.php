<?php

namespace Tests\Feature;

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BrandTest extends TestCase
{
    use RefreshDatabase;

    protected Brand $brand;

    public function setUp(): void
    {
        parent::setUp();
        $this->brand = Brand::factory()->create();
    }

    public function test_a_brand_page_working_if_brand_exist()
    {
        $response = $this->get($this->brand->url);

        $response->assertStatus(200);
    }

    public function test_a_404_appears_if_brand_not_exist()
    {
        $response = $this->get(route('brand', ''));

        $response->assertStatus(404);
    }
}
