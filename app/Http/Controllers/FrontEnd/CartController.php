<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Cart;
use App\Models\Admin\Order\DeliverySystem;
use App\Models\Admin\Order\PaymentMethod;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        if($request->id){
            $product = Product::where('id', $id)->first();
            $merchantPrice = $product->regular_price - (($product->regular_price * $product->discount) / 100);
            // return $merchantPrice;
            Cart::add([
                'id'       => $id,
                'name'     => $product->title,
                'qty'      => $request->quantity,
                'price'    => $product->price,
                'weight'   => 550,
                'options'  => [
                    'regular_price'        => $product->regular_price,
                    'discount'             => $product->discount,
                    'merchant_price'       => $merchantPrice,
                    'merchant_price_total' => $merchantPrice * $request->quantity,
                    'merchant_id'          => $product->author_id,
                    'shop_id'              => $product->shop_id,
                    'color'                => $request->color,
                    'size'                 => $request->size,
                    'photo'                => $product->img_small,
                    ]
            ]);

            // return $request->all();

            return redirect()->back()->with('add-to-cart', 'Product added to Cart !');

        }
    }

    public function cartItemUpdate(Request $request, $rowId)
    {
        Cart::update($rowId, $request->quantity);
        return redirect()->route('cart.page')->with('cart-update', 'Shoping Cart updated !');
    }

    // Remove Cart Item

    public function removeCartItem($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.page')->with('cart-remove', 'Remove product from cart !');
    }

    public function removeAllItem()
    {
        Cart::destroy();
        return redirect()->route('cart.page')->with('remove-allcart', 'All products remove from cart !');
    }

    // Cart Page
    public function cartPage()
    {
        $items = Cart::content();
        $deliverysystems = DeliverySystem::all();
        $pamymentmethods = PaymentMethod::all();
        // return $items;

        return view('frontend.cartpage', compact('items', 'deliverysystems', 'pamymentmethods'));
    }

}
