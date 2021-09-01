<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    public function test_a_category_has_children()
    {
        $category = Category::factory()->create();

        $category->children()->save(
            Category::factory()->create()
        );

        $this->assertInstanceOf(Category::class, $category->children->first());
    }

    public function test_it_can_fetch_only_parents()
    {
        $category = Category::factory()->create();

        $category->children()->save(
            Category::factory()->create()
        );

        $this->assertEquals(1, Category::parents()->count());
    }

    public function test_a_category_is_orderable()
    {
        $cat1 = Category::factory()->create(['order' => 2]);
        $cat2 = Category::factory()->create(['order' => 1]);

        $this->assertEquals($cat2->name, Category::ordered()->first()->name);
    }
}
