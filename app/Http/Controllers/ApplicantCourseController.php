<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApplicantCourseController extends Controller
{
    public function storeApplicantCourseCampus($fk_applicantID, Request $request)
    {
        // Validate inputs (still use Validator for convenience)
        $validator = Validator::make($request->all(), [
            'courseCode' => 'required|array',
            'courseCode.*' => 'required|string',
            'campus' => 'required|array',
            'campus.*' => 'required|string',
        ]);


        if ($validator->fails()) {
            throw new \Exception('Validation failed: ' . json_encode($validator->errors()->all()));
        }

        $courseCodes = $request->input('courseCode');
        $campuses = $request->input('campus');

        if (count($courseCodes) !== count($campuses)) {
            throw new \Exception('The number of courses and campuses must be the same.');
        }

        // Check applicant exists with raw query
        $applicantExists = DB::select('SELECT 1 FROM applicant WHERE applicantID = ? LIMIT 1', [$fk_applicantID]);
        if (empty($applicantExists)) {
            throw new \Exception("Applicant ID '$fk_applicantID' does not exist.");
        }

        DB::beginTransaction();
        try {
            foreach ($courseCodes as $index => $code) {
                // Check course exists with raw query
                $courseExists = DB::select('SELECT 1 FROM course WHERE courseCode = ? LIMIT 1', [$code]);
                if (empty($courseExists)) {
                    throw new \Exception("Course code '$code' does not exist.");
                }

                // Insert into applicantcoursecampus table with raw SQL
                DB::insert(
                    'INSERT INTO applicantcoursecampus (fk_applicantID, fk_courseCode, campus) VALUES (?, ?, ?)',
                    [$fk_applicantID, $code, $campuses[$index]]
                );
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
