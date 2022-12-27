<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Versement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\DateLimitpaiement;

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
    public function index(Request $request)
    {

        $date = date_create("2013-03-15");
        date_add($date, date_interval_create_from_date_string("40 days"));
        dd(date_format($date, "Y-m-d")) ;


        $clientAttente = DB::table('clients')->where('status', 'Attente')->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 'Accepté')->where('clients.deleted_at', null)->count();
        $clientRejeté = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();
        $totalMontantOctroyé = Versement::where('state', 'Terminé')->sum('montant_octroye');
        $totalCommissions = Versement::where('state', 'En cours')->sum('commission_verse');

        $clientEnRetard = Versement::where('limit', '=', DB::raw("DATE_ADD(end, INTERVAL 1 DAY)"))->count();
        // dd($clientEnRetard);



        if ($request->has('trashed')) {
            $clients = Client::onlyTrashed()->orderBy('id', 'desc')->paginate('10');
        } else {
            $clients = Client::with('user')->orderBy('id', 'desc')->paginate('10');
        }

        return view(
            'home',
            ['clients' => $clients],
            [
                'clientAttente' => $clientAttente,
                'clientAccepté' => $clientAccepté,
                'clientRejeté' => $clientRejeté,
                'totalMontantOctroyé' => $totalMontantOctroyé,
                'clientEnRetard' => $clientEnRetard,
                'totalCommissions' => $totalCommissions
            ]
        );
    }
}
