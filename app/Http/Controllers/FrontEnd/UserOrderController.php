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
        $subTotal = Cart::priceTotal();

        // ------------------------------
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
        // ------------------------------

        // ------------------------------
        $invoice ='HG-'.$userId.'000';
        function invoiceGenerate($invoice){
            $count = Order::where('invoice_number', 'LIKE', $invoice.'%')->count();
            $suffix = $count ? $count+1 : $count+1;
            $invoice .= $suffix;
            return $invoice;
        }
        $invoiceNumber = invoiceGenerate($invoice);
        // ------------------------------

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
            'invoice_number'     => $invoiceNumber,
            'total_prodcut'      => $request->total_prodcut,
            'total_item'         => $request->total_item,
            'delivery_cost'      => $request->delivery_cost,
            'product_price'      => $subTotal,
            'total_price'        => $request->total_price,
            'delivery_system_id' => $request->delivery_system,
            'payment_method_id'  => $request->payment_method_id
        ]);
        if ($order) {

            foreach($cartitems as $item){
                OrderItem::create([
                    'user_id'                      => $userId,
                    'merchant_id'                  => $item->options->merchant_id,
                    'order_id'                     => $order->id,
                    'order_number'                 => $orderNumber,
                    'product_id'                   => $item->id,
                    'regular_price'                => $item->options->regular_price,
                    'discount'                     => $item->options->discount,
                    'price'                        => $item->price,
                    'quantity'                     => $item->qty,
                    'merchant_price'               => $item->options->merchant_price,
                    'merchant_price_total'         => $item->options->merchant_price_total,
                    'delivery_cost'                => $request->delivery_cost,
                    'total_delivery_cost'          => $request->delivery_cost * $item->qty,
                    'color'                        => $item->options->color,
                    'size'                         => $item->options->size,
                    'delivery_system_id'           => $request->delivery_system,
                    'payment_method_id'            => $request->payment_method_id,
                    'order_pin_no'                 => rand(0001,9999),
                ]);
            }

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
