<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    protected Category $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = Category::factory()->create();
    }

    public function test_a_category_page_working_if_category_exist()
    {
        $response = $this->get($this->category->url);

        $response->assertStatus(200);
    }

    public function test_a_404_appears_if_category_not_exist()
    {
        $response = $this->get(route('category', ''));

        $response->assertStatus(404);
    }
}
