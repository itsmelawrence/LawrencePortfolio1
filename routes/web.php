<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Maintenance Redirect (Active only in production + env flag)
if (app()->environment('production') && env('SITE_UNDER_CONSTRUCTION', false)) {
    Route::get('{any}', function () {
        return redirect()->route('site-down');
    })->where('any', '.*');
}

// Main routes
Route::get('/', function () {
    return view('home');
});

Route::get('/maintenance', function () {
    return view('errors.504');
})->name('site-down');

Route::post('/', [ContactController::class, 'store'])->name('contact.us.store');