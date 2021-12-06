<?php

namespace App\Http\Controllers\DeliveryMan;

use App\Http\Controllers\Controller;
use App\Models\PointManager\PointManagerCollectProduct;
use App\Models\DeliveryMan\DeliveryManCollectProduct;

use Illuminate\Http\Request;

class DeliveryManProductController extends Controller
{
    public function productList()
    {
        $productlist = DeliveryManCollectProduct::get();

        // return $productlist;

        return view('deliveryman.product.collectproduct', compact('productlist'));
    }
}
