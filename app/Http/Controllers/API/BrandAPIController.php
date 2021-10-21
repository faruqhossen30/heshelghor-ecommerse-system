<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Brand;

class BrandAPIController extends Controller
{
    public function brands()
    {
        $shops = Brand::latest()->paginate(30);
        return $shops;
    }
}
