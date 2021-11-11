<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Http\Request;

class UserOrderListAPIController extends Controller
{
    public function order(Request $request)
    {
        $userId = $request->user()->id;
        $order = Order::where('user_id', $userId)->get();

        if(count($order) == 0){
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message'    => 'No order found',
            ]);
        }
        if(!empty($order)){
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $order
            ]);
        }
    }
    public function orderItem(Request $request, $id)
    {
        $userId = $request->user()->id;
        // return $userId;
        $orderItem = OrderItem::with('product')->where('user_id', $userId)->where('order_id', $id)->get();
        if(!empty($orderItem)){
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $orderItem
            ]);
        }
    }
}