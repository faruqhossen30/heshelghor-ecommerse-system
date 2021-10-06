<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use App\Models\Auth\Marchant;
use App\Models\Product\Category;
use App\Models\Product\SubCategory;
use Illuminate\Http\Request;

class AllListAPIController extends Controller
{
    // All Category
    public function allCategory()
    {
        $categories = Category::all();
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

}
