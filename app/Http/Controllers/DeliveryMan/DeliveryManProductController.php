<?php

namespace App\Http\Controllers\DeliveryMan;

use App\Http\Controllers\Controller;
use App\Models\PointManager\PointManagerCollectProduct;
use App\Models\DeliveryMan\DeliveryManCollectProduct;
use Carbon\Carbon;
use Facade\FlareClient\Flare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryManProductController extends Controller
{
    public function productList()
    {
        $productlist = DeliveryManCollectProduct::with('product','orderitem', 'point')->where('accept_status', false)->get();

        // return $productlist;

        return view('deliveryman.product.collectproduct', compact('productlist'));
    }

    public function singleproduct($id)
    {
        $product = DeliveryManCollectProduct::with('orderitem', 'point')->where('id', $id)->first();
        // return $product;
        return view('deliveryman.product.singleproduct', compact('product'));
    }

    public function acceptproduct($id)
    {
        $deliverymanId = Auth::guard('deliveryman')->user()->id;
        $product = DeliveryManCollectProduct::where('id', $id)->first();

        if($product->accept_status == 0){
            $product->accept_status = true;
            $product->accept_time = Carbon::now();
            $product->deliveryman_id = $deliverymanId;
            $product->save();

            return redirect()->back();
        }
    }

    public function processingProduct()
    {
        $deliverymanId = Auth::guard('deliveryman')->user()->id;
        $productlist = DeliveryManCollectProduct::with('product','orderitem', 'point')->where('deliveryman_id', $deliverymanId)->get();

        // return $productlist;
        return view('deliveryman.product.processingproduct', compact('productlist'));
    }

}
