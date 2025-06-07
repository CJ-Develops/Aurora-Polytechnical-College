<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('home');
});

Route::view('/applicant_login', 'applicant_login');
Route::view('/enroll', 'enroll');

Route::post('/login', [LoginController::class, 'login']);
Route::get('/dashboard', [LoginController::class, 'dashboard']);
Route::get('/admin', [AdminController::class, 'index']);


Route::get('/enroll', [CourseController::class, 'showCourse']);
Route::view('add', 'enroll');

Route::post('/addFullEnrollment', [EnrollmentController::class, 'addFullEnrollment']);

Route::get('/error', function () {
    $error = session('error') ?? 'Unknown error occurred.';
    return response("
        <div style='font-family: Arial, sans-serif; padding: 20px;'>
            <h2 style='color: red;'>Error</h2>
            <p>{$error}</p>
            <a href='/enroll' style='color: blue;'>← Go back to form</a>
        </div>
    ", 500);
});

/* LOG OUT */
Route::get('/logout', function () {
    session()->flush();
    return redirect('/applicant_login')->with('success', 'Logged out successfully.');
});
