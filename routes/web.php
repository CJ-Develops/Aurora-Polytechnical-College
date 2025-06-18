<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\ApplicantController;




Route::get('/', function () {
    return view('home');
});


Route::get('/devs', function () {
    return view('devs');
});

Route::get('/get-password', function () {
    return view('applicant_id_form');
});

Route::view('/applicant_login', 'applicant_login');
Route::view('/enroll', 'enroll');

Route::post('/login', [LoginController::class, 'login']);
Route::get('/dashboard', [LoginController::class, 'login']);



Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/dashboard', [ApplicantController::class, 'dashboard'])->name('applicant.dashboard');

Route::post('/get-password', [ApplicantController::class, 'showPassword']);





Route::get('/enroll', [CourseController::class, 'showCourse']);
Route::view('add', 'enroll');



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



/* DELETE */
Route::post('/applicant/delete/{id}', [DeleteController::class, 'deleteApplicant'])->name('applicant.delete');

Route::post('/guardian/delete/{id}', [DeleteController::class, 'deleteGuardian'])->name('guardian.delete');

// Route::get('/intended/delete/{fk_applicantID}/{fk_courseCode}', [DeleteController::class, 'deleteIntendedCourse'])->name('intended.delete');

Route::post('/course/delete/{courseCode}', [DeleteController::class, 'deleteCourse'])->name('course.delete');


/* UPDATE */
Route::post('/update-raw/{applicantID}', [UpdateController::class, 'applicantUpdate'])->name('applicant.update.raw');

Route::post('/update-raw/{guardianID}/{fk_applicantID}', [UpdateController::class, 'guardianUpdate'])->name('guardian.update.raw');

Route::post('/intended/update-raw', [UpdateController::class, 'intendedUpdate'])->name('intended.update.raw');

Route::post('/update-raw', [UpdateController::class, 'courseUpdate'])->name('course.update.raw');


/* INSERT */
Route::post('/addFullEnrollment', [EnrollmentController::class, 'addFullEnrollment']);
Route::post('/course/add', [CourseController::class, 'addCourse'])->name('course.add');


/* SEARCH */
Route::get('/search', [SearchController::class, 'handle'])->name('search.handle');


/* SHOWP ASSWORD */
Route::get('/show-password', [ApplicantController::class, 'showPassword']);
