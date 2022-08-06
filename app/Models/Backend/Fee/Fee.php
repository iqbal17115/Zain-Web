<?php

namespace App\Models\Backend\Fee;

use App\Models\Backend\Setting\Medium;
use App\Models\Backend\Setting\Group;
use App\Models\Backend\Setting\ClassName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    public function ClassName(){
        return $this->belongsTo(ClassName::class);
    }
    public function Group(){
        return $this->belongsTo(Group::class);
    }
    public function Medium(){
        return $this->belongsTo(Medium::class);
    }
}
