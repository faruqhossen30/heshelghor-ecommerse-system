<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\returnSelf;

class WishlistController extends Controller
{
    public function wishlistStore(Request $request)
    {
        // return $request->all();
        // return $request->ip();

        $img = $request->image;
        $folderPath = "wishlist/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);

        Wishlist::create([
            'product_id' => $request->product_id,
            'user_id'    => $request->user_id,
            'ip'         => $request->ip(),
            'photo'      => $fileName ?? '',
            'mobile'     => $request->mobile
        ]);

        return redirect()->back()->with('add-to-wishlist', 'Product added to your wish list !');


    }



    public function wishlistPage()
    {
        $products = Wishlist::with('product')->get();

        // return $products;
        return view('frontend.wishlistpage', compact('products'));
    }
    public function removeProduct($id)
    {
        Wishlist::where('id', $id)->delete();
        return redirect()->route('wishlist');
    }
    public function removeAll()
    {
        Wishlist::get()->delete();

        return redirect()->route('wishlist');
    }
}
