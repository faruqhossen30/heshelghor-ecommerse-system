<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Option;

class ProductpromotionController extends Controller
{
    public function index()
    {
        $products = Product::with(['shop' => function ($query) {
            return $query->select(['id', 'name']);
        }])->select('id', 'title', 'shop_id')->latest()->get();

        // return $products;
        $promotion_products = option('promotion_products');

        return view('admin.promotion.productpromotion', compact('products' , 'promotion_products'));
    }

    public function store(Request $request)
    {
        // return $request->all();

        option(['promotion_products'=> $request->product_id]);

        return redirect()->route('productpromotion');
    }
}
