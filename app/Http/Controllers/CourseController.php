<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourse()
    {
        $courses = DB::select('SELECT courseCode, courseName FROM course');
        return view('enroll', compact('courses'));
    }
}
                  