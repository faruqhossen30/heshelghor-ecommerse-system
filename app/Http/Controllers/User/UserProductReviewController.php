<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class UserProductReviewController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('user.review.productlist', compact('products'));
    }

    public function reviewproduct()
    {
        return view('user.review.review');
    }
}
