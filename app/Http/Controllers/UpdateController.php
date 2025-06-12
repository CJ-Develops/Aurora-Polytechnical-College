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
            $request->fk_applicantID // using the correct request key
        ]
    );

        return redirect('/admin?table=guardian')->with('success', 'Guardian updated successfully!');
    }

    public function intendedUpdate(Request $request)
    {
        DB::update(
            'UPDATE applicantcoursecampus SET campus = ? WHERE fk_applicantID = ? AND fk_courseCode = ?',
            [
                $request->campus,
                $request->fk_applicantID,
                $request->fk_courseCode,
            ]
        );

        return redirect('/admin?table=intended')->with('success', 'Campus updated successfully.');
    }

    public function courseUpdate(Request $request)
    {
        DB::update('UPDATE course SET courseName = ?, duration = ?, department = ?, totalUnits = ? WHERE courseCode = ?', [
            $request->courseName,
            $request->duration,
            $request->department,
            $request->totalUnits,
            $request->courseCode,
        ]);

        return redirect('/admin?table=course')->with('success', 'Course updated successfully.');
    }
}