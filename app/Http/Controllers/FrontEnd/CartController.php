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

        // return $id;
        // return $request->all();
        if ($request->id) {
            $product = Product::where('id', $id)->first();
            $merchantPrice = $product->regular_price - (($product->regular_price * $product->discount) / 100);
            // return $merchantPrice;
            $varient = [];
            if ($request->color) {
                $varient['color'] = $request->color;
            }
            if ($request->size) {
                $varient['size'] = $request->size;
            }

            // return $merchantPrice;

            Cart::add([
                'id'       => $id,
                'name'     => $product->title,
                'qty'      => $request->quantity,
                // 'qty'      => 1,
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
                    'varient'              => $varient,
                ]
            ]);

            // Cart::destroy();
            $totalitem = Cart::count();

            return response()->json([
                'status' => 'success',
                'data' => $totalitem
            ]);
            // return $request->all();

            // return redirect()->back()->with('add-to-cart', 'Product added to Cart !');

        }
    }

    public function cartItemUpdate(Request $request, $rowid)
    {
        Cart::update($rowid, $request->quantity);
        // return redirect()->route('cart.page')->with('cart-update', 'Shoping Cart updated !');
        return "updated";
    }

    // Remove Cart Item

    public function removeCartItem($rowId)
    {
        Cart::remove($rowId);
        return 'deleted';
        // return redirect()->route('cart.page')->with('cart-remove', 'Remove product from cart !');
    }

    public function removeAllItem()
    {
        Cart::destroy();
        return redirect()->route('cart.page')->with('remove-allcart', 'All products remove from cart !');
    }

    // Cart Page
    // Cart Page
    public function cartPage()
    {
        $items = Cart::content();
        $deliverysystems = DeliverySystem::all();
        $pamymentmethods = PaymentMethod::all();
        // return $items;
        // return 'deleted';

        return view('frontend.cartpage', compact('items', 'deliverysystems', 'pamymentmethods'));
    }

    public function ajaxCartItemList()
    {
        $items = Cart::content();
        $data = view('frontend.ajax.cartitemlist', compact('items'));
        return $data;
    }
}
