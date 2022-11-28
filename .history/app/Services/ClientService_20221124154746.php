<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Support\Facades\DB;

class ClientService
{
    public static function data(){
        $data = Student::with('classe', 'niveau');

        return $data;
    }
}
