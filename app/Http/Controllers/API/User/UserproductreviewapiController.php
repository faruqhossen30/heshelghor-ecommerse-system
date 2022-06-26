<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Merchant\OrderItem;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class UserproductreviewapiController extends Controller
{
    public function index(Request $request)
    {
        $userid = $request->user()->id;

        $orderitems = OrderItem::with('product', 'review')
            ->where('user_id', $userid)
            ->where('complete_status', 1)
            ->latest()
            ->paginate(10);

        return response()->json([
            'success' => true,
            'code'    => 200,
            'data'    => $orderitems
        ]);
    }
    public function singleReview(Request $request, $id)
    {
        $userid = $request->user()->id;

        $review = ProductReview::with('product')
            ->where('user_id', $userid)
            ->where('id', $id)
            ->first();

        return response()->json([
            'success' => true,
            'code'    => 200,
            'data'    => $review
        ]);
    }

    public function reviewproductStore(Request $request)
    {
        $userid = $request->user()->id;

        $request->validate([
            'product_id'   => 'required',
            'orderitem_id' => 'required',
            'body'         => 'required',
            'rating'       => 'required',
            'recommend'    => 'required',
        ]);

        $reviewcheck = ProductReview::firstWhere('orderitem_id', $request->orderitem_id);

        if($reviewcheck){
            return response()->json([
                'success' => false,
                'code'    => 200,
                'message'    => 'Review already exit.'
            ]);

        }else{
            $review = ProductReview::create([
                'product_id'   => $request->product_id,
                'orderitem_id' => $request->orderitem_id,
                'user_id'      => $userid,
                'body'         => $request->body,
                'rating'       => $request->rating,
                'recommend'    => $request->recommend
            ]);

            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $review
            ]);
        }


    }
    public function reviewproductUpdate(Request $request, $id)
    {
        $userid = $request->user()->id;

        $request->validate([
            'product_id'   => 'required',
            'orderitem_id' => 'required',
            'body'         => 'required',
            'rating'       => 'required',
            'recommend'    => 'required',
        ]);


            $update = ProductReview::where('id', $id)
            ->update([
                'product_id'   => $request->product_id,
                'orderitem_id' => $request->orderitem_id,
                'user_id'      => $userid,
                'body'         => $request->body,
                'rating'       => $request->rating,
                'recommend'    => $request->recommend
            ]);
            $reviewcheck = ProductReview::firstWhere('orderitem_id', $request->orderitem_id);

            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $reviewcheck
            ]);


    }
}
