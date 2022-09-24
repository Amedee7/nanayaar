<?php

namespace App\Services;

use App\Models\Client;
use Carbon\Carbon;

class NumbClientService
{

    //GENERATE RANDOM NUMB CLIENT
    public static function generateNumbClient()
    {
        $lastClient = Client::latest()->first();
        $lastClient == null ?  $lastCientID = 0 : $lastClientID = $lastClient->id;
        // if ($lastStudent == null) {
        //     $lastClientID = 0;
        // } else {
        //     $lastClientID = $lastClient->id;
        // }
        $currentMounth = Carbon::today()->format('M');
        $currentYear = Carbon::today()->format('Y');
        $matricule = $currentMounth  . '-' . $currentYear . '-' . $lastClientID + 1;

        return $matricule;
    }
}
