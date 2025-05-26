<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\GuardianController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/enroll', function () {
    return view('enroll');
});

Route::view('add', 'enroll');

Route::post('add', [GuardianController::class, 'add']);
Route::post('add', [ApplicantController::class, 'add']);