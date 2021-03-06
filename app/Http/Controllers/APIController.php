<?php

namespace App\Http\Controllers;

use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Upazila;
use App\Models\Product\SubCategory;
use Illuminate\Http\Request;
use App\Models\Admin\Order\DeliverySystem;
use App\Models\Merchant\Shop;
use App\Models\Admin\Order\PaymentMethod;
use App\Models\Setting\SettingPaymentSystem;

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

    public function getDeliveryCost(Request $request)
    {
        // return $request->id;
        if($request->id){
        $deliverycost = DeliverySystem::where('id', $request->id)->first();
        return $deliverycost;
        }
    }

    public function getPaymentSystemName(Request $request)
    {
        // return $request->id;
        if($request->id){
        $name = PaymentMethod::where('id', $request->id)->first();
        return $name;
        }
    }

    public function getShop(Request $request)
    {
        if($request->id){
            $result = Shop::with('division', 'district', 'upazila')->where('id', $request->id)->first();

            return $result;

        }
    }

    public function settingPaymentSystem()
    {
        $payments = SettingPaymentSystem::select('payment_method_id')->get()->toArray();
        return $payments;
    }



}
