<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\ContactMail;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'message'];

    /**
     * Write code on Method
     *
     * @return response()
     */

     public static function boot()
     {
         parent::boot();
     
         static::created(function ($item) {
             // No email sending logic here anymore
             // The item is created and saved to the database, but no email is sent
         });
     }
}
