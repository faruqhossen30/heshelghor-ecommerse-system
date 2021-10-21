<?php

namespace App\Http\Controllers\API\Location;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use Illuminate\Http\Request;

class LocationAPIController extends Controller
{
    // All Divisions
    public function divisions()
    {
        $divisions = Division::all();
        return $divisions;
    }
    // All Districs
    public function districts()
    {
        $districts = District::all();
        return $districts;
    }
    // All Upazila
    public function upazilas()
    {
        $upazilas = Upazila::all();
        return $upazilas;
    }
    // getDristrictByDivision
    public function getDristrictByDivision($id)
    {
        $districs = District::where('division_id', $id)->get();
        return $districs;
    }
    // getUpazillaByDistrict
    public function getUpazillaByDistrict($id)
    {
        $upazilas = Upazila::where('district_id', $id)->get();
        return $upazilas;
    }
}

