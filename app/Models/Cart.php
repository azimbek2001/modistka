<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function createCart( $product, $request)
    {
        $cart = [
                $product->id => [
                    'name' => $product->name,
                    'quantity' => $request['quantity'],
                    'price' => $product->price,
                    'image' => $product->image,
                    'subtotal' => $product->price * $request['quantity'],
                    'color' => $request['color'],
                ]
        ];
        return $cart;
    }

    public function addToCart($product, $request)
    {
        $cart[$product->id] = [
            'name' => $product->name,
            'quantity' => $request['quantity'],
            'price' => $product->price,
            'image' => $product->image,
            'subtotal' => $product->price * $request['quantity'],
            'color' => $request['color']
        ];

        return $cart;
    }
}
