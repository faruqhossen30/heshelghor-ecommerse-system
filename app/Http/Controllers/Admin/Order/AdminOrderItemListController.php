<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Http\Request;

class AdminOrderItemListController extends Controller
{
    public function allOrderItem()
    {
        $orders = Order::with('itemProducts')->get();
        $orderItems = OrderItem::with('product', 'order', 'deliveryaddress', 'merchant')->latest()->get();

        // return $orderItems;

        return view('admin.order.allorderitem', compact('orderItems', 'orders'));
    }

    public function singeOrderItem($id)
    {
        $orderItem = OrderItem::with('product', 'merchant', 'deliveryaddress')->where('id', $id)->first();
        // return $orderItem;
        return view('admin.order.singleorderitem', compact('orderItem'));
    }
    public function searchOrderItem(Request $request)
    {

        // return $request->all();
        if ($request->keyword && $request->filter == 'all') {
            $result = OrderItem::with('product', 'merchant', 'deliveryaddress')->where('order_number', 'like', "%$request->keyword%")->get();
            return $result;
        } elseif ($request->keyword && $request->filter == 'pending') {
            $result = OrderItem::with('product', 'merchant', 'deliveryaddress')->where('order_status', 0)->where('order_number', 'like', "%$request->keyword%")->get();
            return $result;
        } elseif ($request->keyword && $request->filter == 'accepted') {
            $result = OrderItem::with('product', 'merchant', 'deliveryaddress')->where('order_status', 1)->where('order_number', 'like', "%$request->keyword%")->get();
            return $result;
        }
    }
}
