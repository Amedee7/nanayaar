<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Student;
use Carbon\Carbon;

class NumbClientService
{

    //GENERATE RANDOM NUMB CLIENT
    public static function generateMat()
    {
        $lastStudent = Client::latest()->first();
        $lastStudent == null ?  $lastStudentID = 0 : $lastStudentID = $lastStudent->id;
        // if ($lastStudent == null) {
        //     $lastStudentID = 0;
        // } else {
        //     $lastStudentID = $lastStudent->id;
        // }
        $currentYear = Carbon::today()->format('Y');
        $matricule = $currentYear . '-' . $lastStudentID + 1;

        return $matricule;
    }
}
