<?php

namespace App\Http\Controllers\API\User;

use Exception;
use Illuminate\Http\Request;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Order\DeliveryAddress;
use Illuminate\Support\Facades\Validator;

class UserOrderAPIController extends Controller
{
    public function createOrder(Request $request)
    {
        // $data = $request->all();

        // $rules = [
        //     'user_id'            => 'required',
        //     'order_no'           => 'required',
        //     'total_prodcut'      => 'required',
        //     'total_item'         => 'required',
        //     'delivery_cost'      => 'required',
        //     'product_price'      => 'required',
        //     'total_price'        => 'required',
        //     'delivery_system_id' => 'required',
        //     'payment_method_id'  => 'required'
        // ];
        // $errorMessage = [
        //     'user_id.required' => 'Please input your Uuser id '
        // ];

        // $validator = Validator::make($data, $rules, $errorMessage);
        // if ($validator->fails()) {
        //     return response()->json($validator->errors());
        // }


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
            'message' => 'Order create successfully',
            'data'    => $order
        ]);
    }

    public function createOrderitem(Request $request)
    {
        // $data = $request->all();

        // $rules = [
        //     'user_id'            => 'required',
        //     'merchant_id'        => 'required',
        //     'order_id'           => 'required',
        //     'product_id'         => 'required',
        //     'regular_price'      => 'required',
        //     'discount'           => 'required',
        //     'price'              => 'required',
        //     'quantity'           => 'required',
        //     'color'              => 'required',
        //     'size'               => 'required',
        //     'order_No'           => 'required',
        //     'payment_method_id'  => 'required',
        //     'delivery_system_id' => 'required',
        // ];
        // $errorMessage = [
        //     'user_id.required' => 'Please input your User id '
        // ];

        // $validator = Validator::make($data, $rules, $errorMessage);
        // if ($validator->fails()) {
        //     return response()->json($validator->errors());
        // }

        $today = date("ymd");
        $number = intval($today.'000');

        function numGenerate($number){
            $count = OrderItem::where('order_number', 'LIKE', $number.'%')->count();
            // $suffix = $count ? $count+1:'';
            // $number .=$suffix;
            $suffix = $count ? $count+1 : $count+1;
            $number .= $suffix;
            return $number;
        }
        $orderNumber = numGenerate($number);


        $orderItem = OrderItem::create([
            'user_id'           => $request->user_id,
            'merchant_id'       => $request->merchant_id,
            'order_id'          => $request->order_id,
            'order_number'      => $orderNumber,
            'product_id'        => $request->product_id,
            'regular_price'     => $request->regular_price,
            'discount'          => $request->discount,
            'price'             => $request->price,
            'quantity'          => $request->quantity,
            'color'             => $request->color,
            'size'              => $request->size,
            'order_No'          => $request->order_No,
            'payment_method_id' => $request->payment_method_id,
            'delivery_system_id' => $request->delivery_system_id,
        ]);

        return response()->json([
            'success' => true,
            'code'    => 201,
            'message' => 'Order Item create successfully',
            'data'    => $orderItem
        ]);
    }

    public function deliveryAddress(Request $request)
    {
        // $data = $request->all();
        // $rules = [
        //     'name'        => 'required',
        //     'user_id'     => 'required',
        //     'order_id'    => 'required',
        //     'email'       => 'required|email',
        //     'address'     => 'required',
        //     'mobile'      => 'required',
        //     'division_id' => 'required',
        //     'district_id' => 'required',
        //     'upazila_id'  => 'required'
        // ];

        // $errorMessage = [
        //     'user_id.required' => 'Please input your User id '
        // ];

        // $validator = Validator::make($data, $rules, $errorMessage);
        // if ($validator->fails()) {
        //     return response()->json($validator->errors());
        // }

        $deliveryAddress = DeliveryAddress::create([
            'name'              => $request->name,
            'user_id'           => $request->user_id,
            'order_id'          => $request->order_id,
            'email'             => $request->email,
            'company'           => $request->company,
            'address'           => $request->address,
            'message'           => $request->message,
            'zip_code'          => $request->zip_code,
            'mobile'            => $request->mobile,
            'division_id'       => $request->division_id,
            'district_id'       => $request->district_id,
            'payment_method_id' => $request->payment_method_id,
            'upazila_id'        => $request->upazila_id
        ]);

        return response()->json([
            'success' => true,
            'code'    => 201,
            'message' => 'Delivery address create successfully',
            'data'    => $deliveryAddress
        ]);


    }
}
