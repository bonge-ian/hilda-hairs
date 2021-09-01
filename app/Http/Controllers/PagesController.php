<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
    public function index()
    {
        $featuredProducts = Cache::remember(
            'featured-products',
            now()->addHours(12),
            fn () => Product::inRandomOrder()->take(8)->get()
        );

        return view('pages.index')->with('featuredProducts', $featuredProducts);
    }
}
