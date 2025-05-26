<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    protected $applicantController;
    protected $guardianController;

    public function __construct(ApplicantController $applicantController, GuardianController $guardianController)
    {
        $this->applicantController = $applicantController;
        $this->guardianController = $guardianController;
    }

    public function addFullEnrollment(Request $request)
    {
        DB::beginTransaction();

        try {
            // Save applicant
            $newApplicantID = $this->applicantController->add($request);

            // Save guardians, get their IDs
            $guardianIDs = $this->guardianController->addGuardiansForApplicant($newApplicantID, $request);

            DB::commit();

            return redirect()->back()->with('success', 'Saved successfully. Applicant ID: ' . $newApplicantID);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to save enrollment: ' . $e->getMessage());
        }
    }
}
