<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use App\Models\Versement;
use Illuminate\Http\Request;
use App\Models\Configuration;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Services\DateLimitpaiement;
use Illuminate\Support\Facades\Auth;
use App\Services\CalculPenaliteService;
use Illuminate\Support\Facades\Validator;

class VersementController extends Controller
{
    public function datatables()
    {
        $versements = DB::table('versements')
            ->join('clients', 'clients.id', '=', 'versements.client_id')
            ->join('users', 'users.id', '=', 'versements.created_by')
            ->select(
                'versements.id',
                'versements.uuid',
                'versements.identifier',
                'versements.commentaire',
                'versements.montant_octroye',
                'somme_verse',
                'reste_apaye',
                'state',
                'penalite',
                'status_news_versement',
                'versements.status',
                'versements.commission_verse',
                'versements.debut',
                // 'fin',
                'clients.name',
                'clients.lastname',
                'clients.numb_cli',
                'clients.first_phone',
                'clients.montant_demande',

                'users.avatar',
                DB::raw('DATEDIFF(fin, debut) as nombreJour'),
                DB::raw('DATEDIFF(now(), fin) as joursApresDateLimite'),
                DB::raw('now() as today'),

                DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name"),
                DB::raw("CONCAT(clients.name,' ',clients.lastname) as full_name_client"),
                DB::raw("date_format(versements.created_at,'%d/%m/%Y à %H:%i') as created_at"),
                DB::raw("DATE_FORMAT(versements.fin, '%d/%m/%Y') as date_limite"),
                db::raw("date_format(versements.updated_at,'%d/%m/%Y à %H:%i') as updated_at")
            )->orderBy('updated_at', 'DESC')->where('versements.deleted_at', null);
        return datatables()->of($versements)

        ->addColumn('penalite', function($versements) {
            if (Carbon::parse(now()) > Carbon::parse($versements->fin)) {
                $penalite = CalculPenaliteService::calculPenalite($result->montant, Carbon::parse($versements->date1)->diffInDays(Carbon::parse($versements->date2)));
                return $penalite;
            } else {
                return 0;
            }
        })
            ->addColumn('actions', function ($versements) {
                return view('versements.actions', ['versements' => $versements]);
            })->toJson();
    }

    public function index(Request $request)
    {
        $clientAttente = DB::table('clients')->where('status', 'Attente')->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 'Accepté')->where('clients.deleted_at', null)->count();
        $clientRejeté = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();
        $differenceInDays = DB::table('versements')->select(db::raw('DATEDIFF(fin, debut) as testa'))->get();
        $joursApresDateLimite = DB::table('versements')
            ->select(DB::raw('DATEDIFF(now(), fin) as joursApresDateLimite'))
            ->get();
        // dd($joursApresDateLimite);

        $versements = DB::table('versements')
            ->join('clients', 'clients.id', '=', 'versements.client_id')
            ->join('users', 'users.id', '=', 'versements.created_by')
            ->select(
                'versements.id',
                'versements.identifier',
                'versements.commentaire',
                'versements.montant_octroye',
                'somme_verse',
                'reste_apaye',
                'state',
                'penalite',
                'versements.status',
                'clients.name',
                'clients.first_phone',
                'clients.montant_demande',

                'users.avatar',
                db::raw('DATEDIFF(fin, debut) as nombreJour'),
                db::raw('Carbon::now()->diffInDays(fin) as joursApresDateLimite '),
                db::raw('Carbon::now() as today'),

                DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name"),
                db::raw("date_format(versements.created_at,'%d/%m/%Y %H:%i') as created_at")
            )->where('versements.deleted_at', null);

        if ($request->has('trashed')) {
            $clients = Client::onlyTrashed()->paginate('10');
        } else {
            $clients = Client::with('user')->paginate('10');
        }

