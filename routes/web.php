<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});
/*
|--------------------------------------------------------------------------
| Admin, User, SuperAdmin Profile Setting
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
    
});

/*
|--------------------------------------------------------------------------
| Customer Dashboard 
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:customer', 'verified'])->name('dashboard');
/*
|--------------------------------------------------------------------------
| Auth Route
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
/*
|--------------------------------------------------------------------------
| Super Admin Dashboard Route
|--------------------------------------------------------------------------
*/
require __DIR__.'/super-admin.php';
/*
|--------------------------------------------------------------------------
| Admin Dashboard Route
|--------------------------------------------------------------------------
*/
require __DIR__.'/admin.php';