<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use App\Models\Product\Comment;
use App\Models\Product\Product;
use App\Models\Product\ProductColor;
use App\Models\Product\ProductImage;
use App\Models\Product\ProductSize;
use Illuminate\Http\Request;

class ProductQuickViewController extends Controller
{
    public function quickView($id)
    {
        $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
        $colors = ProductColor::with('color')->where('product_id', $id)->get();
        $sizes = ProductSize::with('size')->where('product_id', $id)->get();
        $comments = Comment::with('user')->where('product_id', $id)->orderBy('id', 'desc')->get();

        $sliders = ProductImage::where('product_id', $id)->get();

        $product = Product::with('category', 'subcategory', 'brand', 'merchant', 'images')->where('id', $id)->get()->first();

        return "ok";
    }
}
