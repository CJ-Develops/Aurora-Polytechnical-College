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

        return redirect('/admin?table=guardian')->with('success', "GuardianID $id, ApplicantID {$request->fk_applicantID} already updated.");
    }

    public function intendedUpdate(Request $request)
    {
        $applicantID = $request->input('fk_applicantID');
        $newCampus = $request->input('campus');
        $courses = $request->input('courses', []);
        $priorities = $request->input('priorities', []);

        // Validation: Two course choices and two priorities are required
        if (count($courses) !== 2 || count($priorities) !== 2) {
            return back()->with('error', 'Exactly two courses and two priorities are required.');
        }

        // Validation: Cannot choose the same course twice in the same campus
        if ($courses[0] === $courses[1]) {
            return back()->with('error', 'Update not applied: You selected the same course twice for the same campus. Please choose two different courses.');
        }

        // Fetch current course & campus data
        $existing = DB::select(
            'SELECT fk_courseCode, campus FROM applicantcoursecampus 
         WHERE fk_applicantID = ? ORDER BY priority ASC',
            [$applicantID]
        );

        $oldCourses = array_column($existing, 'fk_courseCode');
        $oldCampus = $existing[0]->campus ?? null;

        // Delete existing selected priorities for update
        DB::delete(
            'DELETE FROM applicantcoursecampus 
         WHERE fk_applicantID = ? 
         AND (priority = ? OR priority = ?)',
            [$applicantID, $priorities[0], $priorities[1]]
        );

        // Insert new course selections
        for ($i = 0; $i < 2; $i++) {
            DB::insert(
                'INSERT INTO applicantcoursecampus (fk_applicantID, fk_courseCode, campus, priority) 
             VALUES (?, ?, ?, ?)',
                [$applicantID, $courses[$i], $newCampus, $priorities[$i]]
            );
        }

        // Compare changes
        $oldCoursesSorted = $oldCourses;
        $newCoursesSorted = $courses;
        sort($oldCoursesSorted);
        sort($newCoursesSorted);

        $courseChanged = $oldCoursesSorted !== $newCoursesSorted;
        $campusChanged = $newCampus !== $oldCampus;

        // Build message
        $messageParts = [];

        if ($courseChanged && !$campusChanged) {
            $messageParts[] = "courses (" . implode(', ', $courses) . ")";
        } elseif ($campusChanged && !$courseChanged) {
            $messageParts[] = "campus ($newCampus)";
        } elseif ($courseChanged && $campusChanged) {
            $messageParts[] = "courses (" . implode(', ', $courses) . ")";
            $messageParts[] = "campus ($newCampus)";
        }

        $message = empty($messageParts)
            ? "No changes made for $applicantID."
            : "$applicantID updated: " . implode(' and ', $messageParts) . ".";

        return redirect('/admin?table=intended')->with('success', $message);
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

        return redirect('/admin?table=course')->with('success', "$request->courseCode updated successfully.");
    }
}
