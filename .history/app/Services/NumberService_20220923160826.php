<?php

namespace App\Services;

use App\Models\Client;

class NumberService{
//GENERATE RANDOM NUMBER CLIENT

/**
 * @Route("Route", name="RouteName")
 */
public function static generateNumber()
{
    $lastCLient = Client::latest()->first();
        $lastCLient == null ?  $lastCLientID = 0 : $lastCLientID = $lastCLient->id;
        // if ($lastStudent == null) {
        //     $lastStudentID = 0;
        // } else {
        //     $lastStudentID = $lastStudent->id;
        // }
        $currentYear = Carbon::today()->format('Y');
        $numb_cli = $currentYear . '-' . $lastCLientID + 1;
    return $this->numb_cli;
}
}