<?php

namespace App\Http\Controllers\Ajax\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin\Courier\Courier;
use App\Models\Admin\Courier\CourierHasDelivery;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Upazila;
use Illuminate\Http\Request;

class CourierAjaxController extends Controller
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
            $courierids = CourierHasDelivery::where('upazila_id', $upazila_id)->pluck('courier_id')->unique();

            $couriers = Courier::whereIn('id', $courierids)->get();

            $data = view('frontend.inc.ajaxcourierservicelist', compact('couriers'));

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
