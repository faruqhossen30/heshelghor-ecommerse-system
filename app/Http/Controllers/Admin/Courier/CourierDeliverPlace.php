<?php

namespace App\Http\Controllers\Admin\Courier;

use App\Http\Controllers\Controller;
use App\Models\Admin\Courier\Courier;
use App\Models\Admin\Courier\CourierHasDelivery;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use Illuminate\Http\Request;

class CourierDeliverPlace extends Controller
{

    public function addDeliveryPlace(Request $request,$id)
    {
        $courier = Courier::where('id', $id)->first();
        $divisions = Division::with('districts')->get();

        $deliveryplace = CourierHasDelivery::where('courier_id', $id)->pluck('upazila_id')->toArray();

        // return $deliveryplace;

        return view('admin.courier.deliveryplace', compact('courier', 'divisions', 'deliveryplace'));
    }

    public function updateDeliveryPlace(Request $request,$id)
    {

        $data = $request->upazilas;

        if(!empty($data)){
            CourierHasDelivery::where('courier_id', $id)->delete();
            foreach ($data as $upaliza) {
                CourierHasDelivery::create([
                    'courier_id' => $id,
                    'distric_id' => $this->getDistrictID($upaliza),
                    'upazila_id' => $upaliza
                ]);
            }
        }

        return redirect()->route('courier.index');
    }

    public function getDistrictID($id)
    {
        $upazila = Upazila::get();
        $collection = collect($upazila);
        return  $collection->firstWhere('id', $id)->district_id;

    }
}
