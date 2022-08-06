<?php

namespace App\Models\Backend;

use App\Models\Backend\ManageFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileEntry extends Model
{
    use HasFactory;
    public function ManageFile(){
        return $this->hasOne(ManageFile::class);
    }
}
