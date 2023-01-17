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

        $clients =  Client::whereIn('status', ['Accepté', 'Attente', 'Rejeté'])->get();
        $clientAccepté = $clients->where('status', '=', 'Accepté')->where('deleted_at', null)->count();
        $clientAttente = $clients->where('status', '=', 'Attente')->where('deleted_at', null)->count();
        $clientRejeté = $clients->where('status', '=', 'Rejeté')->where('deleted_at', null)->count();

        $versementDuJour = Versement::where('created_at', '>=', $today )->sum('montant_octroye');
        // dd($versementDuJour);

        $totalMontantOctroyé = Versement::where('state', 'En cours')->sum('montant_octroye');
        $totalCommissions = Versement::where('state', 'En cours')->sum('commission_verse');

        $clientEnRetard = Versement::where('fin', '>=', DB::raw("DATE_ADD(CURDATE(), INTERVAL 14 DAY)"))->count();
        $versementEnd = Versement::where('somme_verse', '=!', 'montant_octroye')->where('fin', '<', $today)->count();
        dd($clientEnRetard);

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
                'versementDuJour'          => $versementDuJour,
                'totalCommissions'      => $totalCommissions
            ]
        );
    }
}
