<?php

namespace App\Http\Controllers\Merchant\Withdrawals;

use App\Models\Withdrawral;
use Illuminate\Http\Request;
use App\Models\Merchant\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WithdrawrlsController extends Controller
{
    public function index()
    {
        $merchantId = Auth::guard('marchant')->user()->id;
        $withdrawls = Withdrawral::where('merchant_id', $merchantId)->latest()->get();

        $requestwidrawalsamount = Withdrawral::where('merchant_id', $merchantId)
            ->where('status', '=', '1')
            ->sum('amount');

        $totalwidrawals = OrderItem::where('merchant_id', $merchantId)
            ->where('accept_status', '=', '1')
            ->sum('price');


        $availablewithdrawal = OrderItem::where('merchant_id', $merchantId)
            ->where('complete_status', '=', '1')
            ->sum('price');

        $totalwidrawalscount = OrderItem::where('merchant_id', $merchantId)
            ->where('accept_status', '=', '1')
            ->count('price');
        $countcompletewithdrawal = OrderItem::where('merchant_id', $merchantId)
            ->where('complete_status', '=', '1')
            ->count('price');
        $prendingcount = $totalwidrawalscount - $countcompletewithdrawal;

        $accountbalance = $availablewithdrawal -  $requestwidrawalsamount;

        // return $accountbalance;
        return view(
            'marchant.withdrawals.index',
            compact('withdrawls', 'totalwidrawals', 'accountbalance', 'countcompletewithdrawal', 'prendingcount')
        );
    }
    public function create()
    {

        return  view('marchant.withdrawals.create');
    }

    public function store(Request $request)
    {
        $merchantId = Auth::guard('marchant')->user()->id;
        $availablewithdrawal = OrderItem::where('merchant_id', $merchantId)
            ->where('complete_status', '=', '1')
            ->sum('price');

        $requestwidrawalsamount = Withdrawral::where('merchant_id', $merchantId)
            ->where('status', '=', '1')
            ->sum('amount');
        $requestwidrawalsmoney = Withdrawral::where('merchant_id', $merchantId)->latest()->get();

        // return $requestwidrawalsmoney ;
        $pendingamount = Withdrawral::where('merchant_id', $merchantId)
            ->where('status', '=', '0')
            ->sum('amount');

        $accountbalance = $availablewithdrawal -  $requestwidrawalsamount;

        $validate = $request->validate([
            'amount'      => 'required',
            'payment_id'  => 'required',
            'description' => 'required',
        ], [
            'amount.required' => 'please minimum 50 tk enter',
        ]);
        $data = [
            'amount'      => $request->amount,
            'payment_id'  => $request->payment_id,
            'description' => $request->description,
            'merchant_id' => Auth::guard('marchant')->user()->id,
        ];
        // return  $pendingamount;
        if (
         $request->input('amount') < $accountbalance && $pendingamount < $accountbalance  && $requestwidrawalsmoney[0]->status == 1) {

            Withdrawral::create($data);
        } else {
            return redirect()->route('Withdrawal.index')->with('error', 'Insufficient Balance');
        }


        return redirect()->route('Withdrawal.index')->with('success', 'Successfully data added');
    }
}
