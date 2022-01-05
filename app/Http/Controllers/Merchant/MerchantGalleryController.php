<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Auth\Marchant;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MerchantGalleryController extends Controller
{
    public function viewGallery()
    {
        $user = auth()->guard('marchant')->user();
        $galleries = $user->getMedia();

        // $test = $galleries->where('id', 12)->first()->getUrl('medium');
        // return $test;
        $alluser = Marchant::where('id', 2)->first();

        // $some = $alluser->getMedia();

        // return $alluser->getMediaCollection();

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

    public function merchantModalGallery(Request $request)
    {
        $user = auth()->guard('marchant')->user();
        if($request->ajax()){
            $galleries = $user->getMedia();
            $data = view('marchant.inc.modalgalary', compact('galleries'))->render();

            return response()->json($data);
        };
    }
}
