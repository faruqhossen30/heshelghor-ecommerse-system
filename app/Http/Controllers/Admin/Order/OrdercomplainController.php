<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Order;
use App\Models\User\Usercomplain;
use App\Models\User\UserorderComplain;
use App\Models\Merchant\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdercomplainController extends Controller
{
    public function allcomplain()
    {

        $allcomplain = UserorderComplain::all();
        // return  $allcomplain;
        return view('admin.order.allcomplain', compact('allcomplain'));
    }
    public function showComplain($id)
    {
        $complain = UserorderComplain::with('user', 'orderitem.product')->where('id', $id)->first();
        $order = Order::firstWhere('id', $id);
        // return $complain;
        return view('admin.order.showcomplain', compact('complain', 'order'));
    }
    public function customerComplain(Request $request)
    {
        return $request->all();
    }
}
