<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product\Brand;

class MyBrandController extends Controller
{
    public function index()
    {
        $merchantId = Auth::guard('marchant')->user()->id;
        // return $merchantId;
        $brands = Brand::where('author', 'merchant')->where('author_id', $merchantId)->get();
        return view('marchant.brand.myaddedbrand', compact('brands'));
    }
}
