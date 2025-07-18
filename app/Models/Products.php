<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'image', // Pastikan kolom image ada di sini
    ];


        public function category()
        {
            return $this->belongsTo(Categories::class, 'category_id', 'id');
        }


}
