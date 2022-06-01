<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrderItemListController extends Controller
{
    public function allOrderItem()
    {
        $orderItems = OrderItem::with('order', 'product', 'shop')->latest()->get();

        // return $orderItems;

        return view('admin.order.allorderitem', compact('orderItems'));
    }

    public function singeOrderItem($id)
    {
        $orderItem = OrderItem::with('order','product', 'shop', 'courier')->where('id', $id)->first();
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

    // Order Accept
    public function orderAccept($id)
    {
        $update = OrderItem::where('id', $id)->update([
            'accept_status' => true,
            'accepted_at' => Carbon::now(),
            'author' => 'admin',
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);
        return redirect()->back();
    }
    // Order Cancel
    public function orderCancel($id)
    {
        $update = OrderItem::where('id', $id)->update([
            'cancel_status' => true,
            'canceled_at' => Carbon::now(),
            'author' => 'admin',
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);
        return redirect()->back();
    }






}
