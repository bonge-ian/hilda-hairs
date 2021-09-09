<?php

namespace Tests\Unit\Models;

use App\Models\Color;
use Tests\TestCase;
use App\Models\Size;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Stock;

class ProductVariationTest extends TestCase
{
    public function test_a_variation_has_a_size()
    {
        $v = ProductVariation::factory()->create([
            'product_id' => (Product::factory()->create())->id
        ]);

        $v->size()->associate(Size::factory()->create());

        $this->assertInstanceOf(Size::class, $v->size);
    }

    public function test_a_variation_has_a_color()
    {
        $v = ProductVariation::factory()->create([
            'product_id' => (Product::factory()->create())->id
        ]);

        $v->color()->associate(Color::factory()->create());

        $this->assertInstanceOf(Color::class, $v->color->first());
    }

    public function test_it_has_many_stocks()
    {
        $variation = ProductVariation::factory()->create([
            'product_id' => (Product::factory()->create())->id
        ]);

        $variation->stocks()->save(
            Stock::factory()->make()
        );

        $this->assertInstanceOf(Stock::class, $variation->stocks->first());
    }

    public function test_it_has_stock_info()
    {
        $variation = ProductVariation::factory()->create([
            'product_id' => (Product::factory()->create())->id
        ]);

        $variation->stocks()->save(
            Stock::factory()->make()
        );

        $this->assertInstanceOf(ProductVariation::class, $variation->stock->first());
    }

    public function test_it_has_stock_count_pivot_within_stock_information()
    {
        $variation = ProductVariation::factory()->create([
            'product_id' => (Product::factory()->create())->id
        ]);

        $variation->stocks()->save(
            Stock::factory()->make([
                'quantity' => $quantity = 5
            ])
        );

        $this->assertEquals($variation->stock->first()->pivot->stock, $quantity);
    }

    public function test_it_can_check_if_its_in_stock()
    {
        $variation = ProductVariation::factory()->create([
            'product_id' => (Product::factory()->create())->id
        ]);

        $variation->stocks()->save(
            Stock::factory()->make([
                'quantity' => $quantity = 5
            ])
        );

        $this->assertTrue($variation->inStock());
    }

    public function test_it_can_returns_correct_stock_count()
    {
        $variation = ProductVariation::factory()->create([
            'product_id' => (Product::factory()->create())->id
        ]);

        $variation->stocks()->save(
            Stock::factory()->make([
                'quantity' => $quantity = 5
            ])
        );

        $this->assertEquals($variation->inStock(), $quantity);
    }
}
