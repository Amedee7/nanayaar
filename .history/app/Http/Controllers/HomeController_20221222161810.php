<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::all();
        // $total = $subscribers->count();
        // $confirmed = $subscribers->where('status', 'confirmed')->count();
        // $unconfirmed = $subscribers->where('status', 'unconfirmed')->count();
        // $cancelled = $subscribers->where('status', 'cancelled')->count();
        // $bounced = $subscribers->where('status', 'bounced')->count();
        $countApprouved = Client::where('status', '=', 'Accepter')->count();
        $countNotApprouved = Client::where('status', '=', 'En attente')->count();

        return view('home', compact('countApprouved', 'countNotApprouved', 'clients'));
    }
}
