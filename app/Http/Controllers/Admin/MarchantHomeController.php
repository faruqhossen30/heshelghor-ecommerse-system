<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;

class MarchantHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('isMarchent');
    }
    public function index()
    {
        $userID = Auth::guard('marchant')->user()->id;
        $productcount = Product::where('author_id', $userID)->count();

        // return $productcount;
        return view('marchant.home', compact('productcount'));
    }
}
