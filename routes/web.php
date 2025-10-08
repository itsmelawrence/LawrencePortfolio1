<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Redirect all routes to maintenance page if under construction
if (app()->environment('production') && env('SITE_UNDER_CONSTRUCTION', false)) {
    Route::get('{any}', function () {
        return redirect()->route('site-down');
    })->where('any', '^(?!maintenance).*'); // exclude the maintenance route
}

Route::get('/', function () {
    return view('home');
});

Route::get('/maintenance', function () {
    return response()->view('errors.503', [], 503);
})->name('site-down');

Route::post('/', [ContactController::class, 'store'])->name('contact.us.store');