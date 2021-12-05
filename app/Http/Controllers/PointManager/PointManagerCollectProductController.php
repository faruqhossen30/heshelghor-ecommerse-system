<?php

namespace App\Http\Controllers\PointManager;

use App\Http\Controllers\Controller;
use App\Models\PointManager\PointManagerCollectProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointManagerCollectProductController extends Controller
{
    public function allCollectProductList()
    {
        $productlist = PointManagerCollectProduct::with('orderitem', 'product')->get();
        // return $productlist;

        return view('pointmanager.collect.collectproduct', compact('productlist'));
    }

    public function singleCollectProduct($id)
    {
        $product = PointManagerCollectProduct::with('orderitem', 'product', 'deliveryaddress')->where('id', $id)->first();
        // return $product;
        return view('pointmanager.collect.singleproduct', compact('product'));
    }

    public function acceptProduct($id)
    {
        $pointmanagerId = Auth::guard('pointmanager')->user()->id;

        $orderItem = OrderItem::with('user')->where('id', $id)->first();
        $update = OrderItem::where('id', $id)->update([
            'order_status' => true
        ]);
    }
}
