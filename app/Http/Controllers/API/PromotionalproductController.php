<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class PromotionalproductController extends Controller
{
    public function subcategoryProducts()
    {
        $products = Product::where('category_id', 38)->select('id', 'title', 'regular_price', 'discount', 'price', 'review', 'photo', 'img_small')->paginate(15);

        // return response()->json([
        //     'success' => true,
        //     'code'=>200,
        //     'data' => $products
        // ]);

        return $products;
    }
    public function promotionalProduct()
    {
        $products = Product::take(50)->select('id', 'title', 'regular_price', 'discount', 'price', 'review', 'photo', 'img_small')->inRandomOrder()->paginate(15);
        return $products;
    }
}
