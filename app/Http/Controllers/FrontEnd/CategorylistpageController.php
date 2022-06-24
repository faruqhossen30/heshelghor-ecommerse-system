<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use Illuminate\Http\Request;

class CategorylistpageController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->select('id', 'name', 'slug', 'photo')->get();

        // return $categories;
        return view('frontend.categorylist-page', compact('categories'));
    }
}
