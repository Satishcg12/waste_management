<?php
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\AdminSubmissionController;
use App\Http\Controllers\Admin\Auth\TeacherPasswordController;
use App\Http\Controllers\Admin\Auth\AdminPasswordController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GradeController;

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
        Route::resource('teacher', TeacherController::class);
        Route::resource('admin', AdminController::class);
        Route::resource('grade', GradeController::class);

        // submission routes
        //update,destroy
        Route::get('submission/{submission}/edit', [AdminSubmissionController::class,'adminEdit'])->name('submission.edit');
        Route::patch('submission/{submission}', [AdminSubmissionController::class,'adminUpdate'])->name('submission.update');
        Route::patch('submission/approve/{submission}', [AdminSubmissionController::class,'approve'])->name('submission.approve');
        Route::patch('submission/reject/{submission}', [AdminSubmissionController::class,'reject'])->name('submission.reject');
        Route::delete('submission/{submission}', [AdminSubmissionController::class,'adminDestroy'])->name('submission.destroy');
        //password change routes
        Route::namespace('Auth')->group(function(){
            Route::put('password/user', [PasswordController::class, 'update'])->name('password.user.update');
            Route::put('password/teacher', [TeacherPasswordController::class, 'update'])->name('password.teacher.update');
            Route::put('password/admin', [AdminPasswordController::class, 'update'])->name('password.admin.update');
        });
    });



    //logout routes
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
