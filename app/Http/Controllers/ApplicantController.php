<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    public function add(Request $request)
    {
        $year = date('Y');

        // Get the last applicantID starting with current year, sorted descending
        $lastApplicant = Applicant::where('applicantID', 'like', $year . '%')
            ->orderBy('applicantID', 'desc')
            ->first();

        if ($lastApplicant) {
            // Extract the number part (after the dash) starting from index 5
            $lastNumber = intval(substr($lastApplicant->applicantID, 5));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Format new applicantID as "YYYY-NNNNN", e.g., "2025-00001"
        $applicantID = $year . '-' . str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        // Create new applicant and fill properties
        $applicant = new Applicant();
        $applicant->applicantID = $applicantID;
        $applicant->applicantName = $request->applicantName;
        $applicant->gender = $request->gender;
        $applicant->religion = $request->religion;
        $applicant->dateOfBirth = $request->dateOfBirth;
        $applicant->age = $request->age;
        $applicant->civilStatus = $request->civilStatus;
        $applicant->placeOfBirth = $request->placeOfBirth;
        $applicant->applicantCitizenship = $request->applicantCitizenship;
        $applicant->permanentAddress = $request->permanentAddress;
        $applicant->telephone = $request->telephone;
        $applicant->emailAddress = $request->emailAddress;
        $applicant->fbAccount = $request->fbAccount;
        $applicant->hsName = $request->hsName;
        $applicant->hsAddress = $request->hsAddress;
        $applicant->generalAverage = $request->generalAverage;
        $applicant->yearOfCompletion = $request->yearOfCompletion;

        $applicant->save();

        return back()->with('success', 'Applicant information submitted successfully.');
    }
}
