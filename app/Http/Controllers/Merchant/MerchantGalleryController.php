<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Auth\Marchant;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Collection;

class MerchantGalleryController extends Controller
{
    public function viewGallery()
    {
        $user = auth()->guard('marchant')->user();
        $galleries = $user->media()->orderBy('id', 'desc')->paginate(12);

        // $test = $galleries->where('id', 12)->first()->getUrl('medium');
        $alluser = Marchant::where('id', 2)->first();

        // $some = $alluser->getMedia();

        // return $alluser->getMediaCollection();

        return $galleries;

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
    // Delete Single Media
    public function deleteSingleMedia(Request $request, $id)
    {

        $user = auth()->guard('marchant')->user();
        $media = $user->deleteMedia($id);

        // return $media;
        return  redirect()->back();
    }



    public function merchantModalGallery(Request $request)
    {
        $user = auth()->guard('marchant')->user();
        if($request->ajax()){
            $galleries = collect($user->getMedia())->reverse();
            $data = view('marchant.inc.modalgalary', compact('galleries'))->render();

            return response()->json($data);
        };
    }

    public function merchantModalGalleryMultiple(Request $request)
    {
        $user = auth()->guard('marchant')->user();
        if($request->ajax()){
            $galleries = collect($user->getMedia())->reverse();
            $data = view('marchant.inc.modalgalarymultiple', compact('galleries'))->render();

            return response()->json($data);
        };
    }
}
