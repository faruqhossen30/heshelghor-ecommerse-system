<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\ProductColor;
use App\Models\Product\ProductSize;


class SingleProductController extends Controller
{
    public function index(Request $request, $id)
    {
        $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
        $colors = ProductColor::with('color')->where('product_id', $id)->get();
        $sizes = ProductSize::with('size')->where('product_id', $id)->get();
        $product = Product::with('category', 'subcategory', 'brand', 'merchant')->where('id', $id)->get()->first();
        // return $colors;
        return view('frontend.singleproduct', compact('product', 'colors', 'sizes', 'categories'));
    }
}
