<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class PromotionalproductController extends Controller
{
    public function subcategoryProducts()
    {
        $products = Product::where('category_id', 38)->get();

        return response()->json([
            'success' => true,
            'code'=>200,
            'data' => $products
        ]);
    }
}
