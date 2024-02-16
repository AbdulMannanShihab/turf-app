<?php

use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\AdminPanel\SuperAdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:customer', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
    
});

Route::middleware(['auth', 'role:super-admin'])->group(function () {

    Route::controller(SuperAdminController::class)->group(function(){
        Route::get('/superAdmin/dashboard', 'index')->name('SuperAdmin');
        Route::get('/superAdmin/users', 'Users')->name('Users');
        Route::get('/superAdmin/users/create', 'create')->name('UsersCreate');
        Route::post('/superAdmin/users/store', 'store')->name('UserStore');
        Route::get('/superAdmin/users/edit/{id}', 'edit')->name('UserEdit');
        Route::PUT('/superAdmin/users/update/{id}', 'update')->name('UserUpdate');
        Route::get('/superAdmin/users/trash/{id}', 'trash')->name('UserTrash');
        Route::get('/superAdmin/users/trash', 'trashUsers')->name('Trashlist');
        Route::get('/superAdmin/users/restore/{id}', 'restore')->name('UserRestore');
        Route::get('/superAdmin/users/deleted/{id}', 'destroy')->name('UserDelete');
    });
    
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
});


require __DIR__.'/auth.php';
