<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Shop;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index(Request $request)
    {
        $date_from = null;
        $date_to = null;
        $shop_id = null;

        if (isset($_GET['date_from'])) {
            $date_from = $_GET['date_from'];
        }
        if (isset($_GET['date_to'])) {
            $date_to = $_GET['date_to'];
        }
        if (isset($_GET['shop_id'])) {
            $shop_id = $_GET['shop_id'];
        }
        $shops = Shop::get();

        if ($date_from && $date_to) {
            $products = Product::with('shop')->whereBetween('created_at', [$date_from, $date_to])
                ->when($shop_id, function ($query, $shop_id) {
                    return $query->where('shop_id', $shop_id);
                })
                ->paginate(25);
            // return $products;
            return view('admin.promotion.index', compact('products', 'shops'));
        }
        if (!$date_from && $date_to) {
            $products = Product::with('shop')->whereDate('created_at', $date_to)
                ->when($shop_id, function ($query, $shop_id) {
                    return $query->where('shop_id', $shop_id);
                })
                ->paginate(25);
            return view('admin.promotion.index', compact('products', 'shops'));
        }

        $products = Product::with('shop')
        ->when($shop_id, function ($query, $shop_id) {
            return $query->where('shop_id', $shop_id);
        })->paginate(25);

        return view('admin.promotion.index', compact('products', 'shops'));



        // $products = Product::select('title', 'slug', 'created_at')->get();

        // return $products;
    }
    public function shop(Request $request)
    {
        $date_from = null;
        $date_to = null;
        $shop_id = null;

        if (isset($_GET['date_from'])) {
            $date_from = $_GET['date_from'];
        }
        if (isset($_GET['date_to'])) {
            $date_to = $_GET['date_to'];
        }
        if (isset($_GET['shop_id'])) {
            $shop_id = $_GET['shop_id'];
        }
        $allshop = Shop::get();

        if ($date_from && $date_to) {
            $shops = Shop::with('shop')->whereBetween('created_at', [$date_from, $date_to])
                ->when($shop_id, function ($query, $shop_id) {
                    return $query->where('shop_id', $shop_id);
                })
                ->paginate(25);
            // return $shops;
            return view('admin.promotion.shop', compact('shops', 'allshop'));
        }
        if (!$date_from && $date_to) {
            $shops = Product::with('shop')->whereDate('created_at', $date_to)
                ->when($shop_id, function ($query, $shop_id) {
                    return $query->where('shop_id', $shop_id);
                })
                ->paginate(25);
            return view('admin.promotion.shop', compact('shops', 'allshop'));
        }

        $shops = Product::with('shop')
        ->when($shop_id, function ($query, $shop_id) {
            return $query->where('shop_id', $shop_id);
        })->paginate(25);

        return view('admin.promotion.shop', compact('shops', 'allshop'));



        // $products = Product::select('title', 'slug', 'created_at')->get();

        // return $products;
    }
}
