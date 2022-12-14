<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $primaryKey = 'news_id';
    function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
