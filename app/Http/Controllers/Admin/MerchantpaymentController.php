<?php

namespace App\Http\Controllers\Admin;

use App\Models\Withdrawral;
use Illuminate\Http\Request;
use App\Models\Auth\Marchant;
use App\Models\Merchant\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MerchantpaymentController extends Controller
{
    public function merchantPayment()
    {

        $allwithdraw = Withdrawral::with('merchant', 'shop')->latest()->get();
        // return $allwithdraw;
        return view('admin.payment.merchantpayment', compact('allwithdraw'));
    }


    public function MerchantpaymentDetails($id)
    {

        $withdraw = Withdrawral::with('merchant', 'shop')->OrderBy('id','desc')->get();
        // return  $withdraw;
        return view('admin.payment.marchentpaymentdtails', compact('withdraw'));
    }


    public function paymentStatus($id)
    {
        // $merchantId = Auth::guard('marchant')->user()->id;
        $withdrawsstatus = Withdrawral::select('status')
            ->where('id', '=', $id)
            ->first();

       

        if ($withdrawsstatus->status == 1 ) {
            $status = '0';
        } else {
            $status = '1';
        }
        $values = array('status' => $status);
        Withdrawral::where('id', $id)->update($values);
        return redirect()->back()->with('success', 'successfully data updated');
    }
}
