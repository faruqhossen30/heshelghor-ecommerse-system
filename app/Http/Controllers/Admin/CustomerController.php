<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function allCustomer()
    {
        $customers = User::latest()->paginate(10);

        // return $customers;
        return view('admin.customer.allcustomer', compact('customers'));

    }

    public function searchCustomer()
    {

        $searchkey  = request('searchkey');
        $searchtext = request('searchtext');

        $result     = User::all();

        if (isset($searchkey) && $searchkey !== "*")
            $result = User::where("$searchkey", 'like', "%$searchtext%")->get();
        elseif ($searchkey === "*") {
            $sql = User::orWhere("name", "like", "%$searchtext%")
                ->orWhere("email", "like", "%$searchtext%")
                ->orWhere("mobile", "like", "%$searchtext%");

            $result = $sql->get();
        }



        return response()->json($result, 200);
    }
}
