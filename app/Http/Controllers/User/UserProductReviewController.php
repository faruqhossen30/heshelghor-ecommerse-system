<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\ProductReview;
use Database\Factories\ProductFactory;
use Illuminate\Http\Request;

class UserProductReviewController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        // return   $products ;
        return view('user.review.productlist', compact('products'));
    }

    public function reviewproduct()
    {
        $product = Product::first();
        return view('user.review.review', compact('product'));
    }

    public function reviewproductstore(Request $request)
    {
        // return $request->all();
        $request->validate([
            'body'      => 'required',
            'rating'    => 'required',
            'recommend' => 'required',
        ]);
        $data = [

            'product_id'  => '1428',
            'user_id'  => 2,
            'body'       => $request->body,
            'rating'   => $request->rating,
            'recommend'   => $request->recommend,

        ];

        ProductReview::create($data);
        return redirect()->back();
    }
}
