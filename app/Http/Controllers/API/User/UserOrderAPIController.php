<?php

namespace App\Http\Controllers\API\User;

use Exception;
use Illuminate\Http\Request;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Order\DeliveryAddress;

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

    public function createOrderitem(Request $request)
    {
        try {
            $order_item_data = $request->only(
                'user_id',
                'merchant_id',
                'order_id',
                'product_id',
                'regular_price',
                'discount',
                'price',
                'quantity',
                'color',
                'size',
                'order_No',
                'delivery_system_id',
                'payment_method_id',
                'status'
            );
            // $oder_item_id = DB::table('order_items')->insertGetId($order_item_data);
            // $inserted_item = DB::table('order_items')->find($oder_item_id);

            $oder_item_id = OrderItem::insertGetId($order_item_data);
            $inserted_item = OrderItem::find($oder_item_id);

            return response()->json([
                'success' => true,
                'message' => 'Order Created successfully!',
                'data'    => $inserted_item
            ], 201);
        } catch (Exception $e) {
            $exception_code = $e->getCode();
            $response_code = $exception_code < 200 || $exception_code > 500 ? 500 : $exception_code;
            return response()->json($this->catch_exception($e), $response_code);
        }
    }

    public function deliveryAddress(Request $request)
    {
        try {
            $order_item_data = $request->only(
                'name',
                'user_id',
                'order_id',
                'email',
                'company',
                'address',
                'message',
                'zip_code',
                'mobile',
                'division_id',
                'district_id',
                'upazila_id',
            );
            // $oder_item_id = DB::table('order_items')->insertGetId($order_item_data);
            // $inserted_item = DB::table('order_items')->find($oder_item_id);

            $address_id = DeliveryAddress::insertGetId($order_item_data);
            $inserted_address = DeliveryAddress::find($address_id);

            return response()->json([
                'success' => true,
                'message' => 'Delivery Address Created successfully!',
                'data'    => $inserted_address
            ], 201);
        } catch (Exception $e) {
            $exception_code = $e->getCode();
            $response_code = $exception_code < 200 || $exception_code > 500 ? 500 : $exception_code;
            return response()->json($this->catch_exception($e), $response_code);
        }
    }
}
