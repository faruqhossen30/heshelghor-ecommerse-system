<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homePage()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('frontend.homepage', compact('categories'));
    }
}
