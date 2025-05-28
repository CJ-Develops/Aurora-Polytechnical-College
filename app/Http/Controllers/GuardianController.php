<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuardianController extends Controller
{
    public function addGuardiansForApplicant($fk_applicantID, Request $request)
    {
        $guardianTypes = $request->input('guardianType');
        $guardianNames = $request->input('guardianName');
        $citizenships = $request->input('citizenship');
        $martialStatuses = $request->input('martialStatus');
        $educations = $request->input('highestEducAttain');
        $occupations = $request->input('presentOccupation');
        $incomes = $request->input('monthlyIncome');

        $sql = "INSERT INTO guardian(fk_applicantID, guardianType, guardianName, citizenship, martialStatus, highestEducAttain, presentOccupation, monthlyIncome) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $insertedCount = 0;

        for ($i = 0; $i < count($guardianTypes); $i++) {
            if (!isset($guardianNames[$i]) || trim($guardianNames[$i]) === '') {
                continue;
            }

            DB::insert($sql, [
                $fk_applicantID,
                $guardianTypes[$i],
                $guardianNames[$i],
                $citizenships[$i] ?? null,
                $martialStatuses[$i] ?? null,
                $educations[$i] ?? null,
                $occupations[$i] ?? null,
                $incomes[$i] ?? null,
            ]);

            $insertedCount++;
        }

        return $insertedCount;
    }
}
