<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'prd_id';
    function categories()
    {
        return $this->belongsTo(Categories::class, 'cat_id', 'cat_id');
    }
}
