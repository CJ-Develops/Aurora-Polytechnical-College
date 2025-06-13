<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (!Session::get('is_admin')) {
            return redirect('/applicant_login')->with('error', 'Unauthorized access.');
        }

        $table = $request->query('table', 'applicant');

        switch ($table) {
            case 'guardian':
                $guardians = DB::select('SELECT * FROM guardian');
                return view('admin', [
                    'table' => 'guardian',
                    'guardians' => $guardians
                ]);

            case 'course':
                $courses = DB::select('SELECT * FROM course');
                return view('admin', [
                    'table' => 'course',
                    'courses' => $courses
                ]);

            case 'intended':
                $intendeds = DB::select('SELECT * FROM applicantcoursecampus');
                $courses = DB::select('SELECT courseCode, courseName FROM course');
                $rows = DB::select('SELECT fk_applicantID, fk_courseCode FROM applicantcoursecampus');

                $usedCoursesPerApplicant = [];
                foreach ($rows as $row) {
                    $usedCoursesPerApplicant[$row->fk_applicantID][] = $row->fk_courseCode;
                }

                return view('admin', [
                    'table' => 'intended',
                    'intendeds' => $intendeds,
                    'courses' => $courses,
                    'usedCoursesPerApplicant' => $usedCoursesPerApplicant
                ]);

            case 'applicant':
            default:
                $applicants = DB::select('SELECT * FROM applicant');
                return view('admin', [
                    'table' => 'applicant',
                    'applicants' => $applicants
                ]);
        }
    }
}
