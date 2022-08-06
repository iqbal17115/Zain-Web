<?php

namespace App\Models\Backend\Setting;

use App\Models\Backend\Setting\Department;
use App\Models\Backend\Setting\Medium;
use App\Models\Backend\Setting\Group;
use App\Models\Backend\Setting\Section;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    use HasFactory;

    public function Section(){
        return $this->hasMany(Section::class);
    }
    public function Group(){
        return $this->hasMany(Group::class);
    }
    public function Medium(){
        return $this->hasMany(Medium::class);
    }
}
