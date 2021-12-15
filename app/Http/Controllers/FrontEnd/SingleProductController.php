<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\Comment;
use App\Models\Product\ProductColor;
use App\Models\Product\ProductImage;
use App\Models\Product\ProductSize;


class SingleProductController extends Controller
{
    public function index(Request $request, $id)
    {
        $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
        $colors = ProductColor::with('color')->where('product_id', $id)->get();
        $sizes = ProductSize::with('size')->where('product_id', $id)->get();
        $comments = Comment::with('user')->where('product_id', $id)->orderBy('id', 'desc')->get();


        $product = Product::with('category', 'subcategory', 'brand', 'merchant', 'images')->where('id', $id)->get()->first();
        // return $comments;
        return view('frontend.singleproduct', compact('product', 'colors', 'sizes', 'categories', 'comments'));
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
