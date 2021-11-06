<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Brand;
use App\Models\Merchant\Shop;

class SearchAPIController extends Controller
{
    public function searchProduct($keyword)
    {
        if ($keyword) {
            $trimkeyword = trim($keyword);

            $result = Product::where('title', 'like', "%$trimkeyword%")
                ->orWhere('description', 'like', "%$trimkeyword%")
                ->paginate(25);

            return response()->json([
                'success' => true,
                'status'  => 200,
                'message' => 'Ok',
                'data'    => $result
            ]);
        }
    }
    public function searchBrand($keyword)
    {
        if ($keyword) {
            $trimkeyword = trim($keyword);

            $result = Brand::where('name', 'like', "%$trimkeyword%")
                ->paginate(25);

            return response()->json([
                'success' => true,
                'status'  => 200,
                'message' => 'Ok',
                'data'    => $result
            ]);
        }
    }
    // Search Shop
    public function searchShop($keyword)
    {
        if ($keyword) {
            $trimkeyword = trim($keyword);

            $result = Shop::where('name', 'like', "%$trimkeyword%")
                ->paginate(25);

            return response()->json([
                'success' => true,
                'status'  => 200,
                'message' => 'Ok',
                'data'    => $result
            ]);
        }
    }
}
