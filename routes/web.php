<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ContactController::class, 'index']);

Route::post('/', [ContactController::class, 'store'])->name('contact.us.store');
