<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Only include what your form actually sends
    protected $fillable = ['name', 'email', 'message'];

    /**
     * Model boot method.
     * Currently, no email notifications or extra logic on creation.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($item) {
            // Intentionally left blank — no email logic here
            // Can be extended later (e.g., send a notification or webhook)
        });
    }
}