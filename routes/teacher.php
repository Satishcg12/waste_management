<?php
use App\Http\Controllers\Teacher\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Teacher\Auth\PasswordController;
use App\Http\Controllers\Teacher\UserController;
use App\Http\Controllers\Teacher\HomeController;
use App\Http\Controllers\SubmissionController;

Route::namespace('App\Http\Controllers\Teacher')->prefix('teacher')->name('teacher.')->group(function(){

    Route::namespace('Auth')->middleware('guest:teacher')->group(function(){
        //login routes
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    });
    //dashboard routes
    Route::middleware('teacher')->group(function(){
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::resource('user', UserController::class);

        // submission routes
        //update,destroy
        Route::get('submissio/{submission}/edit', [SubmissionController::class,'teacherEdit'])->name('submission.edit');
        Route::patch('submission/{submission}', [SubmissionController::class,'teacherUpdate'])->name('submission.update');
        Route::patch('submission/status/{submission}', [SubmissionController::class,'updateStatus'])->name('submission.updateStatus');

        //password change routes
        Route::namespace('Auth')->group(function(){
            Route::put('password', [PasswordController::class, 'update'])->name('password.update');
        });
    });
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});
