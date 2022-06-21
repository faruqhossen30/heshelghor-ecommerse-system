<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WishlistapiController extends Controller
{
    public function  index()
    {
        $wishlist = Wishlist::get();
        // return $wishlist;
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $wishlist
        ]);
    }

    public function store(Request $request)
    {
        $userid = $request->user()->id;

        $img = $request->image;
        $folderPath = "wishlist/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.jpg';

        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);

        // return $fileName;

        $wishlist = Wishlist::create([
            'product_id' => $request->product_id,
            'user_id'    => $userid,
            'ip'         => $request->ip(),
            'photo'      => $fileName ?? '',
            'mobile'     => $request->mobile
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'product added to wishlist',
            'data' => $wishlist
        ]);
    }

    public function delete($id)
    {
      $wishlist =  Wishlist::where('id', $id)->delete();


        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'product deleted form wishlist',
            'data' => $wishlist
        ]);
    }
}
