<?php

namespace App\Http\Controllers\API\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerchantGalleryAPIController extends Controller
{
    public function getAllGallery(Request $request)
    {
        $merchant = $request->user();
        $medias =  $merchant->getMedia();
        // return $merchant;
        $data = [];
            foreach ($merchant->getMedia() as $media) {
                $data[] = [
                    'file_name'    => $media->file_name,
                    'original_url' => $media->getUrl(),
                    'small_url'    => $media->getUrl('small'),
                    'medium_url'   => $media->getUrl('medium'),
                    'large_url'    => $media->getUrl('large')

                ];

            }

            return response()->json([
                'success' => true,
                'code'    => 200,
                'data'    => $data
            ]);
    }
}
