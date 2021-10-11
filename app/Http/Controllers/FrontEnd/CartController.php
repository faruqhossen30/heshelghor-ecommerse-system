<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        if($request->id){
            $product = Product::where('id', $id)->first();
            Cart::add([
                'id'       => $id,
                'name'     => $product->title,
                'qty'      => 1,
                'price'    => $product->price,
                'weight'   => 550,
                'options'  => [
                    'color' => 'Red',
                    'size' => 'Small'
                    ]
            ]);

            return redirect()->back();

        }
    }

    // Cart Page
    public function cartPage()
    {
        $items = Cart::content();
        // return $items;

        return view('frontend.cartpage', compact('items'));
    }
}
