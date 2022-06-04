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
        $order = Order::with('orderitems')->where('user_id', $userId)->get();

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
        $order = Order::with('orderitems')->where('user_id', $userId)->where('id', $id)->get();
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
}
