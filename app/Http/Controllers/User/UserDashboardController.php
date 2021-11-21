<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;


class UserDashboardController extends Controller
{

    public function index()
    {
        $userId = Auth::user()->id;
        $totalorder = Order::where('user_id', $userId)->count();

        // return $totalorder;

        return view('user.dashboard', compact('totalorder'));


    }

    // For List order
    public function orders()
    {
        $userId = Auth::user()->id;
        $orders = Order::with('user')->where('user_id', $userId)->get();

        // return $orders;
        return view('user.order.userorder', compact('orders'));

    }
    public function showOrder($id)
    {
        $userId = Auth::user()->id;
        $order = Order::with('itemProducts','deliveryaddress')->where('user_id', $userId)->where('id', $id)->first();
        $orderItems = OrderItem::with('product')->where('user_id', $userId)->where('order_id', $id)->get();
        // return $order;
        return view('user.order.showorder', compact('order', 'orderItems'));
    }

    public function account()
    {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();

        return view('user.account', compact('user'));
    }
    public function updateAccount()
    {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();

        return view('user.updateaccount', compact('user'));
    }
}
