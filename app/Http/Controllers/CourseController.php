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

    public function addCourse(Request $request)
    {
        $courseCode = $request->input('courseCode');
        $courseName = $request->input('courseName');
        $duration = $request->input('duration');
        $department = $request->input('department');
        $totalUnits = $request->input('totalUnits');

        $sql = "INSERT INTO course(courseCode, courseName, duration, department, totalUnits) VALUES (?, ?, ?, ?, ?)";

        DB::insert($sql, [
            $courseCode,
            $courseName,
            $duration,
            $department,
            $totalUnits,
        ]);

        return redirect('/admin?table=course')->with('success', 'Course added successfully.');
    }
}