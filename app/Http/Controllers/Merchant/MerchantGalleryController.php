<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\InteractsWithMedia;

class MerchantGalleryController extends Controller
{
    public function viewGallery()
    {
        $user = auth()->guard('marchant')->user();
        $galleries = $user->getMedia();

        // $test = $galleries->where('id', 7)->first();

        $type = gettype($galleries);
        // dd($test);
        // return $test->getUrl('small');


        return view('marchant.gallery.gallery', compact('galleries'));
    }

    public function soteGallery(Request $request)
    {
        $user = auth()->guard('marchant')->user();

        $some = $request->all();
        // return response()->json($some);

        $user->addMedia($request->croppedImage)->toMediaCollection();

        return response()->json($some);
    }
}
