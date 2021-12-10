<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }
    public function addToCart(Request $request)
    {
        $product = Product::find($request->productId);
        $cart = session()->get('cart');

        if (!$cart) {
            $cart = (new Cart())->createCart($product, $request->all());
            session()->put('cart', $cart);

            self::total();

            return redirect()->back()->with('success', 'Продукт успешно добавлен!');
        }

        if (isset($cart[$product->id])&&($cart[$product->id]['color'] == $request->color)){
            $cart[$product->id]['quantity'] += $request->quantity;
            $cart[$request->productId]["subtotal"] += ($cart[$request->productId]["price"] * $request->quantity);

            session()->put('cart', $cart);
            self::total();

            return redirect()->back()->with('success', 'Продукт успешно добавлен!');
        }
        $cart[$product->id] = [
            'name' => $product->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $product->image,
            'subtotal' => $request->price * $request->quantity,
            'color' => $request->color,
        ];
        session()->put('cart', $cart);
        self::total();

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->productId)
        {
            if ($request->type == 1)
            {
                $cart = session()->get('cart');
                $cart[$request->productId]["quantity"] += 1;
                $cart[$request->productId]["subtotal"] += $cart[$request->productId]["price"];
                session()->put('cart', $cart);
                $total = self::total();
                session()->flash('success', 'Cart updated successfully');
                return response()->json([
                    'increment' => true,
                    'subtotal' => $cart[$request->shopId][$request->productId]["subtotal"],
                    'total' => $total
                ]);
            }
            else{
                $cart = session()->get('cart');
                $cart[$request->productId]["quantity"] -= 1;
                $cart[$request->productId]["subtotal"] -= $cart[$request->productId]["price"];
                session()->put('cart', $cart);
                session()->flash('success', 'Cart updated successfully');
                $total = self::total();

                return response()->json([
                    'increment' => false,
                    'subtotal' => $cart[$request->shopId][$request->productId]["subtotal"],
                    'total' => $total
                ]);
            }
        }
    }
    public function remove(Request $request)
    {
        if($request->prodId ) {
            $cart = session()->get('cart');
            $total = '';
            if(isset($cart[$request->prodId])) {
                unset($cart[$request->prodId]);
                session()->put('cart', $cart);
                $total = self::total();
            }

            session()->flash('success', 'Product removed successfully');
            return response()->json(['total' => $total]);
        }
    }
    public function clear(Request $request)
    {
        $cart = session()->get('cart');
        if ($cart) {
            session()->forget('cart');
        }
        $total = self::total();
        return response()->json(['total' => $total]);
    }

    public function total()
    {
        $cart = session()->get('cart');
        $total = 0;
        if ($cart){
                foreach ($cart as $item) {
                    $total += $item['subtotal'];
                }
            session()->put('total', $total);
        }

        return $total;
    }
}
