<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Selects;

class Homes extends Model
{
    use HasFactory;
    protected $table = 'homes';
    protected $primaryKey = 'home_id';
    function selects()
    {
        return $this->belongsTo(Selects::class, 'home_id', 'home_id');
    }
}
