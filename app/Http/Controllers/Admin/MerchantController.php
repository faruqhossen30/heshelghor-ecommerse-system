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
}
