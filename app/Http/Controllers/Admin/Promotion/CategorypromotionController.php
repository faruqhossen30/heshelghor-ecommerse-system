<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorypromotionController extends Controller
{
    public function catpomotion()
    {
        return view('admin.promotion.categorypromotion');
    }
}
