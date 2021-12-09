<?php

namespace App\Http\Controllers\PointManager;

use App\Http\Controllers\Controller;
use App\Models\PointManager\PointManagerCollectProduct;
use App\Models\DeliveryMan\DeliveryManCollectProduct;
use App\Models\Merchant\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointManagerCollectProductController extends Controller
{
    public function stackProducts()
    {
        $productlist = PointManagerCollectProduct::with('orderitem', 'shop', 'product')->where('accept_status', 0)->get();

        // return $productlist;

        return view('pointmanager.collect.stack-products', compact('productlist'));
    }

    public function stackSingleProduct($id)
    {
        $product = PointManagerCollectProduct::with('orderitem', 'shop', 'product', 'deliveryaddress')->where('id', $id)->first();
        // return $product;
        return view('pointmanager.collect.stack-single-product', compact('product'));
    }

    public function acceptProduct($id)
    {
        $pointmanagerId = Auth::guard('pointmanager')->user()->id;

        $item = PointManagerCollectProduct::where('id', $id)->first();
        $orderItem = OrderItem::where('id', $item->orderitem_id)->first();

        if ($item->accept_status == 0) {
            $update = PointManagerCollectProduct::where('id', $id)->update([
                'accept_status' => true,
                'accept_time' => Carbon::now(),
                'pointmanager_id' => $pointmanagerId
            ]);
            if($update){
                $commission = ($orderItem->delivery_cost * 40)/100;
                $total_commision = $commission * $orderItem->quantity;

                DeliveryManCollectProduct::create([
                    'product_id'       => $item->product_id,
                    'invoice_id'       => $item->invoice_id,
                    'orderitem_id'     => $item->orderitem_id,
                    'shop_id'          => $item->shop_id,
                    'pointmanager_id'  => $pointmanagerId,
                    'pmcp_id'          => $item->id,
                    'commission'       => $commission,
                    'total_commission' => $total_commision
                ]);
                return redirect()->route('pointmanager.stack.products');
            }
        }
    }

    // Processing Product List
    public function queueProducts()
    {
        $pointmanagerId = Auth::guard('pointmanager')->user()->id;

        $productlist = PointManagerCollectProduct::with('orderitem', 'shop', 'product')->where('pointmanager_id', $pointmanagerId)->where('accept_status', true)->where('deliveryman_status', false)->get();
        $total = $productlist->count();
        // return $total;

        return view('pointmanager.collect.queue-products', compact('productlist', 'total'));
    }

    public function queueSingleProduct($id)
    {
        $pointmanagerId = Auth::guard('pointmanager')->user()->id;

        $product = PointManagerCollectProduct::with('orderitem', 'shop', 'product')->where('pointmanager_id', $pointmanagerId)->where('accept_status', true)->where('id', $id)->first();

        // return $product;
        return view('pointmanager.collect.queue-single-product', compact('product'));
    }

    // public function singleProcessingProductList($id)
    // {
    //     $pointmanagerId = Auth::guard('pointmanager')->user()->id;
    //     $product = PointManagerCollectProduct::with('orderitem', 'shop', 'product')->where('pointmanager_id', $pointmanagerId)->where('product_receive_status', false)->where('id', $id)->first();
    //     return $product;
    //     return view('pointmanager.collect.singleproduct', compact('product'));
    // }

    public function processingProducts()
    {
        $pointmanagerId = Auth::guard('pointmanager')->user()->id;

        $productlist = PointManagerCollectProduct::where('pointmanager_id', $pointmanagerId)->where('accept_status', true)->where('deliveryman_status', true)->where('product_receive_status', false)->get();

        // return $productlist;

        return view('pointmanager.collect.processing-products', compact('productlist'));
    }

    public function processingSingleProduct($id)
    {
        $pointmanagerId = Auth::guard('pointmanager')->user()->id;

        $product = PointManagerCollectProduct::where('pointmanager_id', $pointmanagerId)->where('accept_status', true)->where('deliveryman_status', true)->where('id', $id)->first();

        // return $product;
        return view('pointmanager.collect.processing-single-product', compact('product'));
    }

    public function processingProductReceive($id)
    {
        $pointmanagerId = Auth::guard('pointmanager')->user()->id;

        $product = PointManagerCollectProduct::where('pointmanager_id', $pointmanagerId)->where('accept_status', true)->where('deliveryman_status', true)->where('id', $id)->first();

        $deliveryman = DeliveryManCollectProduct::where('pointmanager_id', $pointmanagerId)->where('pmcp_id', $id)->first();
        // return $deliveryman;


        if($product->product_receive_status == 0){
            $product->product_receive_status = true;
            $product->product_receive_time = Carbon::now();
            $product->save();

            $deliveryman->pointmanager_receive_status = true;
            $deliveryman->pointmanager_receive_time = Carbon::now();
            $deliveryman->save();

        }

        return redirect()->route('pointmanager.processing.products');
    }
}
