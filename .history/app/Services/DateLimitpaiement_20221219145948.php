<?php

namespace App\Services;

use Carbon\Carbon;

class DateLimitpaiement
{
    /**
     * @Route("Route", name="RouteName")
     */
    public static function generateLimitdate()
    {
        // // get the current time
        // $current = Carbon::now();

        // // add 14 days to the current time
        // $limit_date = $current->addDays(14)->toDateTimeString();
        // return $limit_date;

        $startDate = Carbon::now();
$endDate = Carbon::now()->addDays(30);
    }
}
