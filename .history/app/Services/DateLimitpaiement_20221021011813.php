<?php

namespace App\Services;

use Carbon\Carbon;

class DateLimitpaiement
{
    //GENERATE RANDOM NUMBER CLIENT

    /**
     * @Route("Route", name="RouteName")
     */
    public static function generateLimitdate()
    {
        // get the current time
        $current = Carbon::now();
        // add 30 days to the current time
        $limit$current->addDays(14)->toDateTimeString();
    }
}
