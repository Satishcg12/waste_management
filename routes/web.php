<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionController;
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


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Submissions routes

Route::middleware('auth')->group(function(){

    Route::resource('submission', SubmissionController::class);
});
// Route::middleware(['auth','teacherAdmin'])->group(function(){

//     Route::resource('user', UserController::class)->except(['show','store']);
// });

Route::middleware(['auth','teacherAdmin'])->group(function(){

    Route::get('permission', [PermissionController::class,'index'])->name('permission.index');


});

// Admin routes
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        //login routes
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    });
    //dashboard routes
    Route::middleware('admin')->group(function(){
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::resource('user', UserController::class);
        //password change routes
        Route::namespace('Auth')->group(function(){
            Route::put('password', [PasswordController::class, 'update'])->name('password.update');
        });
    });



    //logout routes
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
