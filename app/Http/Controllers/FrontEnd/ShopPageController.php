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


        return view('frontend.shoppage', compact('categories', 'products', 'brands'));
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
    public function productWithBrand(Request $request, $id)
    {
        $categories = Category::with('products', 'subcategorylist')->orderBy('name', 'asc')->get();
        $products = Product::with('brand', 'category', 'subcategory', 'merchant')->where('brand_id', $id)->latest('id')->paginate(12);
        $brands = Brand::get();
        // return $products;

        return view('frontend.shoppage', compact('categories', 'products', 'brands'));
    }
    // Product Filter
    public function productFilter(Request $request)
    {
        // return $request->all();
        if ($request->orderby == 'latest') {
            $brands = Brand::get();
            $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
            $products = Product::with('brand', 'category', 'subcategory', 'merchant')->orderBy('id', 'asc')->paginate(5);
            // return $products;
            return view('frontend.shoppage', compact('products', 'categories', 'brands'));
        }
        if ($request->orderby == 'lowtohigh') {
            $brands = Brand::get();
            $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
            $products = Product::with('brand', 'category', 'subcategory', 'merchant')->orderBy('price', 'asc')->paginate(5);
            // return $products;
            return view('frontend.shoppage', compact('products', 'categories', 'brands'));
        }
        if ($request->orderby == 'hightolow') {
            $brands = Brand::get();
            $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
            $products = Product::with('brand', 'category', 'subcategory', 'merchant')->orderBy('price', 'desc')->paginate(5);
            // return $products;
            return view('frontend.shoppage', compact('products', 'categories', 'brands'));
        }
    }
}
