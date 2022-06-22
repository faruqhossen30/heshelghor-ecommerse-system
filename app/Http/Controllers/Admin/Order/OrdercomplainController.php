<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\User\Usercomplain;
use Illuminate\Http\Request;

class OrdercomplainController extends Controller
{
    public function allcomplain(){

        $allcomplain = Usercomplain::all();
        // return  $allcomplain;
        return view('admin.order.allcomplain',compact('allcomplain'));
    }
}
