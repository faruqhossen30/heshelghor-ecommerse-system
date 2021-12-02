<?php

namespace App\Http\Controllers\DeliveryMan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryManHomeController extends Controller
{
    public function index()
    {
        return view('deliveryman.home');
    }
}
