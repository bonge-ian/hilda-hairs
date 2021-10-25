<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index')->with('parentCategories', Category::parents()->get());
    }

    public function show(Category $category)
    {
        $relations = $category->loadMissing(['children', 'products', 'childrenProducts']);

        $categoryProducts = $relations->products->loadMissing('variations.stock');
        $childrenProducts = $relations->childrenProducts->flatMap(
            fn ($child) => $child->products->flatten()
        );

        $products = Cache::remember(
            'category-products',
            now()->addDays(3),
            fn () => $categoryProducts->merge($childrenProducts)
        );

        return view('category.show')->with([
            'category' => $category,
            'products' => $products->paginate(40)
        ]);
    }
}
