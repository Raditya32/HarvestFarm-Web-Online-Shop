<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShopDetail extends Model
{
    use HasFactory;

    protected $table = 'shop_detail';

    protected $fillable = [
        'product_id',
        'qty',
        'price',
        'shop_id'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
