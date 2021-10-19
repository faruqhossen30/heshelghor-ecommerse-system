<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Admin\Location\Division;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin\Location\Upazila;
use App\Models\Admin\Order\DeliverySystem;
use App\Models\Admin\Order\PaymentMethod;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $divisions = Division::all();
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();

        $upazilas = Upazila::all();

        $cartItems = Cart::content();
        $deliverysystems = DeliverySystem::all();
        $pamymentmethods = PaymentMethod::all();

        // return $cartItems;
        return view('frontend.checkout', compact(
            'divisions',
            'user',
            'divisions',
            'upazilas',
            'cartItems',
            'deliverysystems',
            'pamymentmethods',
        ));
    }
}
