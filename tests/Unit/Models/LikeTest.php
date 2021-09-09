<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Like;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class LikeTest extends TestCase
{
    public function test_a_like_belongs_to_a_product()
    {
        $category = Category::factory()->create();
        $like = new Like();
        $like->product()->associate(
            Product::factory()->create([
                'category_id' => $category->id
            ])
        );
        $like->user()->associate(User::factory()->create());
        $like->save();

        $this->assertInstanceOf(Product::class, $like->product);
    }

    public function test_a_like_belongs_to_a_user()
    {
        $category = Category::factory()->create();
        $like = new Like();
        $like->product()->associate(
            Product::factory()->create([
                'category_id' => $category->id
            ])
        );
        $like->user()->associate(User::factory()->create());
        $like->save();

        $this->assertInstanceOf(User::class, $like->user);
    }
}
