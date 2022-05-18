<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promotion\Slider;
use Illuminate\Http\Request;

class SliderapiController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();

        return response()->json([
            'success' => true,
            'code'=>200,
            'data' => $sliders
        ]);
    }
}
