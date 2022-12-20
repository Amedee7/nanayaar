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
        $endDate = Carbon::now()->addDays(14);
        $numberOfDays = $endDate->diffInDays($startDate);

        $penaltyRatePerDay = 0.1 / 100; // 0.1% penalty rate per day
$penaltyAmount = $numberOfDays * $penaltyRatePerDay;

echo number_format($penaltyAmount, 2);
        return $numberOfDays;
    }
}
