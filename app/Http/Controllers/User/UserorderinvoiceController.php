<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Order;
use App\Models\Merchant\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;

class UserorderinvoiceController extends Controller
{

    public function pdf(Request $request, $id)

    {
     $order = Order::with('orderitems')->where('user_id', Auth::user()->id)->where('id', $id)->get();

            // return  $order
            $orderstatus = Order::with('orderitems')->firstWhere('id', $id);
            // return $complain ;

             $html = view('frontend.userorderinvoice',compact('order','orderstatus' ))->render();

            $mpdf = new \Mpdf\Mpdf([
                    'default_font_size' => '24',
                    'default_font' => 'nikosh',
                    'format' => 'A4-L'
                ]);
                    $mpdf->WriteHTML($html);
                    $mpdf->Output();
   }

}
