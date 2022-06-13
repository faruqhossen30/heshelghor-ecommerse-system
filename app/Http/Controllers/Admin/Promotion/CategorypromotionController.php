<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promotion\Categorypromotion;
use Illuminate\Http\Request;

class CategorypromotionController extends Controller
{
    public function catpomotion(Request $request)
    {
        $catpromotion =Categorypromotion::all();
        // return $catpromotion;
        return view('admin.promotion.categorypromotion');
    }
}


