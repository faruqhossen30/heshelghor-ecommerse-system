<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Merchant\OrderItem;
use App\Models\Product\Product;
use App\Models\ProductReview;
use Database\Factories\ProductFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProductReviewController extends Controller
{
    public function index()
    {
        $userid = Auth()->user()->id;
        $products = OrderItem::with('product', 'user', 'review')->where('user_id', $userid)->latest()->paginate(10);
        // return  $products ;
        return view('user.review.productlist', compact('products'));
    }

    public function reviewproduct($id)
    {
        $userid = Auth()->user()->id;
        $orderitem = OrderItem::with('product', 'user', 'review')->where('user_id', $userid)->where('id', $id)->latest()->first();
        // return $orderitem;
        return view('user.review.review', compact('orderitem'));
    }

    public function reviewproductstore(Request $request)
    {
        // return $request->all();
        $request->validate([
            'body'      => 'required',
            'rating'    => 'required',
            'recommend' => 'required',
        ]);

        ProductReview::create([
            'product_id'   => $request->product_id,
            'orderitem_id' => $request->orderitem_id,
            'user_id'      => Auth()->user()->id,
            'body'         => $request->body,
            'rating'       => $request->rating,
            'recommend'    => $request->recommend
        ]);

        // ProductReview::create($data);
        return redirect()->back();
    }

    public function reviewproductedit($id)
    {
        // $productid = $request->product_id;
        // return $productid;
        $product = ProductReview::with('product')->Where('product_id', $id)->latest()->get();
        // return $product;
        return view('user.review.editreview', compact('product'));
    }
}
