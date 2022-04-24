<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Courier\Courier;
use App\Models\Admin\Courier\CourierHasDelivery;
use App\Models\Admin\Courier\CourierHasPickup;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyNowAPIController extends Controller
{
    public function upazilaWiseCourierServiceList(Request $request)
    {

            // return $request->all();
            return "welcome";

            $prdoduct_upazila_id         = $request->prdoduct_upazila_id;
            $product_delivery_upazila_id = $request->product_delivery_upazila_id;
            $product_weight              = $request->product_weight;


            $pickup = CourierHasPickup::where('upazila_id', $prdoduct_upazila_id)->pluck('courier_id')->unique()->toArray();
            $delivery = CourierHasDelivery::where('upazila_id', $product_delivery_upazila_id)->pluck('courier_id')->unique()->toArray();

            $courierids = array_intersect($pickup, $delivery);

            $couriers = Courier::whereIn('id', $courierids)->get();

            return response()->json([
                'success' => true,
                'code'    => 201,
                'message' => 'Courer Upazila list.',
                'data'    => $couriers
            ]);

    }
}
