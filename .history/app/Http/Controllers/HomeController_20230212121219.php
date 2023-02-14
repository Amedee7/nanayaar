<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Versement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\DateLimitpaiement;
use PSpell\Config;

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

        $versementDuJour = Versement::where('created_at', '>=', $today)->sum('montant_octroye');
        $commissionDuJour = Versement::where('created_at', '>=', $today)->sum('commission_verse');
        $penaliteDuJour = Versement::where('created_at', '>=', $today)->sum('penalite');

        $versements =  Versement::whereIn('status', ['published', 'featured', 'scheduled'])->get();
        $versementDuJour = $versements->where('created_at', '>=', $today)->sum('montant_octroye');
        $commissionDuJour = $versements->where(;
        $penaliteDuJour = $versements->where(';
        // dd($versementDuJour);

        $totalMontantOctroyé = Versement::whereIn('state', ['En cours', 'Terminé'])->sum('montant_octroye');
        $totalCommissions = Versement::whereIn('state', ['En cours', 'Terminé'])->sum('commission_verse');

        $clientEnRetard = Versement::whereRaw('DATEDIFF(fin, debut) <= 2')->where('status', '!=', 'Remboursé')->count();
        $versementEnd = Versement::where('fin', '<', $today)->where('status', '!=', 'Remboursé')->count();
        // dd($versementEnd);

        $config = Config::where('id', $request->client)->first();


        if ($request->has('trashed')) {
            $clients = Client::onlyTrashed()->orderBy('id', 'desc')->paginate('10');
        } else {
            $clients = Client::with('user')->orderBy('id', 'desc')->paginate('10');
        }

        return view(
            'home',
            ['clients' => $clients],
            ['verse$versements' =>$versements],
            [
                'clientAttente'         => $clientAttente,
                'clientAccepté'         => $clientAccepté,
                'clientRejeté'          => $clientRejeté,
                'totalMontantOctroyé'   => $totalMontantOctroyé,
                'clientEnRetard'        => $clientEnRetard,
                'versementEnd'          => $versementEnd,
                'versementDuJour'       => $versementDuJour,
                'totalCommissions'      => $totalCommissions,
                'commissionDuJour'      => $commissionDuJour,
                'penaliteDuJour'        => $penaliteDuJour,
            ]
        );
    }
}
