<?php

namespace App\Http\Controllers\PointManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PointManagerHomeController extends Controller
{
    public function index()
    {
        return view('pointmanager.home');
    }
}
