<?php

namespace App\Http\Controllers\Admin\Courier;

use App\Http\Controllers\Controller;
use App\Models\Admin\Courier\Courier;
use App\Models\Admin\Courier\CourierHasDelivery;
use App\Models\Admin\Courier\CourierHasPickup;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use Illuminate\Http\Request;

class CourierPickupPlace extends Controller
{

    public function addPickupPlace(Request $request,$id)
    {
        $courier = Courier::where('id', $id)->first();
        $divisions = Division::with('districts')->get();

        $deliveryplace = CourierHasPickup::where('courier_id', $id)->pluck('upazila_id')->toArray();

        // return $deliveryplace;

        return view('admin.courier.pickupplace', compact('courier', 'divisions', 'deliveryplace'));
    }

    public function updateDeliveryPlace(Request $request,$id)
    {

        $data = $request->upazilas;

        if(!empty($data)){
            CourierHasPickup::where('courier_id', $id)->delete();
            foreach ($data as $upaliza) {
                CourierHasPickup::create([
                    'courier_id' => $id,
                    'division_id' => $this->getDivisionID($upaliza),
                    'district_id' => $this->getDistrictID($upaliza),
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
    public function getDivisionID($id)
    {
        $upazila = Upazila::get();
        $collection = collect($upazila);
        return  $collection->firstWhere('id', $id)->division_id;

    }
}
