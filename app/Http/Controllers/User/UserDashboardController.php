<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Merchant\Order;
use Illuminate\Http\Request;


class UserDashboardController extends Controller
{

    public function index()
    {
        return view('user.dashboard');
    }

    // For List order
    public function orders()
    {
        $userId = Auth::user()->id;

        $orders = Order::with('user')->where('user_id', $userId)->get();
        // return $orders;
        return view('user.userorder', compact('orders'));

    }
}
