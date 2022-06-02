<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Models\PointManager\PointManagerCollectProduct;
use App\Models\User;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchantId = Auth::guard('marchant')->user()->id;
        $orderitems = OrderItem::with('product', 'order')->where('merchant_id', $merchantId)->latest()->get();
        // return $orderitems;
        return view('marchant.order.orders', compact('orderitems'));
    }

    public function orderItem($id)
    {
        $orderItem = OrderItem::with('product', 'order', 'courier')->where('id', $id)->first();
        // return $orderItem;
        return view('marchant.order.orderitem', compact('orderItem'));
    }

    // Order Accept
    public function orderAccept($id)
    {
        $orderItem = OrderItem::with('user')->where('id', $id)->first();
        $update = OrderItem::where('id', $id)->update([
            'accept_status' => true,
            'accepted_at' => Carbon::now()
        ]);

        if ($update) {
            // Notification start
            $user = User::firstWhere('id', $orderItem->user_id);
            $android_token = $user->android_token;
            if ($android_token) {
                $data = array(
                    'title' => 'Your order has been accepted.',
                    'body' => 'Check your account for order status.'
                );
                sendNotificateion($data, $android_token);
            }
            // Notification End
        }


        return redirect()->back();
    }
    // Order Cancel
    public function orderCancel($id)
    {
        $orderItem = OrderItem::with('user')->where('id', $id)->first();
        $update = OrderItem::where('id', $id)->update([
            'cancel_status' => true,
            'canceled_at' => Carbon::now()
        ]);

        if ($update) {
            // Notification start
            $user = User::firstWhere('id', $orderItem->user_id);
            $android_token = $user->android_token;
            if ($android_token) {
                $data = array(
                    'title' => 'Sorry ! Your order has been canceled.',
                    'body' => 'Check your account for order details.'
                );
                sendNotificateion($data, $android_token);
            }
            // Notification End
        }





        return redirect()->back();
    }
}
