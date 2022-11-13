<?php

namespace App\Http\Controllers\Ajax\FrontEnd;

use App\Models\Admin\Courier\Courier;
use App\Models\Admin\Courier\CourierHasDelivery;
use App\Models\Admin\Courier\CourierHasPickup;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Upazila;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function districtWiseCourierServiceList(Request $request)
    {
        if ($request->ajax()) {
            $districtids = CourierHasDelivery::where('district_id', $request->district_id)->pluck('courier_id')->unique();

            $couriers = Courier::whereIn('id', $districtids)->get();

            return $couriers;
        }
    }

    public function upazilaWiseCourierServiceList(Request $request, $upazila_id)
    {
        if ($request->ajax()) {
            // Working

            return $request->all();

            $prdoduct_upazila_id         = $request->prdoduct_upazila_id;
            $product_delivery_upazila_id = $request->product_delivery_upazila_id;
            $product_weight              = $request->product_weight;


            $pickup = CourierHasPickup::where('upazila_id', $prdoduct_upazila_id)->pluck('courier_id')->unique()->toArray();
            $delivery = CourierHasDelivery::where('upazila_id', $product_delivery_upazila_id)->pluck('courier_id')->unique()->toArray();

            $courierids = array_intersect($pickup, $delivery);

            $couriers = Courier::whereIn('id', $courierids)->get();

            $data = view('frontend.inc.test', compact('couriers', 'prdoduct_upazila_id', 'product_delivery_upazila_id', 'product_weight'));

            return $data;
        }
    }
    // For Cart Checkout page
    public function courierlistforcartchekoutpage(Request $request, $upazila_id)
    {
        if ($request->ajax()) {
            // Working

            $product = Product::firstWhere('id', $request->product_id);

            // return $request->all();

            $prdoduct_upazila_id         = $product->upazila_id;
            $product_delivery_upazila_id = $request->product_delivery_upazila_id;
            $product_weight              = $request->product_weight;


            $pickup = CourierHasPickup::where('upazila_id', $prdoduct_upazila_id)->pluck('courier_id')->unique()->toArray();
            $delivery = CourierHasDelivery::where('upazila_id', $product_delivery_upazila_id)->pluck('courier_id')->unique()->toArray();

            $courierids = array_intersect($pickup, $delivery);

            $couriers = Courier::whereIn('id', $courierids)->get();

            $data = view('frontend.ajax.checkoutcourierlistoption', compact('couriers', 'prdoduct_upazila_id', 'product_delivery_upazila_id', 'product_weight'));

            return $data;
        }
    }
    public function upazilaWiseCourierServiceListForCheckoutPage(Request $request, $upazila_id)
    {
        if ($request->ajax()) {
            // return $request->all();
            $product = Product::firstWhere('id', $request->productid);

            $productid                   = $request->productid;
            $product_delivery_upazila_id = $request->product_delivery_upazila_id;
            $prdoduct_upazila_id         = $product->upazila_id;
            $product_weight              = 1;


            $pickup = CourierHasPickup::where('upazila_id', $prdoduct_upazila_id)->pluck('courier_id')->unique()->toArray();
            $delivery = CourierHasDelivery::where('upazila_id', $product_delivery_upazila_id)->pluck('courier_id')->unique()->toArray();

            $courierids = array_intersect($pickup, $delivery);
            $couriers = Courier::whereIn('id', $courierids)->get();

            $data = view('frontend.inc.checkouttest', compact('couriers', 'prdoduct_upazila_id', 'product_delivery_upazila_id', 'product_weight'));

            return $data;
        }
    }

    public function getdistrictbydivisionid(Request $request, $division_id)
    {
        if ($request->ajax() && $division_id) {

            $districtids = CourierHasDelivery::where('division_id', $division_id)->pluck('district_id')->unique();
            $districts = District::whereIn('id', $districtids)->get();

            return $districts;
        }
    }

    public function getgetupazilabydistrictid(Request $request, $district_id)
    {
        if ($request->ajax() && $district_id) {

            // return 'ok';

            $upazilaids = CourierHasDelivery::where('district_id', $district_id)->pluck('upazila_id')->unique();

            $upazilas = Upazila::whereIn('id', $upazilaids)->get();

            return $upazilas;
        }
    }
}
