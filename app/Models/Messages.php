<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class Messages extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $primaryKey = 'msg_id';
    public $fillable = ['name', 'email', 'subject', 'message'];



    public static function boot() {
  
        parent::boot();
  
        static::created(function ($item) {
                
            $adminEmail = "iamtalha.mht@gmail.com";
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}
