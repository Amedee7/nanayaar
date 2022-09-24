<?php

namespace App\Services;

use App\Models\Versement;
use Carbon\Carbon;

class ClientnumbService
{

    //GENERATE RANDOM NUMB CLIENT
    public static function generateNumbclient()
    {
        $lastClient = Versement::latest()->first();
        $lastClient == null ?  $lastClientID = 0 : $lastClientID = $lastClient->id;
        // if ($lastStudent == null) {
        //     $lastClientID = 0;
        // } else {
        //     $lastClientID = $lastClient->id;
        // }
        // $currentMounth = Carbon::today()->format('M');
        $currentYear = Carbon::today()->format('Y');
        $numb_cli = $currentYear . '-' . $lastClientID + 1;

        return $numb_cli;
    }
}
