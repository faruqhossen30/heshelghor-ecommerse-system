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
        $orderItems = OrderItem::with('product', 'order', 'deliveryaddress', 'merchant')->get();

        // return $orderItems;

        return view('admin.order.allorderitem', compact('orderItems', 'orders'));
    }

    public function singeOrderItem($id)
    {
        $orderItem = OrderItem::with('product', 'merchant', 'deliveryaddress')->where('id', $id)->first();
        // return $orderItem;
        return view('admin.order.singleorderitem', compact('orderItem'));
    }
}
