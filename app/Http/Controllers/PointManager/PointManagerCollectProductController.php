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
    public function allCollectProductList()
    {
        $productlist = PointManagerCollectProduct::with('orderitem', 'shop', 'product')->where('accept_status', 0)->get();

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
                return redirect()->route('pointmanager.collect.product');
            }
        }
    }

    // Processing Product List
    public function processingProductList()
    {
        $pointmanagerId = Auth::guard('pointmanager')->user()->id;

        $productlist = PointManagerCollectProduct::with('orderitem', 'shop', 'product')->where('pointmanager_id', $pointmanagerId)->get();
        // return $productlist;

        return view('pointmanager.collect.processingproduct', compact('productlist'));
    }
}
