<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateDeleteController extends Controller
{
    // Delete applicant
    public function deleteApplicant($id)
    {
        DB::delete("DELETE FROM applicants WHERE applicantID = ?", [$id]);
        return redirect('/admin?table=applicant')->with('success', 'Applicant deleted successfully.');
    }

    // Update applicant (example)
    public function updateApplicant(Request $request, $id)
    {
        DB::update("UPDATE applicants SET applicantName = ?, gender = ?, religion = ? WHERE applicantID = ?", [
            $request->input('applicantName'),
            $request->input('gender'),
            $request->input('religion'),
            $id
        ]);
        return redirect('/admin?table=applicant')->with('success', 'Applicant updated successfully.');
    }

    // Delete guardian
    public function deleteGuardian($id)
    {
        DB::delete("DELETE FROM guardians WHERE guardianID = ?", [$id]);
        return redirect('/admin?table=guardian')->with('success', 'Guardian deleted successfully.');
    }

    // Update guardian
    public function updateGuardian(Request $request, $id)
    {
        DB::update("UPDATE guardians SET guardianName = ?, citizenship = ?, martialStatus = ? WHERE guardianID = ?", [
            $request->input('guardianName'),
            $request->input('citizenship'),
            $request->input('martialStatus'),
            $id
        ]);
        return redirect('/admin?table=guardian')->with('success', 'Guardian updated successfully.');
    }

    // Delete intended course
    public function deleteIntended($applicantId, $courseCode)
    {
        DB::delete("DELETE FROM intended_courses WHERE fk_applicantID = ? AND fk_courseCode = ?", [$applicantId, $courseCode]);
        return redirect('/admin?table=intended')->with('success', 'Intended course deleted successfully.');
    }

    // Update intended course
    public function updateIntended(Request $request, $applicantId, $courseCode)
    {
        DB::update("UPDATE intended_courses SET campus = ? WHERE fk_applicantID = ? AND fk_courseCode = ?", [
            $request->input('campus'),
            $applicantId,
            $courseCode
        ]);
        return redirect('/admin?table=intended')->with('success', 'Intended course updated successfully.');
    }

    // Delete course
    public function deleteCourse($code)
    {
        DB::delete("DELETE FROM courses WHERE courseCode = ?", [$code]);
        return redirect('/admin?table=course')->with('success', 'Course deleted successfully.');
    }

    // Update course
    public function updateCourse(Request $request, $code)
    {
        DB::update("UPDATE courses SET courseName = ?, duration = ?, department = ?, totalUnits = ? WHERE courseCode = ?", [
            $request->input('courseName'),
            $request->input('duration'),
            $request->input('department'),
            $request->input('totalUnits'),
            $code
        ]);
        return redirect('/admin?table=course')->with('success', 'Course updated successfully.');
    }
}
