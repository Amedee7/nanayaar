<?php

namespace App\Services;

use App\Models\Client;
use Carbon\Carbon;

class NumbService
{

    //GENERATE RANDOM NUMB CLIENT
    public static function generateNumb()
    {
        $lastClient = Client::latest()->first();
        $lastClient == null ?  $lastClientID = 0 : $lastClientID = $lastClient->id;
        // if ($lastClient == null) {
        //     $lastClientID = 0;
        // } else {
        //     $lastClientID = $lastClient->id;
        // }
        // $currentMounth = Carbon::today()->format('M');
        $currentYear = Carbon::today()->format('Y');
        $numb_cli = $currentYear . '-' . $lastClientID + 1;

        return $numb_cli;
    }
//GENERATE RANDOM NUMB CLIENT
public static function generateNumb()
{
    $lastStudent = Client::latest()->first();
    $lastStudent == null ?  $lastStudentID = 0 : $lastStudentID = $lastStudent->id;
    // if ($lastStudent == null) {
    //     $lastStudentID = 0;
    // } else {
    //     $lastStudentID = $lastStudent->id;
    // }
    $currentYear = Carbon::today()->format('Y');
    $cli_ = $currentYear . '-' . $lastStudentID + 1;

    return $cli_;
}
}