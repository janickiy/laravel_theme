<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;


Route::get('', [FrontendController::class, 'index'])->name('index');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('change-theme', [FrontendController::class, 'changeTheme'])->name('change-theme');
