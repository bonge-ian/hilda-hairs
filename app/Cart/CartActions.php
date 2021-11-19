<?php

namespace App\Cart;

use Illuminate\Support\Str;
use App\Models\ProductVariation;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Exceptions\CartAlreadyStoredException;

class CartActions
{
    public static function add(
        ProductVariation $productVariation,
        string $productName,
        int $quantity,
        ?string $coverImage = null,
        ?string $color = null,
        mixed $size = null,
        ?int $stock = null
    )
    {
        if (self::getDuplicates($productVariation)->isNotEmpty()) {
            throw new CartAlreadyStoredException();
        }

        if (is_null($size)) {
            $productVariation->loadMissing(['size']);
        }

        if (is_null($color)) {
            $productVariation->loadMissing(['color']);
        }

        Cart::add([
            'id' => $productVariation->id,
            'name' => $productName,
            'qty' => $quantity,
            'price' => $productVariation->price->amount() / 100,
            'options' => [
                'size' => $size ?? $productVariation->size->name,
                'color' => $color ?? $productVariation->color->name,
                'slug' => Str::slug($productName),
                'cover_image_url' => $coverImage ?? $productVariation->product->cover_image_url,
                'stock' => $stock
            ],
            0
        ])->associate(ProductVariation::class);

    }

    public static function delete($rowId)
    {
        Cart::remove($rowId);
    }

    public static function update(string $rowId, int $quantity)
    {
        return Cart::update($rowId, $quantity);
    }


    private static function getDuplicates(ProductVariation $productVariation)
    {
        return Cart::search(
            fn ($cartItem, $rowId) => $cartItem->id === $productVariation->id
        );
    }
}
