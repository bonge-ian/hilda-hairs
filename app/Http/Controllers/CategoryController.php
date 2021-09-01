<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index')->with('parentCategories', Category::parents()->get());
    }

    public function show(Category $category)
    {
        $relations = $category->loadMissing(['children', 'products', 'childrenProducts']);

        $categoryProducts = $relations->products;
        $childrenProducts = $relations->childrenProducts->flatMap(
            fn ($child) => $child->products->flatten()
        );

        $products = $categoryProducts->merge($childrenProducts);

        return view('category.show')->with([
            'category' => $category,
            'products' => $products->paginate(15)
        ]);
    }

}
