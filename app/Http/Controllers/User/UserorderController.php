<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserorderController extends Controller
{
    public function cancelOrder(Request $request, $id)
    {

        $order = Order::firstWhere('id', $id);

        // return $order;
        if (Carbon::parse($order->created_at)->addMinutes(30)->greaterThan(Carbon::now())){
            $order = Order::where('user_id', Auth::user()->id)->where('id', $id)->update([
                'user_cancel_status'=> true
            ]);
            if($order){
                OrderItem::where('user_id', Auth::user()->id)->where('order_id', $id)->update([
                    'cancel_status'=> true,
                    'canceled_at'=> Carbon::now()
                ]);
            }

            return redirect()->route('user.order');
        }else{
            return 'Cancel Time is over';
        }





    }
}
