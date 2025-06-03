<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $applicantID = $request->input('applicantID');
        $password = $request->input('password');

        $adminUsername = config('login.username');
        $adminPassword = config('login.password');

        if ($applicantID === $adminUsername && $password === $adminPassword) {
            Session::put('is_admin', true);
            return redirect('/admin');
        }

        $user = DB::select('SELECT * FROM applicant WHERE applicantID = ? AND password = ?', [$applicantID, $password]);

        if (count($user) > 0) {
            Session::put('applicantID', $applicantID);
            return redirect('/dashboard');
        } else {
            return redirect('/applicant_login')->with('error', 'Invalid credentials');
        }
    }

    public function dashboard()
    {
        $applicantID = Session::get('applicantID');

        if (!$applicantID) {
            return redirect('/applicant_login')->with('error', 'Please login first.');
        }

        $user = DB::select('SELECT applicantName FROM applicant WHERE applicantID = ?', [$applicantID]);
        $name = $user[0]->applicantName ?? 'Guest';

        return view('dashboard', compact('name'));
    }

    public function admin()
    {
        if (!Session::get('is_admin')) {
            return redirect('/applicant_login')->with('error', 'Unauthorized access.');
        }

        return view('admin');
    }
}
