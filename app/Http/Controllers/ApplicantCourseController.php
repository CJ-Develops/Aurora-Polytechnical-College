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
        $priorities = $request->input('priority');

        $validCourseCodes = DB::table('course')->pluck('courseCode')->toArray();

        $sql = "INSERT INTO applicantcoursecampus(fk_applicantID, fk_courseCode, campus, priority) VALUES (?, ?, ?, ?)";

        DB::beginTransaction();
        $insertedCount = 0;
        $courseIndex = 0;

        foreach ($campuses as $campus) {
            for ($i = 0; $i < 2; $i++) {
                if (!isset($courseCodes[$courseIndex]) || !isset($priorities[$courseIndex])) {
                    throw new \Exception("Missing course code or priority at index: $courseIndex");
                }

                $courseCode = trim($courseCodes[$courseIndex]);
                $priority = trim($priorities[$courseIndex]);

                if (!in_array($courseCode, $validCourseCodes)) {
                    throw new \Exception("Invalid course code: $courseCode");
                }

                DB::insert($sql, [
                    $fk_applicantID,
                    $courseCode,
                    $campus,
                    $priority,
                ]);

                $insertedCount++;
                $courseIndex++;
            }
        }

        DB::commit();

        return $insertedCount;
    }
}
