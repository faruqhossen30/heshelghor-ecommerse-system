<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Shop;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\Comment;
use App\Models\Product\ProductColor;
use App\Models\Product\ProductImage;
use App\Models\Product\ProductSize;


class SingleProductController extends Controller
{
    public function index(Request $request, $slug)
    {
        $product = Product::with('category', 'subcategory', 'brand', 'shop', 'images', 'colors', 'sizes')->where('slug', $slug)->get()->first();

        $shop = Shop::firstWhere('id', 27);

        // return $shop;
        return view('frontend.singleproduct', compact('product', 'shop'));

        // return view('frontend.singleproduct', compact('product'));
    }



    public function showProduct(Request $request)
    {
        if ($request->ajax()) {
            // $data = Comment::get();
            // $h1 = '<h1>Joson data</h1>';
            $product = Product::where('id', $request->id)->first();

            $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
            $colors = ProductColor::with('color')->where('product_id', $request->id)->get();
            $sizes = ProductSize::with('size')->where('product_id', $request->id)->get();

            $images = ProductImage::where('product_id', $request->id)->get();

            $data = view('frontend.quickview', compact('product', 'images', 'colors', 'sizes'))->render();

            return response()->json($data);
        }
    }
}
