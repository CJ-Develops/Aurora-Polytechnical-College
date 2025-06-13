<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function applicantUpdate(Request $request, $id)
    {
        DB::update("
            UPDATE applicant
            SET 
                applicantName = ?, gender = ?, religion = ?, dateOfBirth = ?, age = ?, civilStatus = ?, 
                placeOfBirth = ?, applicantCitizenship = ?, permanentAddress = ?, telephone = ?, 
                emailAddress = ?, fbAccount = ?, hsName = ?, hsAddress = ?, generalAverage = ?, yearOfCompletion = ?
            WHERE applicantID = ?
        ", [
            $request->applicantName,
            $request->gender,
            $request->religion,
            $request->dateOfBirth,
            $request->age,
            $request->civilStatus,
            $request->placeOfBirth,
            $request->applicantCitizenship,
            $request->permanentAddress,
            $request->telephone,
            $request->emailAddress,
            $request->fbAccount,
            $request->hsName,
            $request->hsAddress,
            $request->generalAverage,
            $request->yearOfCompletion,
            $id
        ]);

        return redirect('/admin?table=applicant')->with('success', 'Applicant updated!');
    }

    public function guardianUpdate(Request $request, $id)
    {
        DB::update(
            'UPDATE guardian SET 
                guardianType = ?, 
                guardianName = ?, 
                citizenship = ?, 
                martialStatus = ?, 
                highestEducAttain = ?, 
                presentOccupation = ?, 
                monthlyIncome = ?
            WHERE guardianID = ? AND fk_applicantID = ?',
            [
                $request->guardianType,
                $request->guardianName,
                $request->citizenship,
                $request->martialStatus,
                $request->highestEducAttain,
                $request->presentOccupation,
                $request->monthlyIncome,
                $id,
                $request->fk_applicantID
            ]
        );

        return redirect('/admin?table=guardian')->with('success', 'Guardian updated successfully!');
    }

    public function intendedUpdate(Request $request)
    {
        $applicantID = $request->input('fk_applicantID');
        $originalCampus = $request->input('original_campus');
        $newCampus = $request->input('campus');
        $courses = $request->input('courses', []);

        if (count($courses) > 2) {
            return back()->with('error', 'Only two courses are allowed.');
        }

        foreach ($courses as $courseCode) {
            $exists = DB::selectOne(
                'SELECT 1 FROM applicantcoursecampus WHERE fk_applicantID = ? AND fk_courseCode = ? AND campus != ?',
                [$applicantID, $courseCode, $originalCampus]
            );

            if ($exists) {
                return back()->with('error', "Course $courseCode is already assigned to this applicant in another campus.");
            }
        }

        DB::delete(
            'DELETE FROM applicantcoursecampus WHERE fk_applicantID = ? AND campus = ?',
            [$applicantID, $originalCampus]
        );

        foreach ($courses as $courseCode) {
            DB::insert(
                'INSERT INTO applicantcoursecampus (fk_applicantID, fk_courseCode, campus) VALUES (?, ?, ?)',
                [$applicantID, $courseCode, $newCampus]
            );
        }

        return redirect('/admin?table=intended')->with('success', 'Courses and campus updated successfully.');
    }


    public function courseUpdate(Request $request)
    {
        if ($request->courseCode !== $request->original_courseCode) {
            DB::insert(
                'INSERT INTO course (courseCode, courseName, duration, department, totalUnits)
             VALUES (?, ?, ?, ?, ?)',
                [
                    $request->courseCode,
                    $request->courseName,
                    $request->duration,
                    $request->department,
                    $request->totalUnits,
                ]
            );

            DB::update(
                'UPDATE applicantcoursecampus SET fk_courseCode = ? WHERE fk_courseCode = ?',
                [
                    $request->courseCode,
                    $request->original_courseCode
                ]
            );

            DB::delete('DELETE FROM course WHERE courseCode = ?', [$request->original_courseCode]);
        } else {
            DB::update(
                'UPDATE course 
             SET courseName = ?, duration = ?, department = ?, totalUnits = ?
             WHERE courseCode = ?',
                [
                    $request->courseName,
                    $request->duration,
                    $request->department,
                    $request->totalUnits,
                    $request->courseCode
                ]
            );
        }

        return redirect('/admin?table=course')->with('success', 'Course updated successfully.');
    }
}
