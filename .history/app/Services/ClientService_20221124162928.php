<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientService
{
    public static function data(){
        $data = Client::all('classe', 'niveau');

        return $data;
    }
}
