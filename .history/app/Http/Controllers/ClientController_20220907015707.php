<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;

class ClientController extends Controller
{

    public function index()
    {
        return view('clients.index');
    }
}
