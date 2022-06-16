<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promotion\Categorypromotion;
use App\Models\Product\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorypromotionController extends Controller
{
    public function catpomotion()
    {

        $categories = Category::with('subcategories')->latest()->get();
        $promotionnalsubcategoryid = Categorypromotion::get()->pluck('sub_category_id')->toArray();

        // return $promotionnalsubcategoryid;
        return view('admin.promotion.categorypromotion', compact('categories', 'promotionnalsubcategoryid'));
    }

    public function catpomotionstore(Request $request)
    {

        // $subcatid = $request->sub_category_id;

        $subcategoryid = $request->sub_category_id;

        if (!empty($subcategoryid)) {

            foreach ($subcategoryid as $subcategory) {
                // echo $subcategory;
                Categorypromotion::Create([
                    'sub_category_id' =>  $subcategory,
                    'author_id'       => Auth::guard('admin')->user()->id,
                ]);
            }
            return redirect()->back();
        }
    }
}
