<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promotion\Slider;
use App\Models\Product\SubCategory;
use Illuminate\Http\Request;

class SliderajaxController extends Controller
{
    public function CategorytoSubcategory (Request $request, $id)
    {
        // if($request->ajax()){
            $subcategory = SubCategory::where('category_id', $id)->orderBy('name', 'asc')->get();
            $data = view('admin.slider.ajaxcategoey', compact('subcategory'))->render();
            return $data;
        // }
    }
}
