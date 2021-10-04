<?php

namespace App\Http\Controllers\FrontEnd;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\Brand;

class HomepageController extends Controller
{
    public function homePage()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $brands = Brand::latest('id')->get();
        $products = Product::latest('id')->paginate(8);
        // return $products;


        return view('frontend.homepage', compact(
            'categories',
            'brands',
            'products'
        ));
    }
}
