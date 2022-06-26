<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use Illuminate\Http\Request;
use App\Models\Product\Category;
use App\Models\Product\Product;

class ShopPageController extends Controller
{
    public function index(Request $request)
    {
        $price = null;
        if (isset($_GET['price'])) {
            $price = trim($_GET['price']);
        }
        $count = null;
        if (isset($_GET['count'])) {
            $count = trim($_GET['count']);
        }

        $category = null;
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        }
        $type = null;
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        }


        $products = Product::active()->select('id', 'title', 'slug', 'price', 'regular_price', 'discount', 'img_small')
            ->when($price, function ($query, $price) {
                return $query->orderBy('price', $price);
            })
            ->latest()->paginate(20);

        $categories = Category::select('id', 'name', 'slug', 'image')->orderBy('name', 'asc')->get();
        // return $categories;
        return view('frontend.productspage', compact('products', 'categories'));
    }
    public function productWithCategory(Request $request, $id)
    {
        $categories = Category::with('products', 'subcategories')->orderBy('name', 'asc')->get();
        $products = Product::active()->with('brand', 'category', 'subcategory', 'merchant')->where('category_id', $id)->latest('id')->paginate(12);
        $brands = Brand::get();
        // return $brands;


        return view('frontend.shoppage', compact('categories', 'products', 'brands'));
    }
    // Product with Sub-Category

    public function productWithSubCategory(Request $request, $id)
    {
        $categories = Category::with('products', 'subcategories')->orderBy('name', 'asc')->get();
        $products = Product::active()->with('brand', 'category', 'subcategory', 'merchant')->where('subcategory_id', $id)->latest('id')->paginate(12);
        $brands = Brand::get();
        // return $products;

        return view('frontend.shoppage', compact('categories', 'products', 'brands'));
    }
    public function productWithBrand(Request $request, $id)
    {
        $categories = Category::with('products', 'subcategories')->orderBy('name', 'asc')->get();
        $products = Product::active()->with('brand', 'category', 'subcategory', 'merchant')->where('brand_id', $id)->latest('id')->paginate(12);
        $brands = Brand::get();
        // return $products;

        return view('frontend.shoppage', compact('categories', 'products', 'brands'));
    }
    // Product Filter
    public function productFilter(Request $request)
    {
        if ($request->orderby == 'latest') {
            $count = intval($request->count);
            $brands = Brand::get();
            $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
            $products = Product::active()->with('brand', 'category', 'subcategory', 'merchant')->orderBy('id', 'asc')->paginate($count);
            // return $products;
            return view('frontend.shoppage', compact('products', 'categories', 'brands'));
        }
        if ($request->orderby == 'lowtohigh') {
            $count = intval($request->count);
            $brands = Brand::get();
            $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
            $products = Product::active()->with('brand', 'category', 'subcategory', 'merchant')->orderBy('price', 'asc')->paginate($count);
            // return $products;
            return view('frontend.shoppage', compact('products', 'categories', 'brands'));
        }
        if ($request->orderby == 'hightolow') {
            $count = intval($request->count);
            $brands = Brand::get();
            $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
            $products = Product::active()->with('brand', 'category', 'subcategory', 'merchant')->orderBy('price', 'desc')->paginate(5);
            // return $products;
            return view('frontend.shoppage', compact('products', 'categories', 'brands'));
        }
    }
}
