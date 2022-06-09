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
        $orderitems = OrderItem::with('product', 'user', 'review')->where('user_id', $userid)->latest()->paginate(10);
        // return  $orderitems ;

        return view('user.review.productlist', compact('orderitems'));
    }

    public function reviewproduct($id)
    {
        $userid = Auth()->user()->id;
        $orderitem = OrderItem::with('product', 'user', 'review')->where('user_id', $userid)->where('id', $id)->latest()->first();

        $review = ProductReview::firstWhere('orderitem_id', $id);

        // return $review;
        if($review){

            return view('user.review.productshow', compact('review','orderitem'));
        }
        if(!$review){

            return view('user.review.review', compact('orderitem'));
        }
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
        return redirect()->route('user.product.review.list');
    }

    public function reviewproductedit($id)
    {
        $review = ProductReview::where('product_id', $id)->get()->first();

            return view('user.review.editreview',compact('review'));
    }

    public function reviewproductupadte(Request $request,$id){

        // return $request->all();
        ProductReview::where('product_id', $id)->update([

            'body'         => $request->body,
            'rating'       => $request->rating,
            'recommend'    => $request->recommend
        ]);
        return redirect()->route('user.product.review.list');
    }

}
