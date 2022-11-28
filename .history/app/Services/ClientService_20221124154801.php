<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class ClientService
{
    public static function data(){
        $data = Client::with('classe', 'niveau');

        return $data;
    }
}
