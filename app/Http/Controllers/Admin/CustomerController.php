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
}
