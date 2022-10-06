<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class UserorderinvoiceController extends Controller
{
    public function index(){
        return view('frontend.ordercomplete');
    }
    public function pdf(Request $request, $type='stream')
   {
    $userId = Auth::user()->id;
    // dd($userId);
    $order = Order::with('orderitems')->where('user_id', $userId)->first();

    // dd( $order);
    // return $order;
    $pdf = pdf::loadView('frontend.userorderinvoice',compact('order'));

    return $type == 'stream' ? $pdf ->setPaper('a4', 'landscape')->stream() :  $pdf ->download('invoice.pdf');
   }
}
