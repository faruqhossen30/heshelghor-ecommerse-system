<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auth\Marchant;
use App\Models\Withdrawral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantpaymentController extends Controller
{
   public function merchantPayment(){

    $merchants = Marchant::latest()->get();

    return view('admin.payment.merchantpayment',compact('merchants'));

   }


   public function MerchantpaymentController($id)
   {


   //  $withdrawls = Withdrawral::with('')->where('id',$id)->latest()->get();

   //  return $withdrawls;
    return view('admin.payment.merchantpaymentlist',compact('withdrawls'));
   }
}
