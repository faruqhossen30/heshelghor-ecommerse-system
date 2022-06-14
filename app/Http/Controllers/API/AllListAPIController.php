<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin\Attribute\Color;
use App\Models\Admin\Attribute\Size;
use App\Models\Admin\Market;
use App\Models\Admin\Order\DeliverySystem;
use App\Models\Product\Brand;
use App\Models\Auth\Marchant;
use App\Models\Product\Category;
use App\Models\Product\SubCategory;
use Illuminate\Http\Request;
use App\Models\Merchant\Shop;

class AllListAPIController extends Controller
{
    // All Category
    public function allCategory()
    {
        $categories = Category::paginate(5);
        return $categories;
    }
    // All Sub-Category
    public function allSubCategory()
    {
        $subcategories = SubCategory::all();
        return $subcategories;
    }
    // All Sub-Category
    public function subCategoryByCategory(Request $request, $id)
    {
        $subcategories = SubCategory::where('category_id', $id)->get();
        return $subcategories;
    }

    // All Brand
    public function allBrand()
    {
        $brands = Brand::all();
        return $brands;
    }
    // All Merchant
    public function allMerchant()
    {
        $merchants = Marchant::all();
        return $merchants;
    }
    // All Shoplist
    public function allShop()
    {
        $merchants = Shop::active()->all();
        return $merchants;
    }
    // allMarket
    public function allMarket()
    {
        $markets = Market::orderBy('name', 'asc')->get();
        return response()->json([
            'success' => true,
            'code'=>200,
            'data' => $markets
        ]);
    }

    public function deliverySystem()
    {
        $deliverysystem = DeliverySystem::get();
        return $deliverysystem;
    }
    // All Colors
    public function allColor()
    {
        $colors = Color::orderBy('name', 'asc')->get();
        return response()->json([
            'success' => true,
            'code'=>200,
            'data' => $colors
        ]);
    }
    public function allSize()
    {
        $sizes = Size::orderBy('name', 'asc')->get();
        return response()->json([
            'success' => true,
            'code'=>200,
            'data' => $sizes
        ]);
    }

    public function getShopWithLocation(Request $request)
    {
        if($request->id){
            $result = Shop::active()->with('division', 'district', 'upazila')->where('id', $request->id)->first();

            return response()->json([
                'success' => true,
                'code'=>200,
                'data' => $result
            ]);

        }
    }

}
