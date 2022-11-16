<?php

namespace App\Services;

use Carbon\Carbon;

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
        Carbon\Carbon::now()->addDays(14)->toDateTimeString()
    }
}
