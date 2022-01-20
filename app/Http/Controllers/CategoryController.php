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
         $category->loadMissing(['children']);

        return view('category.show', compact('category'));
    }
}
