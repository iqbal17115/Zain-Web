<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\User;
class Services extends Model
{
    use HasFactory;
    protected $table='services';
    protected $primaryKey = 'service_id';
    function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
