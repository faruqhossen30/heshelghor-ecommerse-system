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
        $products = Product::with('brand', 'category', 'subcategory', 'merchant')->latest('id')->paginate(20);

        $filter_location = [];
        $filter_category = [];
        $filter_brand = [];
        $orderby = null;
        $count = null;


        if (isset($_GET['location'])) {
            $filter_location = $_GET['location'];
        }

        if (isset($_GET['category'])) {
            $filter_category = $_GET['category'];
        }

        if (isset($_GET['brand'])) {
            $filter_brand = $_GET['brand'];
        }

        if (isset($_GET['orderby'])) {

            if($_GET['orderby'] == 'lowtohigh'){
                $orderby = 'asc';
            }
            if($_GET['orderby'] == 'hightolow'){
                $orderby = 'desc';
            }

        }
        if (isset($_GET['count'])) {
            $count = $_GET['count'];
        }



        $products = Product::with('category', 'subcategory')
        ->when($filter_category, function ($query, $filter_category) {
            return $query->whereIn('category_id', $filter_category);
        })
        ->when($filter_brand, function ($query, $filter_brand) {
            return $query->whereIn('brand_id', $filter_brand);
        })
        ->when($orderby, function ($query, $orderby) {
            return $query->orderBy('price', $orderby);
        })
        ->paginate($count ?? 20);


        return view('frontend.shoppage', compact('categories', 'products', 'brands'));
    }
    public function productWithCategory(Request $request, $id)
    {
        $categories = Category::with('products', 'subcategories')->orderBy('name', 'asc')->get();
        $products = Product::with('brand', 'category', 'subcategory', 'merchant')->where('category_id', $id)->latest('id')->paginate(12);
        $brands = Brand::get();
        // return $brands;


        return view('frontend.shoppage', compact('categories', 'products', 'brands'));
    }
    // Product with Sub-Category

    public function productWithSubCategory(Request $request, $id)
    {
        $categories = Category::with('products', 'subcategories')->orderBy('name', 'asc')->get();
        $products = Product::with('brand', 'category', 'subcategory', 'merchant')->where('subcategory_id', $id)->latest('id')->paginate(12);
        $brands = Brand::get();
        // return $products;

        return view('frontend.shoppage', compact('categories', 'products', 'brands'));
    }
    public function productWithBrand(Request $request, $id)
    {
        $categories = Category::with('products', 'subcategories')->orderBy('name', 'asc')->get();
        $products = Product::with('brand', 'category', 'subcategory', 'merchant')->where('brand_id', $id)->latest('id')->paginate(12);
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
            $products = Product::with('brand', 'category', 'subcategory', 'merchant')->orderBy('id', 'asc')->paginate($count);
            // return $products;
            return view('frontend.shoppage', compact('products', 'categories', 'brands'));
        }
        if ($request->orderby == 'lowtohigh') {
            $count = intval($request->count);
            $brands = Brand::get();
            $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
            $products = Product::with('brand', 'category', 'subcategory', 'merchant')->orderBy('price', 'asc')->paginate($count);
            // return $products;
            return view('frontend.shoppage', compact('products', 'categories', 'brands'));
        }
        if ($request->orderby == 'hightolow') {
            $count = intval($request->count);
            $brands = Brand::get();
            $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
            $products = Product::with('brand', 'category', 'subcategory', 'merchant')->orderBy('price', 'desc')->paginate(5);
            // return $products;
            return view('frontend.shoppage', compact('products', 'categories', 'brands'));
        }
    }
}
