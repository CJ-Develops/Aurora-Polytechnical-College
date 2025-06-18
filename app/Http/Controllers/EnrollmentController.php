<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class EnrollmentController extends Controller
{
    protected $applicantController;
    protected $guardianController;
    protected $applicantCourseController;
    protected $courseController;

    public function __construct(
        ApplicantController $applicantController,
        GuardianController $guardianController,
        CourseController $courseController,
        ApplicantCourseController $applicantCourseController
    ) {
        $this->applicantController = $applicantController;
        $this->guardianController = $guardianController;
        $this->courseController = $courseController;
        $this->applicantCourseController = $applicantCourseController;
    }

    public function addFullEnrollment(Request $request)
    {
        DB::beginTransaction();

        try {
            $newApplicantID = $this->applicantController->add($request);
            $this->guardianController->addGuardiansForApplicant($newApplicantID, $request);
            $this->applicantCourseController->storeApplicantCourseCampus($newApplicantID, $request);

            DB::commit();

            $applicant = DB::selectOne("SELECT * FROM applicant WHERE applicantID = ?", [$newApplicantID]);


            return view('getpassword', ['applicant' => $applicant]);
        } catch (QueryException $e) {
            DB::rollBack();

            $message = $e->getMessage();

            if (str_contains($message, 'Base table or view not found')) {
                preg_match("/Table '[^']+\.(.*?)' doesn't exist/", $message, $matches);
                $missingTable = $matches[1] ?? 'Unknown table';
                return redirect('/error')->with('error', "Database error: Missing table '{$missingTable}'.");
            }

            if (str_contains($message, 'Unknown column')) {
                preg_match("/Unknown column '(.*?)'/", $message, $columnMatches);
                $missingColumn = $columnMatches[1] ?? 'Unknown column';

                $tableName = 'unknown table';
                if (preg_match("/from\s+`?([a-zA-Z0-9_]+)`?/i", $message, $tableMatches)) {
                    $tableName = $tableMatches[1];
                } elseif (preg_match("/into\s+`?([a-zA-Z0-9_]+)`?/i", $message, $tableMatches)) {
                    $tableName = $tableMatches[1];
                } elseif (preg_match("/update\s+`?([a-zA-Z0-9_]+)`?/i", $message, $tableMatches)) {
                    $tableName = $tableMatches[1];
                }

                return redirect('/error')->with('error', "Database error: Missing attribute '{$missingColumn}' in table '{$tableName}'");
            }

            return redirect('/error')->with('error', 'Database error: ' . $message);
        }
    }
}
