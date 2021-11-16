<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Support\Facades\Auth;

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
        $orders = Order::with('itemProducts')->get();
        $orderItems = OrderItem::with('product', 'order', 'deliveryaddress')->where('merchant_id', $merchantId)->get();
        // return $orderItems;
        return view('marchant.order.orders', compact('orderItems'));
    }

    public function orderItem($id)
    {
        $orderItem = OrderItem::with('product', 'deliveryaddress')->where('id', $id)->first();
        // return $orderItem;
        return view('marchant.order.orderitem', compact('orderItem'));
    }

    // Order Accept
    public function orderAccept($id)
    {
        $orderItem = OrderItem::with('user')->where('id', $id)->first();
        $update = OrderItem::where('id', $id)->update([
            'order_status' => true
        ]);

        $android_token = $orderItem->user->android_token;
        $aminul = "ekw7SmALQtyL0DFeT6a_YQ:APA91bHVZZBRVt-ShqimorUzxkSv6gfusb70nJI5Ma475K7LFvhrqfdZcbFEVPWyWCuu8tC-Waj8RJCGUxH28VnCer906djgoRy2M1QFBXNrmBG6OMBD79JQERDRmfbJekb8MsSFHhaW";

        // $registration_ids = array('Device ID 1', 'Device ID 2');
        if($android_token){
            $data = array(
                'title' => 'Your Order accept !',
                'body' => 'HeshelGhor | Store of Needs'
            );
            sendNotificateion($data, $android_token);
        }

        // $array = [
        //     $android_token
        // ];

        // sendNotificateions($data, $array);


        return redirect()->back();
    }


}
