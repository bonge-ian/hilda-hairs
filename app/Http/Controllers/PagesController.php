<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
    public function __invoke()
    {
        $featuredProducts = Cache::remember(
            'featured-products',
            now()->addHours(12),
            fn () => Product::with('variations.stock')->inRandomOrder()->take(8)->get()
        );

        return view('pages.index')->with('featuredProducts', $featuredProducts);
    }
}
