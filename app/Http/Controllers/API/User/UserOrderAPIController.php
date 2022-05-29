<?php

namespace App\Http\Controllers\API\User;

use Exception;
use Illuminate\Http\Request;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Order\DeliveryAddress;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Validator;

class UserOrderAPIController extends Controller
{
    public function createOrder(Request $request)
    {

        $userId = $request->user()->id;
        // // ------------------------------
        // $invoice ='HG-'.$userId.'000';
        // function invoiceGenerate($invoice){
        //     $count = Order::where('invoice_number', 'LIKE', $invoice.'%')->count();
        //     $suffix = $count ? $count+1 : $count+1;
        //     $invoice .= $suffix;
        //     return $invoice;
        // }
        // $invoiceNumber = invoiceGenerate($invoice);
        // ------------------------------

        $order = Order::create([
                // For Heshelghor
                'user_id'             => $userId,
                'invoice_number'      => invoiceGenerate(),
                'total_item'          => $request->total_item,
                'total_prodcut'       => $request->total_prodcut,
                'total_product_price' => $request->total_product_price,
                'total_delivery_cost' => $request->total_delivery_cost,
                'payment_type'        => 'online',
                //For SSL Commerce
                'name'                => $request->name,
                'email'               => $request->email,
                'phone'               => $request->phone,
                'amount'              => $request->amount,
                'status'              => 'Pending',
                'address'             => $request->address,
                'transaction_id'      =>  Uuid::uuid(),
                'currency'            => $request->currency,
                'note'                => $request->note,
                'division_id'         => $request->division_id,
                'district_id'         => $request->district_id,
                'upazila_id'         => $request->upazila_id,
                'created_at'         => Carbon::now(),
                'updated_at'         => Carbon::now(),
            ]);

        if($order){
            return response()->json([
                'success' => true,
                'code'    => 201,
                'message' => 'Order create successfully',
                'data'    => $order
            ]);
        } else{
            return response()->json([
                'success' => false,
                'code'    => 203,
                'message' => 'Opps! Somethis is wrong !',
            ]);
        }
    }

    public function createOrderitem(Request $request)
    {
        $userId = $request->user()->id;

        $orderItem = OrderItem::create([
            'order_id'             => $request->order_id,
            'user_id'              => $request->user_id,
            'product_id'           => $request->product_id,
            'merchant_id'          => $request->merchant_id,
            'shop_id'              => $request->shop_id,
            'order_number'         => orderNumber(),
            'quantity'             => $request->quantity,
            'price'                => $request->price,
            'discount_type'        => 'percent',
            'discount'             => $request->discount,
            'varient'              => json_encode($request->varient),
            'courier_id'           => $request->courier_id,
            'courier_packege_desc' => $request->courier_packege_desc,
            'delivery_cost'        => $request->delivery_cost,
            'total_delivery_cost'  => $request->total_delivery_cost,
            'order_pin_no'         => rand(0,4)
        ]);

        if($orderItem){
            return response()->json([
                'success' => true,
                'code'    => 201,
                'message' => 'Order Item create successfully',
                'data'    => $orderItem
            ]);
        } else{
            return response()->json([
                'success' => true,
                'code'    => 203,
                'message' => 'Opps! Somethis is wrong !',
            ]);
        }

    }

}
