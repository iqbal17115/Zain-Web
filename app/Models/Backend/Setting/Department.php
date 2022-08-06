<?php

namespace App\Models\Backend\Setting;

use App\Models\Backend\Setting\ClassName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public function ClassName(){
        return $this->belongsTo(ClassName::class);
    }
}
