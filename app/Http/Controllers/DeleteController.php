<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function deleteApplicant($id)
    {
        DB::delete("
            DELETE guardian, applicantcoursecampus
            FROM applicant
            LEFT JOIN guardian ON applicant.applicantID = guardian.fk_applicantID
            LEFT JOIN applicantcoursecampus ON applicant.applicantID = applicantcoursecampus.fk_applicantID
            WHERE applicant.applicantID = ?
        ", [$id]);

        DB::delete("DELETE FROM applicant WHERE applicantID = ?", [$id]);

        DB::commit();

        return redirect()->back()->with('success', 'Applicant deleted.');
    }


    public function deleteGuardian($id)
    {
        DB::delete('DELETE FROM guardian WHERE guardianID = ?', [$id]);

        return redirect()->back()->with('success', 'Guardian deleted.');
    }

    public function deleteIntendedCourse($fk_applicantID, $fk_courseCode)
    {
        DB::delete('DELETE FROM applicantcoursecampus WHERE fk_applicantID = ? AND fk_courseCode = ?', [$fk_applicantID, $fk_courseCode]);

        return redirect()->back()->with('success', 'Applicant course campus record deleted.');
    }

    public function deleteCourse($courseCode)
    {
        $courseCampusExists = DB::table('applicantcoursecampus')
            ->where('fk_courseCode', $courseCode)
            ->exists();

        if ($courseCampusExists) {
            return redirect()->back()->withErrors([
                'delete_error' => 'You need to delete the record(s) from ApplicantCourseCampus table first.',
            ]);
        }

        DB::delete('DELETE FROM course WHERE courseCode = ?', [$courseCode]);

        return redirect()->back()->with('success', 'Course deleted.');
    }

}
