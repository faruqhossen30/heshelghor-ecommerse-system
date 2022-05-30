<?php

namespace App\Http\Controllers\API\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Merchant\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MerchantOrderItemAPIController extends Controller
{
    public function allOrder(Request $request)
    {
        $merchantId = $request->user()->id;
        $orderItem = OrderItem::with('product')->where('merchant_id', $merchantId)->get();
        if(!empty($orderItem)){
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $orderItem
            ]);
        }
    }
    public function singleOrder(Request $request, $orderItemId)
    {
        $merchantId = $request->user()->id;
        $orderItem = OrderItem::with('product')->where('merchant_id', $merchantId)->get();
        if(!empty($orderItem)){
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $orderItem
            ]);
        }
    }
    // Accept Order
    public function acceptOrder(Request $request, $orderItemId)
    {
        $merchantId = $request->user()->id;
        $orderItem = OrderItem::where('merchant_id', $merchantId)->where('id', $orderItemId)->first();
        // return $orderItem;
        if($orderItem->accept_status == 0 && $orderItem->cancel_status == 0){
            $orderItem->accept_status = true;
            $orderItem->accepted_at = Carbon::now();
            $orderItem->save();
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message'    => 'Order accept successfully !'
            ]);
        }
        return response()->json([
            'success' => false,
            'code'    => 304,
            'message'    => 'Opps! Something went wrong. Order Cancle or accepted.'
        ]);

    }

    public function cancelOrder(Request $request, $orderItemId)
    {
        $merchantId = $request->user()->id;
        $orderItem = OrderItem::where('merchant_id', $merchantId)->where('id', $orderItemId)->first();
        // return $orderItem;
        if($orderItem->order_status == 0 && $orderItem->cancel_status == 0){
            $orderItem->accept_status = true;
            $orderItem->canceled_at = Carbon::now();
            $orderItem->save();
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message'    => 'Order has been  cancelled.'
            ]);
        }
        return response()->json([
            'success' => false,
            'code'    => 304,
            'message'    => 'Opps! Something went wrong. Order Cancle or accepted.'
        ]);

    }
}
