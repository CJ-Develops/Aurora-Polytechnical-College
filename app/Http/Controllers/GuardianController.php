<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guardian;

class GuardianController extends Controller
{
    public function add(Request $request)
    {
        $applicantID = $request->input('applicantID');

        if (!$applicantID) {
            return back()->withErrors('Applicant ID is required.');
        }

        // Check if guardianName array exists
        if (!is_array($request->guardianName) || count($request->guardianName) === 0) {
            return back()->withErrors('At least one guardian entry is required.');
        }

        $count = count($request->guardianName);

        for ($i = 0; $i < $count; $i++) {
            // Skip if all main fields are empty
            if (
                empty($request->guardianName[$i]) &&
                empty($request->citizenship[$i]) &&
                empty($request->presentOccupation[$i]) &&
                empty($request->highestEducAttain[$i])
            ) {
                continue;
            }

            $guardian = new Guardian();
            $guardian->fk_applicantID = $applicantID;
            $guardian->guardianType = $request->guardianType[$i] ?? null;
            $guardian->guardianName = $request->guardianName[$i];
            $guardian->citizenship = $request->citizenship[$i] ?? null;
            $guardian->martialStatus = $request->martialStatus[$i] ?? null;  // fix spelling if needed
            $guardian->highestEducAttain = $request->highestEducAttain[$i] ?? null;
            $guardian->presentOccupation = $request->presentOccupation[$i] ?? null;
            $guardian->monthlyIncome = $request->monthlyIncome[$i] ?? null;
            $guardian->save();
        }

        return back()->with('success', 'Guardians added successfully.');
    }
}
