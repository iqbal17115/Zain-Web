<?php

namespace App\Models\Backend;

use App\Models\Backend\ManageFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    public function ManageFile(){
        return $this->hasOne(ManageFile::class);
    }
}
