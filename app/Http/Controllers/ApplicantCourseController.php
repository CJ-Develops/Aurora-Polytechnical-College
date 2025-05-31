<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicantCourseController extends Controller
{
    public function storeApplicantCourseCampus($fk_applicantID, Request $request)
    {
        $campuses = $request->input('campus');
        $courseCodes = $request->input('courseCode');

        $validCourseCodes = DB::table('course')->pluck('courseCode')->toArray();

        $sql = "INSERT INTO applicantcoursecampus(fk_applicantID, fk_courseCode, campus) VALUES (?, ?, ?)";

        DB::beginTransaction();
        $insertedCount = 0;
        $courseIndex = 0;

        foreach ($campuses as $campus) {
            for ($i = 0; $i < 2; $i++) {
                if (!isset($courseCodes[$courseIndex])) {
                    throw new \Exception("Missing course code for index: $courseIndex");
                }

                $courseCode = trim($courseCodes[$courseIndex]);

                if (!in_array($courseCode, $validCourseCodes)) {
                    throw new \Exception("Invalid course code: $courseCode");
                }

                DB::insert($sql, [
                    $fk_applicantID,
                    $courseCode,
                    $campus,
                ]);

                $insertedCount++;
                $courseIndex++;
            }
        }

        DB::commit();

        return $insertedCount;
    }
}
