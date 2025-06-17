<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public $guarded = ['id','created_at', 'updated_at'];

    public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    }
}
