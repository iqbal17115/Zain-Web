<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Homes;

class Selects extends Model
{
    use HasFactory;
    protected $table = 'selects';
    protected $primaryKey = 'select_id';
    function homes()
    {
        return $this->hasMany(Homes::class, 'home_id', 'home_id');
    }
}
