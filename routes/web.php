<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GuardianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return view('home');
});

Route::get('/enroll', function () {
    return view('enroll');
});

Route::view('add', 'enroll');

// Route::post('add', [GuardianController::class, 'add']);

// Route::post('add', [ApplicantController::class, 'add']);

Route::post('/addFullEnrollment', [EnrollmentController::class, 'addFullEnrollment']);

Route::get('/enroll', [CourseController::class, 'showForm']);