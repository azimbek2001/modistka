<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        return view('order');
    }



    public function store(Request $request){
        $user = Auth()->user();
        $products = session('cart');
        $order = new Order();

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->user_id = ($user) ? $user->id : NULL;
        $order->city = $request->city;
        $order->address = $request->address;
        $order->mail = $request->mail;
        $order->total = session('total');

        $order->save();
        foreach ($products as $key => $product) {
            $product_order = new OrderProduct();
            $product_order->order_id = $order->id;
            $product_order->product_id = $key;
            $product_order->subtotal = $product['subtotal'] * $product['quantity'];
            $product_order->amount = $product['quantity'];
            $product_order->color_id = $product['color'];
            $product_order->save();
        }

        session()->forget('cart');
        session()->forget('total');

        return redirect('/');
    }
}
