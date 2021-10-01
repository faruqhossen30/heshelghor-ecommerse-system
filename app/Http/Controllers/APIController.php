<?php

namespace App\Http\Controllers;

use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Upazila;
use App\Models\Product\SubCategory;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getDistrictByDivisionID(Request $request)
    {
        if($request->division_id){
        $districtList = District::where('division_id', $request->division_id)->get();
        return $districtList;
        // return $request->division_id;
        }
    }
    public function getUpazilaByDistrictID(Request $request)
    {
        if($request->district_id){
        $upazillaList = Upazila::where('district_id', $request->district_id)->get();
        return $upazillaList;
        // return $request->division_id;
        }
    }

    public function getCommission(Request $request)
    {
        // return $request->id;
        if($request->id){
        $commission = SubCategory::where('id', $request->id)->get()->first();
        return $commission;
        }
    }
}
