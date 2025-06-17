<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function handle(Request $request)
    {
        $table = $request->query('table');
        $search = $request->query('search');

        switch ($table) {
            case 'guardian':
                $guardians = DB::select('SELECT * FROM guardian WHERE guardianID LIKE ? OR fk_applicantID LIKE ?', ["%$search%", "%$search%"]);

                // Rebuild guardianTypesPerApplicant for display
                $guardianTypesPerApplicant = [];
                foreach ($guardians as $g) {
                    $applicantId = $g->fk_applicantID;
                    $type = trim($g->guardianType);
                    if (!isset($guardianTypesPerApplicant[$applicantId])) {
                        $guardianTypesPerApplicant[$applicantId] = [];
                    }
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
                $courses = DB::select('SELECT * FROM course WHERE courseCode LIKE ?', ["%$search%"]);
                return view('admin', [
                    'table' => 'course',
                    'courses' => $courses
                ]);

            case 'intended':
                $intendeds = DB::select('SELECT * FROM applicantcoursecampus WHERE fk_applicantID LIKE ?', ["%$search%"]);

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
                    'assignedCourseCampus' => $assignedCourseCampus
                ]);

            case 'applicant':
            default:
                $applicants = DB::select('SELECT * FROM applicant WHERE applicantID LIKE ?', ["%$search%"]);
                return view('admin', [
                    'table' => 'applicant',
                    'applicants' => $applicants
                ]);
        }
    }
}
