<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\SubCategory;
use App\Models\Product\Brand;
use Illuminate\Support\Facades\Cache;

class HomepageController extends Controller
{
    public function homePage()
    {

        $categories = Cache::remember('_categories', 60 * 60 * 60, function () {
            return Category::with('products')->orderBy('name', 'asc')->get();
        });

        $subcategories = Cache::remember('_subcategories', 60 * 60 * 60, function () {
            return SubCategory::inRandomOrder()->get();
        });
        $brands = Cache::remember('_brands', 60 * 60 * 60, function () {
            return Brand::latest('id')->get();
        });



        // $categories = Category::with('products')->orderBy('name', 'asc')->get();
        // $subcategories = SubCategory::inRandomOrder()->get();
        // $brands = Brand::latest('id')->get();
        $products = Product::latest('id')->paginate(8);
        // return $categories;


        return view('frontend.homepage', compact(
            'categories',
            'subcategories',
            'brands',
            'products'
        ));
    }
    // Search
    public function search($keyword)
    {

        $result = Product::where('title', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->get();
        return $result;
    }


    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }
}
