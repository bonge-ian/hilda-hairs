<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function show(Product $product)
    {
       $product = $product->loadMissing(['variations.size', 'variations.color', 'variations', 'variations.stock']);

        $relatedProducts = Product::where('category_id', $product->category_id);

        $relatedProducts = Cache::remember(
            'related-products',
            now()->addDay(),
            fn () => Product::where('id', '<>', $product->id)
                ->with(['variations.stock'])
                ->union($relatedProducts)
                ->inRandomOrder()
                ->limit(8)
                ->get()
        );

        return view('products.show')->with([
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'variations' => $product->variations
        ]);
    }
}
