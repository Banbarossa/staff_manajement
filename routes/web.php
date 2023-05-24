<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingConttroller;
use App\Http\Controllers\StaffInactiveController;

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


Route::middleware(['guest'])->group(function(){
    Route::get('/',[AuthController::class,'index'])->name('login');
    Route::post('/',[AuthController::class,'authenticate'])->name('auth.login');
});


Route::middleware(['auth'])->group(function(){
    Route::get('/profil',[AuthController::class,'profil'])->name('auth.profil');

    // Route::get('/profile/create',[AuthController::class,'create'])->name('auth.create');

    // Route::post('/profile/create',[AuthController::class,'store'])->name('auth.store');

    Route::post('/profil/password',[AuthController::class,'changePassword'])->name('changepassword');

    Route::post('/profil/update',[AuthController::class,'update'])->name('auth.update');

    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('/staff',StaffController::class);

    Route::get('/inactive',[StaffInactiveController::class,'index'])->name('staff.inactive');

    Route::put('/staff/status/{id}',[StaffController::class,'statuschange'])->name('status.change');
    
    // Route::resource('/child',ChildController::class);
    

    

});

Route::middleware(['isAdmin'])->group(function(){
    
    Route::resource('/user', UserController::class);

    Route::get('/setting',[SettingConttroller::class,'index'])->name('setting.index');

});


