<?php

namespace App\Models\Backend;

use App\Models\Backend\Person;
use App\Models\Backend\FileEntry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageFile extends Model
{
    use HasFactory;
    public function FileEntry(){
        return $this->belongsTo(FileEntry::class);
    }
    public function Person(){
        return $this->belongsTo(Person::class);
    }
}
