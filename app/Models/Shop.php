<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shop';

    protected $fillable = [
        'customer',
        'payment',
        'total',
        'user_id',
        'alamat'
    ];

    public function details()
    {
        return $this->hasMany(ShopDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedCreatedAtAttribute()
    {
        return \Illuminate\Support\Carbon::parse($this->created_at)->format('d M Y H:i');
    }
}
