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

        // $categories = Cache::rememberForever('categories', function () {
        //     return Category::with('products')->orderBy('name', 'asc')->get();
        // });

        // $subcategories = Cache::rememberForever('subcategories', function () {
        //     return SubCategory::inRandomOrder()->get();
        // });
        // $brands = Cache::rememberForever('brands', function () {
        //     return Brand::latest('id')->get();
        // });
        // $products = Cache::rememberForever('products', function () {
        //     return Product::latest('id')->paginate(8);
        // });



        $categories = Category::with('products')->orderBy('name', 'asc')->get();
        $subcategories = SubCategory::get()->random(10);
        $brands = Brand::get()->random(10);


        $products = Product::latest('id')->paginate(8);
        // return $brands;


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
