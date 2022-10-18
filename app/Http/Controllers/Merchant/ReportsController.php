<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
   public function SalesReport(){

     $merchantId = Auth::guard('marchant')->user()->id;
    //  $orderitems = OrderItem::with('product', 'order')->where('merchant_id', $merchantId)->latest()->get();
     $orderitems = OrderItem::with('product', 'order')
     ->where('merchant_id', $merchantId)
     ->latest()
     ->get();

     $subtotal= Order::whereHas('orderitems',function ($query) use($merchantId) {

        $query->where('merchant_id', $merchantId);

     })->sum('total_product_price');


     $totaldalivery= Order::whereHas('orderitems',function ($query) use($merchantId) {

        $query->where('merchant_id', $merchantId);

     })->sum('total_delivery_cost');


    // return $totaldalivery;
    return view('reports.sales-report',compact('orderitems','subtotal' ,'totaldalivery'));
   }

   public function salestListByWeek(){

    $merchantId = Auth::guard('marchant')->user()->id;

    $orderitems = OrderItem::with('product','order')->whereBetween('created_at',

        [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->latest()->paginate(7);


    $subtotal= Order::whereHas('orderitems',function ($query) use($merchantId) {

        $query->where('merchant_id', $merchantId);

    })->sum('total_product_price');


    $totaldalivery= Order::whereHas('orderitems',function ($query) use($merchantId) {

         $query->where('merchant_id', $merchantId);

    })->sum('total_delivery_cost');

    return view('reports.sales-report', compact('orderitems' ,'subtotal','totaldalivery'));

   }


   public function salseListByMonth(){

         $merchantId = Auth::guard('marchant')->user()->id;

         $orderitems = OrderItem::with('product','order')
         ->whereMonth('created_at', Carbon::now()->month)
         ->latest()
         ->paginate(7);


            $subtotal= Order::whereHas('orderitems',function ($query) use($merchantId) {

            $query->where('merchant_id', $merchantId);

            })->sum('total_product_price');


            $totaldalivery= Order::whereHas('orderitems',function ($query) use($merchantId) {

            $query->where('merchant_id', $merchantId);

            })->sum('total_delivery_cost');

         return view('reports.sales-report', compact('orderitems', 'subtotal','totaldalivery'));
   }


       public function currentDate(Request $request)
       {
        $request->validate([
        'created_at' => 'required',
        ]);

        $merchantId = Auth::guard('marchant')->user()->id;
        $orderitems = OrderItem::with('product','order')
        ->whereDate('created_at', $request->created_at)
        ->paginate(10);

        $subtotal= Order::whereHas('orderitems',function ($query) use($merchantId) {

        $query->where('merchant_id', $merchantId);

        })->sum('total_product_price');


        $totaldalivery= Order::whereHas('orderitems',function ($query) use($merchantId) {

        $query->where('merchant_id', $merchantId);

        })->sum('total_delivery_cost');

         return view('reports.sales-report', compact('orderitems', 'subtotal','totaldalivery'));
       }


         public function salesListByDate(Request $request)
         {
            $request->validate([
            'from_date' => 'required',
            'to_date' => 'required',
            ]);
            // return "Just for test";
            $merchantId = Auth::guard('marchant')->user()->id;
            $orderitems =OrderItem::with('product','order')
            ->whereDate('created_at','>=',$request->from_date)
            ->whereDate('created_at','<=',$request->to_date)
            ->paginate(20);

            $subtotal= Order::whereHas('orderitems',function ($query) use($merchantId) {
                $query->where('merchant_id', $merchantId);
            })->sum('total_product_price');


            $totaldalivery= Order::whereHas('orderitems',function ($query) use($merchantId) {
                $query->where('merchant_id', $merchantId);
            })->sum('total_delivery_cost');

            return view('reports.sales-report', compact('orderitems', 'subtotal','totaldalivery'));
    }
}
