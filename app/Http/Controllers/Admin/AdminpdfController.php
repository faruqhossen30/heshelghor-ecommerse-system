<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminpdfController extends Controller
{
    public function index()
    {
        return view('admin.sales.index');
    }
    public function pdf($type = 'stream')
    {
        $showProduct=OrderItem::with('user','product','order')->get();
        // return $showProduct;
        $pdf = PDF::loadView('admin.sales.invoice',['showProduct'=>$showProduct]);
        return $type == 'stream' ? $pdf->stream() : $pdf->download('invoice.pdf');
    }
}
