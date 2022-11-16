<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Client;

class CommissionService
{
    //GENERATE RANDOM NUMBER CLIENT

    /**
     * @Route("Route", name="RouteName")
     */
    public static function generateCommission()
    {
        // get the current time
        $current = Carbon::now();

        // add 30 days to the current time
        $trialExpires = $current->addDays();
    }
}
