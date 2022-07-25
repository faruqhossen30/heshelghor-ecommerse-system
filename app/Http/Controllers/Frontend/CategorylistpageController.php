<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategorylistpageController extends Controller
{
    public function index()
    {
        // $categories = Category::with('subcategories')->select('id', 'name', 'slug', 'photo')->orderBy('name', 'asc')->get();
        $categories = Cache::rememberForever('categoriesWisthSubcategories', function(){
            return Category::with(['subcategories' => function ($query) {
                return $query->select(['id', 'category_id', 'name', 'slug', 'photo'])->orderBy('name', 'asc');
            }])->select('id', 'name', 'slug', 'photo')->orderBy('name', 'asc')->get();
        });
        // return $categories;
        return view('frontend.categorylist-page', compact('categories'));
    }
}
