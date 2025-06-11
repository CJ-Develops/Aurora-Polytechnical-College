<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (!Session::get('is_admin')) {
            return redirect('/applicant_login')->with('error', 'Unauthorized access.');
        }

        $table = $request->query('table', 'applicant');

        switch ($table) {
            case 'guardian':
                $guardians = DB::table('guardian')->get();
                return view('admin', ['table' => 'guardian', 'guardians' => $guardians]);

            case 'course':
                $courses = DB::table('course')->get();
                return view('admin', ['table' => 'course', 'courses' => $courses]);

            case 'intended':
                $intendeds = DB::table('applicantcoursecampus')->get();
                return view('admin', ['table' => 'intended', 'intendeds' => $intendeds]);

            case 'applicant':
            default:
                $applicants = DB::table('applicant')->get();
                return view('admin', ['table' => 'applicant', 'applicants' => $applicants]);
        }
    }
}