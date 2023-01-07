<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function __invoke(Request $request)
    {  
        $actualYear = $request->year;

        // Années disponibles
        $years = range(Order::oldest()->first()->created_at->year, now()->year);

        return view('back.statistics.index', compact(
            'years',
            'actualYear'
        ));
    }
}
