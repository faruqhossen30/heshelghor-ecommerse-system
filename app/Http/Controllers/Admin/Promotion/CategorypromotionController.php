<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promotion\Categorypromotion;
use App\Models\Product\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorypromotionController extends Controller
{
    public function catpomotion(Request $request )
    {
        return view('admin.promotion.categorypromotion');
    }

    public function catpomotionstore(Request $request){

        $subcatid = $request->sub_category_id;

        // return $subcatid;

        Categorypromotion::Create([

            'sub_category_id' => $request->sub_category_id,
            'author_id'       => Auth::guard('admin')->user()->id,
        ]);

    }
}


