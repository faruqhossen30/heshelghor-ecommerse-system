<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

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

        $fileName = $request->photo->getClientOriginalName();
        $request->photo->storeAs('wishlist', $fileName, 'public');

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
