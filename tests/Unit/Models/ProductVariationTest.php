<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Color;
use Tests\TestCase;
use App\Models\Size;
use App\Models\Product;
use App\Models\ProductVariation;

class ProductVariationTest extends TestCase
{
    public function test_a_variation_has_a_size()
    {
        $v = ProductVariation::factory()->create();

        $v->size()->associate(Size::factory()->create());

        $this->assertInstanceOf(Size::class, $v->size);
    }

    public function test_a_variation_has_a_color()
    {
        $v = ProductVariation::factory()->create();

        $v->color()->associate(Color::factory()->create());

        $this->assertInstanceOf(Color::class, $v->color->first());
    }
}
