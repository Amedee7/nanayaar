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
        $today = Carbon::today();


        $clientAttente = DB::table('clients')->where('status', 'Attente')->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 'Accepté')->where('clients.deleted_at', null)->count();
        $clientRejeté = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();
        $totalMontantOctroyé = Versement::where('state', 'En cours')->sum('montant_octroye');
        $totalCommissions = Versement::where('state', 'En cours')->sum('commission_verse');

        $clientEnRetard = Versement::where('fin', '=', DB::raw("DATE_ADD(CURDATE(), INTERVAL 14 DAY)"))->count();
        $versementEnd = Versement::where('somme_verse', '=!', 'montant_octroye')->where('fin', '<', $today)->count();
        // dd($clientEnRetard);

        $reste_apaye = 1000;
        $nombre_de_jours = 7;
    
        $penalite = $reste_apaye * 1/100 * $nombre_de_jours;
        dd($penalite);

        if ($request->has('trashed')) {
            $clients = Client::onlyTrashed()->orderBy('id', 'desc')->paginate('10');
        } else {
            $clients = Client::with('user')->orderBy('id', 'desc')->paginate('10');
        }

        return view(
            'home',
            ['clients' => $clients],
            [
                'clientAttente'         => $clientAttente,
                'clientAccepté'         => $clientAccepté,
                'clientRejeté'          => $clientRejeté,
                'totalMontantOctroyé'   => $totalMontantOctroyé,
                'clientEnRetard'        => $clientEnRetard,
                'versementEnd'          => $versementEnd,
                'totalCommissions'      => $totalCommissions
            ]
        );
    }
}
