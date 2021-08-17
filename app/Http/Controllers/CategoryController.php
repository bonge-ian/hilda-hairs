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
        return view('category.show')->with('category', $category);
    }
}
