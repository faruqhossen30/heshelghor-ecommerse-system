<?php

namespace App\Http\Controllers\API\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\InteractsWithMedia;

class MerchantGalleryAPIController extends Controller
{
    public function getAllGallery(Request $request)
    {
        $merchant = $request->user();
        $galleries = $merchant->media()->orderBy('id', 'desc')->paginate(12);

        $medias =  $merchant->getMedia();
        // return $merchant;
        // $data = [];
        // foreach ($merchant->getMedia() as $media) {
        //     $data[] = [
        //         'id'    => $media->id,
        //         'file_name'    => $media->file_name,
        //         'original_url' => $media->getUrl(),
        //         'small_url'    => $media->getUrl('small'),
        //         'medium_url'   => $media->getUrl('medium'),
        //         'large_url'    => $media->getUrl('large')

        //     ];
        // }



        return response()->json([
            'success' => true,
            'code'    => 200,
            'data'    => $galleries
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'media' => 'required'
        ]);
        $merchant = $request->user();


        // return $request->all();
        $data = $merchant->addMedia($request->media)->toMediaCollection();

        $media = [
            'id'           => $data->id,
            'file_name'    => $data->file_name,
            'original_url' => $data->getUrl(),
            'small_url'    => $data->getUrl('small'),
            'medium_url'   => $data->getUrl('medium'),
            'large_url'    => $data->getUrl('large')

        ];

        return response()->json([
            'success' => true,
            'code'    => 200,
            'data' => $media
        ]);
    }

    // Delete Single Media
    public function deleteSingleMedia(Request $request, $id)
    {

        // return $id;
        $merchant = $request->user();
        $media = $merchant->deleteMedia($id);

        return response()->json([
            'success' => true,
            'code'    => 200,
            'message' => 'Media delete Successfully !'
        ]);
    }
}
