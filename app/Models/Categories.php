<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primarykey = 'cat_id';
    function products()
    {
        return $this->hasMany(Products::class, 'cat_id', 'cat_id');
    }
}
