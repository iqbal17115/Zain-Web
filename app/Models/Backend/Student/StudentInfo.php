<?php

namespace App\Models\Backend\Student;

use App\Models\Backend\Student\Student;
use App\Models\Backend\Setting\ClassName;
use App\Models\Backend\Setting\Group;
use App\Models\Backend\Setting\Medium;
use App\Models\Backend\Setting\Section;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    use HasFactory;

    public function Section(){
        return $this->belongsTo(Section::class);
    }
    public function Medium(){
        return $this->belongsTo(Medium::class);
    }
    public function Group(){
        return $this->belongsTo(Group::class);
    }
    public function ClassName(){
        return $this->belongsTo(ClassName::class);
    }
    public function Student(){
        return $this->belongsTo(Student::class);
    }
}
