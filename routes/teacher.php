<?php
use App\Http\Controllers\Teacher\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Teacher\Auth\PasswordController;
use App\Http\Controllers\Teacher\UserController;
use App\Http\Controllers\Teacher\HomeController;
use App\Http\Controllers\Teacher\TeacherSubmissionController;

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
        Route::get('submissio/{submission}/edit', [TeacherSubmissionController::class,'teacherEdit'])->name('submission.edit');
        Route::patch('submission/{submission}', [TeacherSubmissionController::class,'teacherUpdate'])->name('submission.update');
        Route::patch('submission/approve/{submission}', [TeacherSubmissionController::class,'approve'])->name('submission.approve');
        Route::patch('submission/reject/{submission}', [TeacherSubmissionController::class,'reject'])->name('submission.reject');
        Route::delete('submission/{submission}', [TeacherSubmissionController::class,'teacherDestroy'])->name('submission.destroy');

        //password change routes
        Route::namespace('Auth')->group(function(){
            Route::put('password', [PasswordController::class, 'update'])->name('password.update');
        });
    });
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});
