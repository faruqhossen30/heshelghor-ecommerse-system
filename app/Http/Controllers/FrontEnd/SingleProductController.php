<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin\Attribute\Color;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Category;

class SingleProductController extends Controller
{
    public function index(Request $request, $id)
    {
        $categories = Category::orderBy('name', 'asc')->get(); // Send for menu
        $product = Product::with('category', 'subcategory', 'brand', 'merchant')->where('id', $id)->get()->first();



        // return $product;
        return view('frontend.singleproduct', compact('product', 'categories', ));
    }
}
