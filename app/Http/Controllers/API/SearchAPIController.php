<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class SearchAPIController extends Controller
{
    public function search($keyword)
    {

        // return $keyword;
        $result = Product::where('title', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->paginate(25);

        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Ok',
            'data'    => $result
        ]);
    }
}
