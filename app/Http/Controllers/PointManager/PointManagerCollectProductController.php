<?php

namespace App\Http\Controllers\PointManager;

use App\Http\Controllers\Controller;
use App\Models\PointManager\PointManagerCollectProduct;
use Illuminate\Http\Request;

class PointManagerCollectProductController extends Controller
{
    public function allCollectProductList()
    {
        $productlist = PointManagerCollectProduct::with('orderitem', 'product')->get();
        // return $productlist;

        return view('pointmanager.collect.collectproduct', compact('productlist'));
    }
}
