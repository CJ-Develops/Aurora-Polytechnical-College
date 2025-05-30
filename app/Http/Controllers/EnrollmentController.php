<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            // Save applicant and get new ID
            $newApplicantID = $this->applicantController->add($request);

            // Save guardians
            $guardianCount = $this->guardianController->addGuardiansForApplicant($newApplicantID, $request);

            // Save applicant course + campus selections
            $courseCampusCount = $this->applicantCourseController->storeApplicantCourseCampus($newApplicantID, $request);

            DB::commit();

            return redirect()->back()->with('success', 'Saved successfully. Applicant ID: ' . $newApplicantID . ', Guardians added: ' . $guardianCount . ', Courses added: ' . $courseCampusCount);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
