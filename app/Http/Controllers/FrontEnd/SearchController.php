<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;

class SearchController extends Controller
{
    public function index(Request $request, $keyword)
    {
        if($request->keyword){
            $resutlt  = Product::
                        where('title', 'like', '%'.$keyword.'%' )
                        ->get();
            return $resutlt;
        }

    }
}