        return view(
            'versements.index',
            ['versements' => $versements],
            [
                'clients' => $clients,
                'clientAttente' => $clientAttente,
                'clientAccepté' => $clientAccepté,
                'clientRejeté' => $clientRejeté,
                'differenceInDays' => $differenceInDays,
                'joursApresDateLimite' => $joursApresDateLimite,
            ]
        );
    }

    //RECUPERATION D'UN CLIENT
    public function detailVersement(Versement $versement)
    {
        return view('versements.pages.details', ['versement' => $versement]);
    }

    public function create()
    {
        $clients = Client::all();
        return view('versements.create', compact('clients'));
    }

    public function renews()
    {
        $clients = Client::all();
        return view('versements.renews', compact('clients'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'montant_versement' => 'required|numeric',
            'numero_client' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $versement = new Versement();
        $versement->montant_versement                = $request->montant_versement;
        $versement->client_id                        = $request->numero_client;
        $versement->created_by = Auth::id();
        $versement->deleted_by;
        $versement->updated_by;

        $versement->save();

        activity("Versement")
            ->causedBy(Auth::user())
            ->performedOn($versement)
            ->withProperties([
                'Montant de versement' => $versement->montant_versement,
                'Numeron du client'  => $versement->numb_cli,
                'Créer par' => $versement->created_by,
            ])
            ->log("Versement de credit");

        return response()->json(['type' => 'success', 'message' => "Le Versement a été effectuer avec succès"]);
    }

    //DETAILS DU VERSEMENT
    public function showVersement($id)
    {

        $versement = DB::table('versements')
            ->join('clients', 'clients.id', '=', 'versements.client_id')
            ->join('users', 'users.id', '=', 'versements.created_by')
            ->select(
                'versements.id',
                'versements.identifier',
                'versements.commentaire',
                'versements.montant_octroye',
                'somme_verse',
                'reste_apaye',
                'state',
                'versements.status_news_versement',
                'versements.status',
                'clients.name',
                'clients.lastname',
                'clients.numb_cli as numero_client',
                'clients.first_phone as numero_telephone1_client',
                'clients.second_phone as numero_telephone2_client',


                'users.avatar',
                DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name_user"),
                DB::raw("CONCAT(clients.name,' ',clients.lastname) as full_name_client"),
                db::raw("date_format(versements.created_at,'%d/%m/%Y %H:%i') as created_at")
            )->where('versements.id', $id)->first();
        return view('versements.modals.show', [
            'versement' => $versement
        ]);
    }

    //DETAILS DU VERSEMENT
    public function showVersementClient($id)
    {

        $versement = DB::table('versements')
            ->join('clients', 'clients.id', '=', 'versements.client_id')
            ->join('users', 'users.id', '=', 'versements.created_by')
            ->select(
                'versements.id',
                'versements.identifier',
                'versements.commentaire',
                'versements.montant_octroye',
                'somme_verse',
                'reste_apaye',
                'state',
                'versements.status_news_versement',
                'versements.status',
                'clients.name',
                'clients.lastname',
                'clients.numb_cli as numero_client',
                'clients.first_phone as numero_telephone1_client',
                'clients.second_phone as numero_telephone2_client',

                'users.avatar',
                DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name_user"),
                DB::raw("CONCAT(clients.name,' ',clients.lastname) as full_name_client"),
                DB::raw("date_format(versements.created_at,'%d/%m/%Y %H:%i') as created_at")
            )->where('versements.id', $id)->first();
        return view('versements.modals.show', [
            'versement' => $versement
        ]);
    }

    //INITIATION DU VERSEMENT STORE FUNCTIONS
    public function versementStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client'                => 'required|exists:clients,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $client = Client::where('id', $request->client)->first();

        $versement = new Versement();
        $versement->identifier          = '#V' . $this->generateRandomIdentifier(10);
        $versement->state               = 'En cours';
        $versement->montant_octroye     = $client->montant_demande;

        $versement->debut               = now()->toDateTimeString();
        $versement->fin                 = DateLimitpaiement::generateLimitdate();
        $versement->commission_verse    = $client->commission_averse;

        $versement->status              = 'Non remboursé';
        $versement->client_id           = $request->client;
        $versement->created_by          = Auth::user()->getAuthIdentifier();

        $versement->save();

        $client->status_updated_or_not = 1;
        $client->save();

        activity("Deblocage de somme")
            ->causedBy(Auth::user())
            ->performedOn($versement)
            ->withProperties([
                'Client' => $versement->client_id,
                'Somme versé' => $versement->montant_octroye,
                'Commision versé' => $versement->commission_verse,
                'Créer par' => $versement->created_by,
            ])
            ->log("Montant demandé octroyé");

        return response()->json(['type' => 'success', 'message' => 'Opération effectuée avec succès !']);
    }

    //PAGE DE MODIFICATION DE COMMANDE
    public function modifyVersement($id)
    {
        // $versement = DB::table('versements')->where('id', $id)->first();
        $versements = DB::table('versements')
            ->join('clients', 'clients.id', '=', 'versements.client_id')
            ->join('users', 'users.id', '=', 'versements.created_by')
            ->select(
                'versements.id',
                'versements.identifier as identifiant_versement',
                'versements.commentaire',
                'versements.montant_octroye',
                'somme_verse',
                'reste_apaye',
                'state',
                'versements.status',
                'status_news_versement',
                'clients.name',
                'clients.lastname',
                'clients.numb_cli as numero_client',
                'clients.first_phone as numero_telephone1_client',
                'clients.second_phone as numero_telephone2_client',
                'users.avatar',
                DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name_user"),
                DB::raw("CONCAT(clients.name,' ',clients.lastname) as full_name_client"),
                db::raw("date_format(versements.created_at,'%d/%m/%Y %H:%i') as created_at")
            )->where('versements.id', $id)->get();

        $versement = DB::table('versements')
            ->join('clients', 'clients.id', '=', 'versements.client_id')
            ->join('users', 'users.id', '=', 'versements.created_by')
            ->select(
                'versements.id',
                'versements.identifier as identifiant_versement',
                'versements.commentaire',
                'versements.montant_octroye',
                'somme_verse',
                'reste_apaye',
                'state',
                'versements.status_news_versement',
                'versements.status as status',
                'clients.name',
                'clients.lastname',
                'clients.numb_cli as numero_client',
                'clients.first_phone as numero_telephone1_client',
                'clients.second_phone as numero_telephone2_client',


                'users.avatar',
                DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name_user"),
                DB::raw("CONCAT(clients.name,' ',clients.lastname) as full_name_client"),
                db::raw("date_format(versements.created_at,'%d/%m/%Y %H:%i') as created_at")
            )->where('versements.id', $id)->first();

        // dd($versement);
        return view('versements.pages.versement', ['versement' => $versement, 'id' => $id, 'versements' => $versements]);
    }

    //APPEL MODAL PAGE POUR UN PREMIER VERSEMENT
    public function closeVersementPage($id)
    {
        $versement = Versement::find($id);

        $client = Client::find($versement->client_id);
        return view('versements.modals.closePage', [
            'versement' => $versement,
            'client' => $client
        ]);
    }


    //TERMINER UN PREMIER VERSEMENT
    public function closeVersementPageStore(Request $request, $id)
    {
        $versement = Versement::where('id', $id)->first();
        $validator = Validator::make($request->all(), [
            'somme_verse' => 'required|integer|min:1|max:' . $versement->montant_octroye . '',
            'commentaire' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        //etat du client avant versement
        $avant = [
            'Somme versé'           => $versement->somme_verse,
            'montant Octroyeé'      => $versement->montant_octroye,
            'Reste a paye'          => $versement->reste_apaye,
            'Etat'                  => $versement->sate,
            'Status'                => $versement->status,
            'Date de deblocage'     => $versement->debut,
            'Date limite de remboursement' => $versement->fin,
            'Commentaite'           => $versement->commentaire,
            'Créer par'             => $versement->created_by,

        ];

        $versement->somme_verse         = $request->somme_verse;
        $versement->reste_apaye         = ($versement->montant_octroye - $request->somme_verse);
        $versement->state               = 'Terminé';
        $versement->commentaire         = $request->commentaire;
        if ($versement->montant_octroye - $request->somme_verse == 0) {
            $versement->status = 'Remboursé';
        } elseif ($versement->montant_octroye - $request->somme_verse > 0) {
            $versement->status = 'Remboursement partiel';
        }
        $versement->save();

        $client = Client::where('id', $versement->client_id)->first();
        if ($versement->montant_octroye > $request->somme_verse) {
            $client->amount_credit = ($client->amount_credit + $versement->reste_apaye);
        }

        $client->status_versement = $versement->status;
        $client->save();

        activity("Remboursement d'un pret")
            ->causedBy(Auth::user())
            ->performedOn($versement)
            ->withProperties([
                'Avant' => $avant,
                'Nouveau' => [
                    'Somme versé'           => $versement->somme_verse,
                    'montant Octroyeé'      => $versement->montant_octroye,
                    'Reste a paye'          => $versement->reste_apaye,
                    'Etat'                  => $versement->sate,
                    'Status'                => $versement->status,
                    'Date de deblocage'     => $versement->debut,
                    'Date limite de remboursement' => $versement->fin,
                    'Commentaite'           => $versement->commentaire,
                    'Créer par'             => $versement->created_by,
                ]
            ])
            ->log("Somme versé");

        return response()->json(['type' => 'success', 'message' => 'Remboursement terminé avec succès !']);
    }


    //
    public function modifyVersementModifierMontant($id)
    {
        $versements = Client::join('versements', 'versements.client_id', '=', 'clients.id')
            ->select(
                'clients.id',
                'clients.name',
                'clients.lastname',
                'clients.numb_cli',
                'clients.first_phone'
            )->get();
        return view('versements.modals.modifierMontant', ['versements' => $versements, 'id' => $id]);
    }


    //pop up de modification de montant octroye
    public function modifyVersementModifierMontantStore(Request $request, $id)
    {
        $versement = Versement::find($id);
        $validator = Validator::make($request->all(), [
            'montant_octroye' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        //etat du client avant versement
        $avant = [
            'Somme versé'           => $versement->somme_verse,
            'montant Octroyeé'      => $versement->montant_octroye,
            'Reste a paye'          => $versement->reste_apaye,
            'Etat'                  => $versement->sate,
            'Status'                => $versement->status,
            'Date de deblocage'     => $versement->debut,
            'Date limite de remboursement' => $versement->fin,
            'Commentaite'           => $versement->commentaire,
            'Créer par'             => $versement->created_by,

        ];

        $versement->montant_octroye = $request->montant_octroye;
        $versement->status_news_versement               = 'Renouvelé';
        $versement->save();


        // $client = Client::where('id', $versement->client_id)->first();
        // if ($versement->montant_octroye) {
        //     $client->amount_credit = ($client->amount_credit + 0);
        // }
        // $client->save();


        //Modification montant octroye lors du renouvelement
        $client = Client::where('id', $versement->client_id)->first();
        $client->montant_demande = $versement->montant_octroye;
        $client->commission_averse  = $versement->montant_octroye * 14 / 100;
        $client->save();

        activity("Renouvelement d'un pret")
            ->causedBy(Auth::user())
            ->performedOn($versement)
            ->withProperties([
                'Avant' => $avant,
                'Nouveau' => [
                    'Somme versé'           => $versement->somme_verse,
                    'montant Octroyeé'      => $versement->montant_octroye,
                    'Reste a paye'          => $versement->reste_apaye,
                    'Etat'                  => $versement->sate,
                    'Status'                => $versement->status,
                    'Date de deblocage'     => $versement->debut,
                    'Date limite de remboursement' => $versement->fin,
                    'Commentaite'           => $versement->commentaire,
                    'Créer par'             => $versement->created_by,
                ]
            ])
            ->log("Somme modifier ou renouvelé");


        return response()->json(['type' => 'success', 'message' => 'Montant modifié avec succès !']);
    }

    //ANNULER UN VERSEMENT
    public function versementCancel($id)
    {
        $versement = Versement::where('id', $id)->first();
        if ($versement) {
            $versement->state = 'Annulé';
            $versement->save();
            activity("Audit")
                ->causedBy(Auth::user())
                ->performedOn($versement)
                ->withProperties([
                    'versement annulée' => $versement,
                ])
                ->log("Annulation d'un versement");
            return response()->json(['type' => 'success', 'message' => 'versement annulée avec success !']);
        } else {
            return response()->json(['type' => 'error', 'message' => 'Une erreur est survenue !']);
        }
    }

    //SUPPRIMER UN VERSEMENT
    public function versementDelete($id)
    {
        $versement = Versement::where('id', $id)->first();
        $log = [
            'Versement' => $versement
        ];
        if ($versement) {
            $versement->delete();
            activity("Sécurité")
                ->causedBy(Auth::user())
                ->performedOn($versement)
                ->withProperties([
                    'Versement suprimé' => $log,
                ])
                ->log("Suppression d'un Deblocage");
            return response()->json(['type' => 'success', 'message' => 'Versement suprimée avec success !']);
        } else {
            return response()->json(['type' => 'error', 'message' => 'Une erreur est survenue !']);
        }
    }


    //REGLER LA SOMME RESTANTE
    public function versementAmountRule($id)
    {
        $versement = DB::table('versements')->where('id', $id)->first();
        if ($versement) {
            $client = Client::where('id', $versement->client_id)->first();

            $user = User::where('id', $versement->created_by)->first();
            return view('versements.modals.ruleAmount', [
                'versement' => $versement, 'client' => $client, 'user' => $user,
            ]);
        } else {
            return response()->json(['type' => 'error', 'message' => 'Une erreur est survenue !']);
        }
    }

    //FONCTION DENREGISTREMENT DE SOMME RESTANTE
    public function versementAmountRuleStore(Request $request, $id)
    {
        $versement = Versement::where('id', $id)->first();
        if ($versement) {
            $validator = Validator::make($request->all(), [
                'somme_verse' => 'required|integer|min:1|max:' . $versement->reste_apaye . ''
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 500);
            }

            $versement->somme_verse            = $versement->somme_verse + $request->somme_verse;
            if ($versement->reste_apaye - $request->somme_verse == 0) {
                $versement->status             = 'Remboursé';
            }
            $versement->reste_apaye            = $versement->reste_apaye - $request->somme_verse;
            $versement->save();

            $client                            = Client::where('id', $versement->client_id)->first();
            $client->amount_credit             = $client->amount_credit - $request->somme_verse;
            $client->status_versement          = $versement->status;
            $client->save();

            activity("Audit")
                ->causedBy(Auth::user())
                ->performedOn($versement)
                ->withProperties([
                    'Versement à regler' => $versement,
                ])
                ->log("Regler somme restante'.");

            return response()->json(['type' => 'success', 'message' => 'Somme restante reglée avec success !']);
        } else {
            return response()->json(['type' => 'error', 'message' => 'Une erreur est survenue !']);
        }
    }

    //GENERER UN MATRICULE POUR LES VERSEMENT
    function generateRandomIdentifier($chars)
    {
        $data = '1234567890';
        return substr(str_shuffle($data), 0, $chars);
    }


    public function viewReportVersement(Request $req)
    {
        $method = $req->method();

        if ($req->isMethod('post')) {

            $startDate = $req->input('startDate');
            $endDate = $req->input('endDate');

            // export PDF des versements inscrits
            if ($req->has('exportDebPDF')) {
                // $PDFReportVersement = Versement::whereBetween('created_at', [$startDate, $endDate])->get();
                $PDFReportVersement = Versement::whereDate('created_at', DB::raw('CURDATE()'))->where('state', 'En cours')->get();
                // dd($PDFReportVersement);
                $user = Auth::user();
                $configurations = Configuration::first();

                $pdf = PDF::loadView(
                    'versements.PDF_report_Versement',
                    [
                        'PDFReportVersement' => $PDFReportVersement,
                        'user' => $user,
                        'configurations' => $configurations, 'startDate' => $startDate, 'endDate' => $endDate
                    ]
                )->setPaper('a4', 'portrait');
                return $pdf->download('PDF-report-Versement.pdf');
            }
        } else {
            $user = Auth::user();
            $configurations = Configuration::first();

            //select all
            $ViewsPage = Versement::all();
            return view('versements.importVersement', ['ViewsPage' => $ViewsPage], ['user' => $user,]);
        }
    }
}
