<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminsalesController extends Controller
{
    public function index()
    {
       $orders =OrderItem::with('user','merchant','product','order')->get();
       // return $orders;
       return view('admin.sales.index',compact('orders'));
    }
    public function salesProductShow($id)
    {
       $showProduct=OrderItem::with('user','product','order')->where('id',$id)->first();
    //    return $showProduct;
       return view('admin.sales.show',compact('showProduct'));
    }
    public function salesProductDestroy($id)
    {
       $orderDestroy=OrderItem::find($id);
       $orderDestroy->delete();
       Session::flash('delete');
       return redirect()->back();
    }
}
