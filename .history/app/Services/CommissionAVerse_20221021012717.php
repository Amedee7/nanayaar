<?php

namespace App\Services;

use Carbon\Carbon;

class CommissionAVerse
{
    //GENERATE RANDOM NUMBER CLIENT

    /**
     * @Route("Route", name="RouteName")
     */
    public static function Comm()
    {
        // get the current time
        $current = Carbon::now();
        // add 30 days to the current time
        $limit_date = $current->addDays(14)->toDateTimeString();
        return $limit_date;
    }
}
