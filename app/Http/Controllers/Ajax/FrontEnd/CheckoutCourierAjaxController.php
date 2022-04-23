<?php

namespace App\Http\Controllers\Ajax\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin\Courier\CourierHasDelivery;
use App\Models\Admin\Courier\CourierHasPickup;
use App\Models\Admin\Location\Division;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class CheckoutCourierAjaxController extends Controller
{
    public function getDivision(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $product = Product::firstWhere('id', $id);

            // $pickup = CourierHasPickup::where('division_id', $product->upazila_id)->pluck('division_id')->unique();
            $delivery = CourierHasDelivery::pluck('division_id')->unique();

            $divisions = Division::whereIn('id', $delivery)->get();

            $data =  view('frontend.partials.checkout.deliverydivisions', compact('divisions'));
            return $data;
        }
    }
}
