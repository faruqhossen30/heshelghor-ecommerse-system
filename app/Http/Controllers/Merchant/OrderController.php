<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;

class OrderController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $orders = Order::with('itemProducts')->get();
        $orderItems = OrderItem::all();
        // return $orderItems;
        return view('marchant.orders.order');
    }

    public function show()
    {
        return view('marchant.orders.show');
    }
}
