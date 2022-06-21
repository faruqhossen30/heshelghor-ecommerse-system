<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserOrderListAPIController extends Controller
{
    public function order(Request $request)
    {
        $userId = $request->user()->id;
        $order = Order::with('orderitems.product')
            ->where('user_id', $userId)
            ->where('user_cancel_status', false)
            ->where('complete_status', false)
            ->where(function ($query) {
                $query->where('payment_type', 'cash')
                    ->orWhere('status', 'Processing');
            })
            ->orderBy('id', 'desc')
            ->get();

        if (count($order) == 0) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message'    => 'No order found',
            ]);
        }
        if (!empty($order)) {
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
        $order = Order::with('orderitems.product')->where('user_id', $userId)->where('id', $id)->get();
        if (!empty($order)) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $order
            ]);
        }
    }
    // Processing
    public function processingOrders(Request $request)
    {
        $userId = $request->user()->id;
        $orders = Order::where('user_id', $userId)->where('status', 'Processing')->get();

        if (count($orders) == 0) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message'    => 'No order found',
            ]);
        }
        if (!empty($orders)) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $orders
            ]);
        }
    }
    // Pending
    public function pendingOrders(Request $request)
    {
        $userId = $request->user()->id;
        $orders = Order::where('user_id', $userId)
            ->where('accept_status', false)
            ->where('cancel_status', false)
            ->get();

        if (count($orders) == 0) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'message'    => 'No order found',
            ]);
        }
        if (!empty($orders)) {
            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $orders
            ]);
        }
    }
    // Pending
    public function completedOrders(Request $request)
    {
        $userId = $request->user()->id;
        $orders = Order::with('orderitems.product')
            ->where('user_id', $userId)
            ->where('complete_status', true)
            ->get();


        return response()->json([
            'success' => true,
            'code'    => 200,
            'data'    => $orders
        ]);
    }

    // Cancel Order
    public function cancelOrder(Request $request, $id)
    {
        $userid = $request->user()->id;

        $order = Order::firstWhere('id', $id);

        // return $order;
        if (Carbon::parse($order->created_at)->addMinutes(30)->greaterThan(Carbon::now())){
            $order = Order::where('user_id', $userid)->where('id', $id)->update([
                'user_cancel_status'=> true
            ]);
            if($order){
                OrderItem::where('user_id', $userid)->where('order_id', $id)->update([
                    'cancel_status'=> true,
                    'canceled_at'=> Carbon::now()
                ]);
            }

            return response()->json([
                'success' => true,
                'code'    => 200,
                'message' => "Order has been canceled !"
            ]);
        }else{
            return response()->json([
                'success' => false,
                'code'    => 200,
                'message' => "Cancel time has been over !"
            ]);
        }





    }
}
