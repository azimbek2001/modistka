<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
        'image',
        'sizes',
    ];

    public function colors(): belongsToMany
    {
        return $this->belongsToMany(Color::class, 'color_products');
    }

    public function category(): hasOne
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function color($color_id)
    {
        return Color::where('id',$color_id)->first();
    }
}
