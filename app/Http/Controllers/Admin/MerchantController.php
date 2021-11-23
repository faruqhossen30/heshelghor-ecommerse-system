<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auth\Marchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function allMerchant()
    {
        $merchants = Marchant::latest()->paginate(10);
        // return $merchants;
        return view('admin.merchant.allmerchant', compact('merchants'));
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
}
