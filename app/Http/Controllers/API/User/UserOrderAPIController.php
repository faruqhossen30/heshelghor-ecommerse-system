<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order\DeliveryAddress;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Http\Request;

class UserOrderAPIController extends Controller
{
    public function createOrder(Request $request)
    {
        // $request->validate([
        //     'name'              => 'required',
        //     'address'           => 'required',
        //     'mobile'            => 'required',
        //     'email'             => 'required',
        //     'division_id'       => 'required',
        //     'district_id'       => 'required',
        //     'upazila_id'        => 'required',
        //     'delivery_system'   => 'required',
        //     'payment_method_id' => 'required'
        // ]);

        $order = Order::create([
            'user_id'            => $request->user_id,
            'order_no'           => '2387123',
            'total_prodcut'      => $request->total_prodcut,
            'total_item'         => $request->total_item,
            'delivery_cost'      => $request->delivery_cost,
            'product_price'      => $request->product_price,
            'total_price'        => $request->total_price,
            'delivery_system_id' => $request->delivery_system_id,
            'payment_method_id'  => $request->payment_method_id
        ]);

        return response()->json([
            'success' => true,
            'code'    => 201,
            'message' => 'Data create successfully',
            'data'    => $order
        ]);

    }

    public function createOrderitemAddress(Request $request)
    {
        $oderitems = OrderItem::create([
            'user_id'                      => $request->user_id,
            'merchant_id'                  => $request->merchant_id,
            'order_id'                     => $request->order_id,
            'product_id'                   => $request->product_id,
            'regular_price'                => $request->regular_price,
            'discount'                     => $request->discount,
            'price'                        => $request->price,
            'quantity'                     => $request->quantity,
            'merchant_price'               => $request->merchant_price,
            'merchant_price_total'         => $request->merchant_price_total,
            'delivery_cost'                => $request->delivery_cost,
            'total_delivery_cost'          => $request->total_delivery_cost,
            'color'                        => $request->color,
            'size'                         => $request->size,
            'order_no'                     => $request->order_No,
            'delivery_system_id'           => $request->delivery_system_id,
            'payment_method_id'            => $request->payment_method_id,
            'order_status'                 => $request->order_status,
            'merchant_status'              => $request->merchant_status,
            'colect_pointmanager_status'   => $request->colect_pointmanager_status,
            'colect_deliveryman_status'    => $request->colect_deliveryman_status,
            'vehicle_status'               => $request->vehicle_status,
            'delivery_pointmanager_status' => $request->delivery_pointmanager_status,
            'deliveryman_status'           => $request->deliveryman_status,
            'user_accept_status'           => $request->user_accept_status,
            'order_pin_no'                 => $request->order_pin_no,
        ]);


        // $deliveryaddress = DeliveryAddress::create([
        //     'name'        => $request->name,
        //     'user_id'     => $request->user_id,
        //     'order_id'    => $request->order_id,
        //     'email'       => $request->email,
        //     'company'     => $request->company,
        //     'address'     => $request->address,
        //     'message'     => $request->message,
        //     'zip_code'    => $request->zip_code,
        //     'mobile'      => $request->mobile,
        //     'division_id' => $request->division_id,
        //     'district_id' => $request->district_id,
        //     'upazila_id'  => $request->upazila_id
        // ]);


        return response()->json([
            'success' => true,
            'code'    => 201,
            'message' => 'Order Item create successfully',
            'data'    => $oderitems
        ]);





    }
}
