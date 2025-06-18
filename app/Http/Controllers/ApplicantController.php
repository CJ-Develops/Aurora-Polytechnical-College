<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ApplicantController extends Controller
{
    public function add(Request $request)
    {
        $latest = DB::table('applicant')->orderBy('applicantID', 'desc')->first();
        $nextNumber = $latest ? ((int) substr($latest->applicantID, 5)) + 1 : 1;
        $newApplicantID = date('Y') . '-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        $password = Str::random(8);

        DB::insert(
            "INSERT INTO applicant(applicantID, password, applicantName, gender, religion, dateOfBirth, age, civilStatus, placeOfBirth, applicantCitizenship, permanentAddress, telephone, emailAddress, fbAccount, hsName, hsAddress, generalAverage, yearOfCompletion)
            
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $newApplicantID,
                $password,
                $request->input('applicantName'),
                $request->input('gender'),
                $request->input('religion'),
                $request->input('dateOfBirth'),
                $request->input('age'),
                $request->input('civilStatus'),
                $request->input('placeOfBirth'),
                $request->input('applicantCitizenship'),
                $request->input('permanentAddress'),
                $request->input('telephone'),
                $request->input('emailAddress'),
                $request->input('fbAccount'),
                $request->input('hsName'),
                $request->input('hsAddress'),
                $request->input('generalAverage'),
                $request->input('yearOfCompletion'),
            ]
        );

        DB::insert(
        "INSERT INTO guardian(fk_applicantID, guardianType, guardianName, citizenship, martialStatus, highestEducAttain, presentOccupation, monthlyIncome)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $newApplicantID,
                $request->input('guardianType'),
                $request->input('guardianName'),
                $request->input('citizenship'),
                $request->input('martialStatus'),
                $request->input('highestEducAttain'),
                $request->input('presentOccupation'),
                $request->input('monthlyIncome')
            ]
        );

        // Store applicantID in session
        Session::put('applicantID', $newApplicantID);

        // Redirect to dashboard
        return redirect('/dashboard')->with('success', 'Account created successfully.');

        // return $newApplicantID;

    }

    public function dashboard()
    {
        if (!Session::has('applicantID')) {
            return redirect('/applicant_login')->with('error', 'Unauthorized access.');
        }

        $applicantID = Session::get('applicantID');

        $user = DB::select('SELECT * FROM applicant WHERE applicantID = ?', [$applicantID]);

        if (empty($user)) {
            return redirect('/applicant_login')->with('error', 'Applicant not found.');
        }

        return view('dashboard', ['applicant' => $user[0]]);
    }
}