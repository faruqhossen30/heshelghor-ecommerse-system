<?php

namespace App\Http\Controllers\PointManager;

use App\Http\Controllers\Controller;
use App\Models\PointManager\PointManagerCollectProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointManagerCollectProductController extends Controller
{
    public function allCollectProductList()
    {
        $productlist = PointManagerCollectProduct::with('orderitem', 'shop', 'product')->get();

        // return $productlist;

        return view('pointmanager.collect.collectproduct', compact('productlist'));
    }

    public function singleCollectProduct($id)
    {
        $product = PointManagerCollectProduct::with('orderitem', 'shop', 'product', 'deliveryaddress')->where('id', $id)->first();
        // return $product;
        return view('pointmanager.collect.singleproduct', compact('product'));
    }

    public function acceptProduct($id)
    {
        $pointmanagerId = Auth::guard('pointmanager')->user()->id;

        $item = PointManagerCollectProduct::where('id', $id)->first();

        if ($item->accept_status == 0) {
            $update = PointManagerCollectProduct::where('id', $id)->update([
                'accept_status' => true,
                'accept_time' => Carbon::now(),
                'pointmanager_id' => $pointmanagerId
            ]);
            if($update){
                return redirect()->route('pointmanager.collect.product');
            }
        }
    }
}
