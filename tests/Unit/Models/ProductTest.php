<?php

namespace Tests\Unit\Models;

use App\Cart\Money;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Size;
use Symfony\Component\Process\Process;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_a_product_belongs_to_a_category()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create([
            'category_id' => $category->id
        ]);

        $this->assertInstanceOf(Category::class, $product->category->first());
    }

    public function test_it_returns_a_money_instance_for_the_price()
    {
        $product = Product::factory()->create(['category_id' => Category::factory()->create()->id]);

        $this->assertInstanceOf(Money::class, $product->price);
    }
    public function test_it_returns_a_formatted_price()
    {
        $product = Product::factory()->create([
            'category_id' => Category::factory()->create()->id,
            'price' => 1000
        ]);

        $this->assertEquals($product->formattedPrice, 'Ksh 10.00');
    }

    public function test_a_product_has_many_variations()
    {
        $product = Product::factory()->create([
            'category_id' => Category::factory()->create()
        ]);

        $product->variations()->save(
            ProductVariation::factory()->create()
        );

        $this->assertInstanceOf(ProductVariation::class, $product->variations->first());
    }
}
