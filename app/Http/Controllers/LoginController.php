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
}
