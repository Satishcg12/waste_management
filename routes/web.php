<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class,'index'])->name('home');


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
    // create,store,show
    Route::get('submission/create', [SubmissionController::class,'create'])->name('submission.create');
    Route::post('submission', [SubmissionController::class,'store'])->name('submission.store');

});
Route::get('submission/{submission}', [SubmissionController::class,'show'])->name('submission.show');
// Route::middleware(['auth','teacherAdmin'])->group(function(){

//     Route::resource('user', UserController::class)->except(['show','store']);
// });

Route::middleware(['auth','teacherAdmin'])->group(function(){

    Route::get('permission', [PermissionController::class,'index'])->name('permission.index');


});

// Admin routes
require __DIR__.'/admin.php';



// Teacher routes
require __DIR__.'/teacher.php';
