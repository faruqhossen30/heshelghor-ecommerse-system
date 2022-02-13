<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Brand;

class BrandAPIController extends Controller
{
    public function brands()
    {
        $shops = Brand::latest()->paginate(15);
        return $shops;
    }
    public function allbarand()
    {
        $shops = Brand::select('id', 'name', 'img_small')->orderby('name', 'asc')->get();
        return $shops;
    }
}
