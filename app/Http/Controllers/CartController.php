<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index($id)
    {
        $user_id  = auth()->user()->id;
        return Cart::get()->where('user_id', $user_id);;
    }


    public function addToCart(Request $request, $id)
    {
        $user_id  = auth()->user()->id;
        $carts = Cart::get()->where('user_id', $user_id);
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        if ($carts) {
            foreach ($carts as $cart) {
                if ($request->product_id == $cart->product_id) {
                    $cartQuantity = $cart->quantity += $request->quantity;
                    Cart::where('id', $cart->id)
                        ->update(['quantity' => $cartQuantity]);
                    return response()->json(['success' => 'You have successfully added to your cart'], 200);
                };
            }
        }

        return  Cart::create([
            'quantity' => $request->quantity,
            'product_id' => $request->product_id,
            'user_id' => auth()->user()->id
        ]);
    }
}
