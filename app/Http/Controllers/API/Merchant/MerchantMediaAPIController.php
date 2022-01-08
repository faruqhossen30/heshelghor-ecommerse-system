<?php

namespace App\Http\Controllers\API\MerChant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerchantMediaAPIController extends Controller
{
    public function getAllMedia(Request $request)
    {
        $merchant = $request->user();
        $medias =  $merchant->getMedia();
        $data = [];
        // $library = $$medias->transform(function ($item, $key) {
            foreach ($merchant->getMedia() as $media) {
                $data[] = [
                    'file_name'    => $media->file_name,
                    'original_url' => $media->getUrl(),
                    'small_url'    => $media->getUrl('small'),
                    'medium_url'   => $media->getUrl('medium'),
                    'large_url'    => $media->getUrl('large')

                ];
                // return $data;

            }

            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $data
            ]);

    }

    public function store(Request $request)
    {
        $merchant = $request->user();
        // return $merchant;
        return $request->all();
        $data = $merchant->addMedia($request->media)->toMediaCollection();

        return response()->json([
            'success' => true,
            'code'    => 200,
            'message' => 'Media Upload Successfully !'
        ]);
    }
}
