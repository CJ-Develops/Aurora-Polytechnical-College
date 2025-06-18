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

                $guardianTypesPerApplicant = [];

                foreach ($guardians as $g) {
                    $applicantId = $g->fk_applicantID;
                    $type = trim($g->guardianType); // remove extra whitespace

                    if (!isset($guardianTypesPerApplicant[$applicantId])) {
                        $guardianTypesPerApplicant[$applicantId] = [];
                    }

                    // Collect types per applicant, allow multiple if needed
                    if (!in_array($type, $guardianTypesPerApplicant[$applicantId])) {
                        $guardianTypesPerApplicant[$applicantId][] = $type;
                    }
                }

                return view('admin', [
                    'table' => 'guardian',
                    'guardians' => $guardians,
                    'guardianTypesPerApplicant' => $guardianTypesPerApplicant,
                    'isAdmin' => true
                ]);


            case 'course':
                $courses = DB::select('SELECT * FROM course');
                return view('admin', [
                    'table' => 'course',
                    'courses' => $courses
                ]);

            case 'intended':
                $intendeds = DB::select('SELECT * FROM applicantcoursecampus');
                $coursesList = DB::select('SELECT courseCode, courseName FROM course');
                $courses = DB::select('SELECT courseCode, courseName FROM course');

                $usedCoursesPerApplicant = [];
                foreach ($intendeds as $row) {
                    $usedCoursesPerApplicant[$row->fk_applicantID][] = $row->fk_courseCode;
                }

                $groupedIntendeds = [];
                foreach ($intendeds as $row) {
                    $key = $row->fk_applicantID . '|' . $row->campus;
                    $groupedIntendeds[$key]['fk_applicantID'] = $row->fk_applicantID;
                    $groupedIntendeds[$key]['campus'] = $row->campus;
                    $groupedIntendeds[$key]['courses'][] = $row->fk_courseCode;
                }

                $allAssigned = DB::select('SELECT fk_applicantID, fk_courseCode, campus FROM applicantcoursecampus');
                $assignedCourseCampus = [];
                foreach ($allAssigned as $item) {
                    $assignedCourseCampus[$item->fk_applicantID][$item->fk_courseCode] = $item->campus;
                }

                return view('admin', [
                    'table' => 'intended',
                    'intendeds' => $intendeds,
                    'coursesList' => $coursesList,
                    'courses' => $courses,
                    'usedCoursesPerApplicant' => $usedCoursesPerApplicant,
                    'groupedIntendeds' => $groupedIntendeds,
                    'assignedCourseCampus' => $assignedCourseCampus,
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
