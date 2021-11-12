<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use Illuminate\Http\Request;
use App\Models\Product\Category;
use App\Models\Product\Product;

class ShopPageController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::get();
        $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
        $products = Product::with('brand', 'category', 'subcategory', 'merchant')->latest('id')->paginate(12);

        // return $products;

        return view('frontend.shoppage', compact('categories', 'products', 'brands'));
    }
    public function productWithCategory(Request $request, $id)
    {
        $categories = Category::with('products', 'subcategorylist')->orderBy('name', 'asc')->get();
        $products = Product::with('brand', 'category', 'subcategory', 'merchant')->where('category_id', $id)->latest('id')->paginate(12);
        $brands = Brand::get();
        // return $brands;


        return view('frontend.shoppage', compact('categories', 'products','brands'));
    }
    // Product with Sub-Category

    public function productWithSubCategory(Request $request, $id)
    {
        $categories = Category::with('products', 'subcategorylist')->orderBy('name', 'asc')->get();
        $products = Product::with('brand', 'category', 'subcategory', 'merchant')->where('subcategory_id', $id)->latest('id')->paginate(12);
        $brands = Brand::get();
        // return $products;

        return view('frontend.shoppage', compact('categories', 'products', 'brands'));
    }
}
