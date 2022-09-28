<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employees;
use App\Models\User;

class Departments extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $primaryKey = 'dept_id';
    function employees()
    {
        return $this->hasMany(Employees::class, 'dept_id', 'dept_id');
    }
    function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
