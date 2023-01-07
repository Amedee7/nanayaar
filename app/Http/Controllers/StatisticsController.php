<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function __invoke(Request $request)
    {  
        $actualYear = $request->year;

        // Années disponibles
        $years = range(Client::oldest()->first()->created_at->year, now()->year);

        return view('statistics.index', compact(
            'years',
            'actualYear'
        ));
    }
}
