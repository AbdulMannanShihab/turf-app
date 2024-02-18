<?php

use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\TurfCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
    Route::resource('/admin/turf_category', TurfCategoryController::class);
});