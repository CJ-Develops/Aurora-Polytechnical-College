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

        return $newApplicantID;
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

    public function showPassword(Request $request)
    {
        $applicantID = $request->input('applicantID');
        $email = $request->input('emailAddress');

        if (!$applicantID || !$email) {
            return redirect('/applicant_login')->with('error', 'Applicant ID and Email are required.');
        }

        $applicant = DB::selectOne(
            'SELECT applicantID, applicantName, password FROM applicant WHERE applicantID = ? AND emailAddress = ?',
            [$applicantID, $email]
        );

        if (!$applicant) {
            return redirect('/applicant_login')->with('error', 'Invalid Applicant ID or Email.');
        }

        return view('getpassword', ['applicant' => $applicant]);
    }
}
