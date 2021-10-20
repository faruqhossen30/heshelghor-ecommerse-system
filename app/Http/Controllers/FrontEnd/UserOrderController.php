<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;

use App\Models\Merchant\Order;
use App\Models\Admin\Order\DeliveryAddress;
use App\Models\Merchant\OrderItem;

class UserOrderController extends Controller
{
    public function orderNow(Request $request)
    {
        $userId = Auth::user()->id;
        $cartitems = Cart::content();

        // return $cartitems;

        $request->validate([
            'name'              => 'required',
            'address'           => 'required',
            'mobile'            => 'required',
            'email'             => 'required',
            'division_id'       => 'required',
            'district_id'       => 'required',
            'upazila_id'        => 'required',
            'delivery_system'   => 'required',
            'payment_method_id' => 'required'
        ]);
        $order = Order::create([
            'user_id'            => $userId,
            'order_no'           => '2387123',
            'total_prodcut'      => $request->total_prodcut,
            'total_item'         => $request->total_item,
            'delivery_cost'      => $request->delivery_cost,
            'product_price'      => $request->product_price,
            'total_price'        => $request->total_price,
            'delivery_system_id' => $request->delivery_system,
            'payment_method_id'  => $request->payment_method_id
        ]);
        if ($order) {
            DeliveryAddress::create([
                'name'        => $request->name,
                'user_id'     => $userId,
                'order_id'    => $order->id,
                'email'       => $request->email,
                'company'     => $request->company_name,
                'address'     => $request->address,
                'message'     => $request->message,
                'zip_code'    => $request->zip,
                'mobile'      => $request->mobile,
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'upazila_id'  => $request->upazila_id,
            ]);

            foreach($cartitems as $item){
                OrderItem::create([
                    'user_id'            => $userId,
                    'order_id'           => $order->id,
                    'product_id'         => $item->id,
                    'merchant_id'        => $item->options->merchant_id,
                    'color'              => $item->options->color,
                    'size'               => $item->options->size,
                    'quantity'           => $item->qty,
                    'order_No'           => '2387123',
                    'delivery_system_id' => $request->delivery_system,
                    'payment_method_id'  => $request->payment_method_id
                ]);
            }

            Cart::destroy();

            return redirect()->route('ordercomplete');



        }

        return $request->all();
    }
    // For Order Complete
    public function orderComplete()
    {
        return view('frontend.ordercomplete');
    }




}