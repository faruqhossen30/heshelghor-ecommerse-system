<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin\Courier\CourierHasDelivery;
use App\Models\Admin\Location\District;
use App\Models\Admin\Location\Division;
use App\Models\Admin\Location\Upazila;
use App\Models\Admin\Order\DeliverySystem;
use App\Models\Admin\Order\PaymentMethod;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;

class BuyNowController extends Controller
{
    public function buyNow(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            $divisionids = CourierHasDelivery::pluck('division_id')->unique();
            $divisions = Division::whereIn('id', $divisionids)->get();

            // $divisions = Division::all();
            $userId = Auth::user()->id;
            $user = User::where('id', $userId)->first();

            $upazilas = Upazila::all();

            $cartItems = Cart::content();
            $deliverysystems = DeliverySystem::all();
            $pamymentmethods = PaymentMethod::all();

            // return $cartItems;
            return view('frontend.buy-now', compact(
                'product',
                'divisions',
                'user',
                'divisions',
                'upazilas',
                'cartItems',
                'deliverysystems',
                'pamymentmethods',
            ));
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
