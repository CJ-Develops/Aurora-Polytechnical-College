<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return view('home');
});

Route::get('/enroll', function () {
    return view('enroll');
});

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
