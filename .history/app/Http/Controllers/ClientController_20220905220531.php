<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{



    public function create()
    {
        return view('clients.modals.create');
    }
}