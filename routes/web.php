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

Route::get('/', function () {
    return view('welcome');
    // return redirect()->route('home');
})->name('welcome');
Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
})->name('terms-and-conditions');
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/home', [PublicController::class,'index'])->name('home');
Route::get('submission/{submission}', [SubmissionController::class,'show'])->name('submission.show');


Route::middleware('auth')->group(function () {
    Route::get('/user/submission/{submission}', function (App\Models\Submission $submission) {
        return view('user.submission.show', compact('submission'));
    })->name('dashboard.submission.show');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/agree-to-terms-and-conditions', [DashboardController::class, 'agreeToTermsAndConditions'])->name('terms-and-conditions.agree');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';

// Submissions routes

Route::middleware('auth')->group(function(){
    // create,store,show
    Route::get('submissions/create', [SubmissionController::class,'create'])->name('submission.create');
    Route::post('submission', [SubmissionController::class,'store'])->name('submission.store');
    Route::post('temp-upload',[SubmissionController::class,'tempUpload'])->name('upload.tempStore');
    Route::delete('temp-delete',[SubmissionController::class,'tempDelete'])->name('upload.tempDestroy');
});
Route::get('/attachment/{folder}/{filename}', [SubmissionController::class,'getAttachment'])->name('submission.getAttachment');


// Admin routes
require __DIR__.'/admin.php';



// Teacher routes
require __DIR__.'/teacher.php';
