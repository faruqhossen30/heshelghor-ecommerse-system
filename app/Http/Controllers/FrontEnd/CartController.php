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
                'qty'      => $request->quantity,
                'price'    => $product->price,
                'weight'   => 550,
                'options'  => [
                    'color' => $request->color,
                    'size' => $request->size,
                    'photo'  => $product->photo,
                    ]
            ]);

            // return $request->all();

            return redirect()->back();

        }
    }

    public function cartItemUpdate(Request $request, $rowId)
    {
        Cart::update($rowId, $request->quantity);
        return redirect()->route('cart.page');
    }

    // Remove Cart Item

    public function removeCartItem($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.page');
    }

    public function removeAllItem()
    {
        Cart::destroy();
        return redirect()->route('cart.page');
    }

    // Cart Page
    public function cartPage()
    {
        $items = Cart::content();
        // return $items;

        return view('frontend.cartpage', compact('items'));
    }

}
