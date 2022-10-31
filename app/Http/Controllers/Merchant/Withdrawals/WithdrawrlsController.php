<?php

namespace App\Http\Controllers\Merchant\Withdrawals;

use App\Http\Controllers\Controller;
use App\Models\Merchant\OrderItem;
use App\Models\Withdrawral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawrlsController extends Controller
{
    public function index()
    {
        $withdrawls = Withdrawral::latest()->get();
        $merchantId = Auth::guard('marchant')
        ->user()
        ->id;
        $totalwidrawals = OrderItem::where('merchant_id', $merchantId)
        ->where('accept_status','=','1')
        ->sum('price');


        $availablewithdrawal = OrderItem::where('merchant_id', $merchantId)
        ->where('complete_status','=','1')
        ->sum('price');

        $totalwidrawalscount = OrderItem::where('merchant_id', $merchantId)
        ->where('accept_status','=','1')
        ->count('price');
        $countcompletewithdrawal = OrderItem::where('merchant_id', $merchantId)
        ->where('complete_status','=','1')
        ->count('price');
        $prendingcount =$totalwidrawalscount - $countcompletewithdrawal ;

        

        // return $prendingcount;
        return view('marchant.withdrawals.index',
        compact('withdrawls','totalwidrawals','availablewithdrawal','countcompletewithdrawal','prendingcount'));
    }
    public function create()
    {
        return view('marchant.withdrawals.create');

    }

    public function store(Request $request)
    {

        // return $request->all();
        Withdrawral::create([
            'amount'      => $request->amount,
            'payment_id'  => $request->payment_id,
            'description' => $request->description,

        ]);
        return redirect()->route('Withdrawal.index')->with('success','Successfully data added');
    }
}
