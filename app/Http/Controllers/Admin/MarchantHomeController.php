<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarchantHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('isMarchent');
    }
    public function index()
    {
        return view('marchant.home');
    }
}
