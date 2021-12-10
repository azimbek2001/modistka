<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'phone',
        'city',
        'address',
        'mail',
        'is_archive',
        'status_id',
        'total'
    ];

    public function status(): hasOne
    {
        return $this->hasOne(Status::class,'id','status_id');
    }

    public function user(): hasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function orderProducts(): hasMany
    {
        return $this->hasMany(OrderProduct::class,'order_id', 'id' );
    }
}
