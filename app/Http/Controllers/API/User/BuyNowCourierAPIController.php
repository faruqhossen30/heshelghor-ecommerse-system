<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Courier\Courier;
use App\Models\Admin\Courier\CourierHasDelivery;
use App\Models\Admin\Courier\CourierHasPickup;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class BuyNowCourierAPIController extends Controller
{
    public function divisionList(Request $request)
    {
        // $divisionids = CourierHasDelivery::pluck('division_id')->unique();
        $divisionids = CourierHasPickup::pluck('division_id')->unique();
        $divisions = Division::whereIn('id', $divisionids)->get();

        return response()->json([
            'success' => true,
            'code'    => 201,
            'message' => 'Courer divisions list.',
            'data'    => $divisions
        ]);
    }
    // District List
    public function getdistrictbydivisionid(Request $request, $id)
    {

        $districtids = CourierHasDelivery::where('division_id', $id)->pluck('district_id')->unique();
        $districts = District::whereIn('id', $districtids)->get();

        return response()->json([
            'success' => true,
            'code'    => 201,
            'message' => 'Courer district list.',
            'data'    => $districts
        ]);
    }
    // Upazila List
    public function getgetupazilabydistrictid(Request $request, $id)
    {

            $upazilaids = CourierHasDelivery::where('district_id', $id)->pluck('upazila_id')->unique();

            $upazilas = Upazila::whereIn('id', $upazilaids)->get();

            return response()->json([
                'success' => true,
                'code'    => 201,
                'message' => 'Courer Upazila list.',
                'data'    => $upazilas
            ]);

    }



    public function ontest()
    {
        return 'some';
    }

    public function upazilaWiseCourierServiceList(Request $request)
    {

        $request->validate([
            'product_id' => 'required',
            'product_delivery_upazila_id' => 'required'
        ]);

            $product = Product::firstWhere('id', $request->product_id);

            $prdoduct_upazila_id         = $product->upazila_id;
            $product_delivery_upazila_id = $request->product_delivery_upazila_id;
            $product_weight              = 1;

            // return $product_delivery_upazila_id;


            $pickup = CourierHasPickup::where('upazila_id', $prdoduct_upazila_id)->pluck('courier_id')->unique()->toArray();
            $delivery = CourierHasDelivery::where('upazila_id', $product_delivery_upazila_id)->pluck('courier_id')->unique()->toArray();

            $courierids = array_intersect($pickup, $delivery);
            // return $delivery;

            $couriers = Courier::whereIn('id', $courierids)->get();

            $dhaka = [207, 208, 209, 210, 211, 499, 500, 501, 502, 503, 504, 505, 506, 507, 508, 509, 510, 511, 512, 513, 514, 515, 516, 517, 518, 519, 520, 521, 522, 523, 524, 525, 526, 527, 528, 529, 530, 531, 532, 533, 534, 535, 536, 537, 538, 539, 540];
            $data = [];
            foreach ($couriers as $courier) {

                if($courier->code == 'HESHEL'){
                    $data[] = [
                        'courier_id'   => $courier->id,
                        'name'    => $courier->name,
                        'price'    => 35,
                        'delivery_time'    => '24 Hours delivery time.',
                    ];
                }
                if($courier->code == 'PAPERFLY'){
                    $data[] = [
                        'courier_id'   => $courier->id,
                        'name'    => $courier->name,
                        'price'    => 110,
                        'delivery_time'    => 'Estimate delivery 3 to 7 days',
                    ];
                }


            }

            return response()->json([
                'success' => true,
                'code'    => 201,
                'message' => 'Courer Upazila list.',
                'data'    => $data
            ]);

    }
}
