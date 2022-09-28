<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeImg extends Model
{
    use HasFactory;
    protected $table= 'home_imgs';
    protected $primaryKey = 'home_img_id';
}
