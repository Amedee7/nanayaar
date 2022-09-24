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
        $lastClient = Client::latest()->first();
        $lastClient == null ?  $lastCientID = 0 : $lastClientID = $lastClient->id;
        // if ($lastStudent == null) {
        //     $lastClientID = 0;
        // } else {
        //     $lastClientID = $lastClient->id;
        // }
        $currentYear = Carbon::today()->format('Y');
        $matricule = $currentYear . '-' . $lastClientID + 1;

        return $matricule;
    }
}
