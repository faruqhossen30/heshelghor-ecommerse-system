<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auth\Marchant;
use App\Models\Merchant\Shop;
use App\Models\Product\Product;
use App\Models\Withdrawral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    public function allMerchant()
    {
        $merchants = Marchant::latest()->paginate(10);
        // return $merchants;
        return view('admin.merchant.allmerchant', compact('merchants'));
    }
    public function allshoplist()
    {
        $shops = Shop::orderBy('id', 'desc')->get();
        // return $shops;
        return view('admin.merchant.allshoplist', compact('shops'));
    }
    public function viewshop($id)
    {
        $shop = Shop::where('id', $id)->first();
        // return $shop;
        return view('admin.merchant.viewshop', compact('shop'));
    }
    public function activeshop($id)
    {
        $shops = Shop::where('id', $id)->update(['status'=> 1]);
        // return $shops;
        Product::where('shop_id', $id)->update(['status'=>1]);
        return redirect()->route('shop.list.all');
    }
    public function deactive($id)
    {
        $shops = Shop::where('id', $id)->update(['status'=> 0]);

        Product::where('shop_id', $id)->update(['status'=>0]);
        // return $shops;
        return redirect()->route('shop.list.all');
    }

    public function searchMerchant()
    {
        $searchkey  = request('searchkey');
        $searchtext = request('searchtext');

        $result     = Marchant::all();

        if (isset($searchkey) && $searchkey !== "*")
            $result = Marchant::where("$searchkey", 'like', "%$searchtext%")->get();
        elseif ($searchkey === "*") {
            $sql = Marchant::orWhere("name", "like", "%$searchtext%")
                ->orWhere("email", "like", "%$searchtext%")
                ->orWhere("phone_number", "like", "%$searchtext%");

            $result = $sql->get();
        }

        return response()->json($result, 200);
    }


    // public function merchantPayment( $merchantId){

    //     // $merchantId = Auth::guard('marchant')
    //     // ->user()
    //     // ->id;
    //     $paymentmethodlist = Withdrawral::where('merchant_id',$merchantId)->latest()->get();

    //     return $merchantId;
    //     return view('admin.payment.merchantpayment',compact('paymentmethodlist'));
    // }
}
