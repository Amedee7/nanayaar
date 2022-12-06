<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Client;

class NumberService
{
    //GENERATE RANDOM NUMBER CLIENT

    /**
     * @Route("Route", name="RouteName")
     */
    public static function generateNumber()
    {
        // $lastCLient = Client::latest()->first();
        // $lastCLient == null ?  $lastCLientID = 0 : $lastCLientID = $lastCLient->id;
        if ($lastClient == null) {
            $lastClientID = 0;
        } else {
            $lastClientID = $lastClient->id;
        }
        // $currentMounth = Carbon::today()->format('m');
        $currentYear = Carbon::today()->format('Y');
        $numb_cli = $currentYear . '-' . $lastCLientID + 1;
        return $numb_cli;
    }
}
