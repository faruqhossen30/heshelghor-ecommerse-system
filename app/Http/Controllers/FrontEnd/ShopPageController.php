<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Category;
use App\Models\Product\Product;

class ShopPageController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::with('products')->orderBy('name', 'asc')->get();
        return view('frontend.shoppage', compact('categories'));
    }
    public function productWithCategory(Request $request, $id)
    {
        $categories = Category::with('products')->orderBy('name', 'asc')->get();
        $products = Product::with('brand', 'category', 'subCategory', 'merchant')->where('category_id', $id)->latest('id')->paginate(12);

        // return $products;

        return view('frontend.shoppage', compact('categories', 'products'));
    }
    // Product with Sub-Category

    public function productWithSubCategory(Request $request, $id)
    {
        $categories = Category::with('products')->orderBy('name', 'asc')->get();
        $products = Product::with('brand', 'category', 'subCategory', 'merchant')->where('subcategory_id', $id)->latest('id')->paginate(12);

        // return $products;

        return view('frontend.shoppage', compact('categories', 'products'));
    }
}
