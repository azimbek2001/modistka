<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'amount',
        'subtotal',
        'created_at',
    ];

    public function product(): hasOne
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }

    public function color(): hasOne
    {
        return $this->hasOne(Color::class, 'id','color_id');
    }
}
