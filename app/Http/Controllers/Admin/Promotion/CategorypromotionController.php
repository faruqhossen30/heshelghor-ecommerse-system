<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promotion\Categorypromotion;
use App\Models\Product\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Option;

class CategorypromotionController extends Controller
{
    public function catpomotion()
    {

        $categories = Category::with('subcategories')->latest()->get();
        $promotion_subcategoryies = option('promotion_subcategoryies');

        return view('admin.promotion.categorypromotion', compact('categories', 'promotion_subcategoryies'));
    }

    public function catpomotionstore(Request $request)
    {
        $subcategoryid = $request->sub_category_id;

        if (!empty($subcategoryid)) {

            option(['promotion_subcategoryies' => $request->sub_category_id]);
            return redirect()->back();
        }
    }
}
