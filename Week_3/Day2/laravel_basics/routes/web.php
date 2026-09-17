<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/services', [HomeController::class, 'services'])->name('services');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');