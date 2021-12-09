<?php

namespace App\Http\Controllers\DeliveryMan;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMan\DeliveryManCollectProduct;
use App\Models\PointManager\PointManagerCollectProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryManCollectProductController extends Controller
{
    public function stackProducts()
    {
        $productlist = DeliveryManCollectProduct::with('product','orderitem', 'point')->where('accept_status', false)->get();

        // return $productlist;

        return view('deliveryman.product.stack-products', compact('productlist'));
    }

    public function stackSingleproduct($id)
    {
        $product = DeliveryManCollectProduct::with('orderitem', 'point')->where('id', $id)->first();
        // return $product;
        return view('deliveryman.product.singleproduct', compact('product'));
    }

    public function acceptStackProduct($id)
    {
        $deliverymanId = Auth::guard('deliveryman')->user()->id;
        $product = DeliveryManCollectProduct::where('id', $id)->first();
        $pmproduct = PointManagerCollectProduct::where('id', $product->pmcp_id)->first();

        if($product->accept_status == 0){
            $product->accept_status = true;
            $product->accept_time = Carbon::now();
            $product->deliveryman_id = $deliverymanId;
            $product->save();

            $pmproduct->deliveryman_status = true;
            $pmproduct->deliveryman_accept_time = Carbon::now();
            $pmproduct->deliveryman_id = $deliverymanId;
            $pmproduct->save();

            return redirect()->back();
        }
    }

    public function processingProducts()
    {
        $deliverymanId = Auth::guard('deliveryman')->user()->id;
        $productlist = DeliveryManCollectProduct::with('product','orderitem', 'point')->where('deliveryman_id', $deliverymanId)->where('pointmanager_receive_status', false)->get();

        // return $productlist;
        return view('deliveryman.product.processingproduct', compact('productlist'));
    }

    public function submitedProducts()
    {
        $deliverymanId = Auth::guard('deliveryman')->user()->id;
        $productlist = DeliveryManCollectProduct::with('product','orderitem', 'point')->where('deliveryman_id', $deliverymanId)->where('pointmanager_receive_status', true)->get();

        // return $productlist;
        return view('deliveryman.product.submited-products', compact('productlist'));
    }
}
