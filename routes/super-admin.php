<?php

use App\Http\Controllers\AdminPanel\SuperAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Super Admin Dashboard
|--------------------------------------------------------------------------
*/
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