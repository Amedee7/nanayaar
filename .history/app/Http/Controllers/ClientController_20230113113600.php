<?php

namespace App\Http\Controllers;

// use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use App\Models\Versement;
use Illuminate\Http\Request;
use App\Models\Configuration;

use App\Exports\ClientsExport;
use App\Services\NumberService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{

    public function datatables(Request $request)
    {
        $clients = DB::table('clients')
            ->join('users', 'users.id', '=', 'clients.user_id')
            ->select(
                'id',
                'name',
                'lastname',
                'numb_cli',
                'created_at',
                'updated_at',
                'first_phone',
                'users.firstname',
                'users.lastname',
                'users.email',
                'users.avatar',

                DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name"),
                DB::raw("CONCAT(name,' ',lastname) as full_name_client"),

                DB::raw("date_format(clients.created_at,'%d/%m/%Y à %H:%i') as created_at"),
                DB::raw("date_format(clients.updated_at,'%d/%m/%Y à %H:%i') as updated_at")

            )->where('clients.deleted_at', NULL)->orderBy('id', 'desc');


        if ($request->has('trashed')) {
            $clients = Client::onlyTrashed('user')->orderBy('id', 'desc');
        } else {
            $clients = Client::with('user')->orderBy('id', 'desc');
        }
        return datatables()->of($clients)
            ->addColumn('action', function ($clients) {
                return view('clients.actions', ['clients' => $clients]);
            })->toJson();
    }

    public function index(Request $request)
    {
        $clientAttente = DB::table('clients')->where('status', 'Attente')->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 'Accepté')->where('clients.deleted_at', null)->count();
        $clientRejeté  = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();

        if ($request->has('trashed')) {
            $clients = Client::onlyTrashed()->orderBy('id', 'desc')->paginate('10');
        } else {
            $clients = Client::with('user')->orderBy('id', 'desc')->paginate('10');
        }

        return view(
            'clients.index',
            ['clients' => $clients],
            [
                'clientAttente' => $clientAttente,
                'clientAccepté' => $clientAccepté,
                'clientRejeté'  => $clientRejeté
            ]
        );
    }

    public function exportClients()
    {
        return Excel::download(new ClientsExport, 'clients.xlsx');
    }

    //RECUPERATION D'UN CLIENT
    public function detailClient(Client $client)
    {
        return view('clients.pages.details', ['client' => $client]);
    }

    //CREATION DU CLIENT
    public function create()
    {
        $versements = Versement::all();
        $clientAttente = DB::table('clients')->where('status', 'Attente')->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 'Accepté')->where('clients.deleted_at', null)->count();
        $clientRejeté = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();
        return view('clients.create', [
            'lastClient' => NumberService::generateNumber(),
            'users' => User::all(),
            'clientAttente'         => $clientAttente,
            'clientAccepté'         => $clientAccepté,
            'clientRejeté'          => $clientRejeté,
            'versements'            => $versements,
        ]);
    }

    //ENREGISTREMENT DU CLIENT
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'numero_client'         => 'required|unique:clients,numb_cli,NULL,id,deleted_at,NULL'
            'nom'                   => 'required|max:150',
            'prenom'                => 'required|max:150',
            'montant_demande'       => 'required|integer|min:10000|max:200000',
            'numero_1'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'numero_2'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'adresse'               => 'required',
            'numero_cnib'           => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $client = new Client();
        $client->numb_cli           = NumberService::generateNumber();
        $client->name               = $request->nom;
        $client->lastname           = $request->prenom;
        $client->first_phone        = $request->numero_1;
        $client->second_phone       = $request->numero_2;
        $client->date_naiss         = $request->date_naiss;
        $client->numb_cnib          = $request->numero_cnib;
        $client->date_naiss         = $request->date_naiss;
        $client->adresse            = $request->adresse;
        $client->montant_demande    = $request->montant_demande;
        $client->commission_averse  = $request->montant_demande * 14 / 100;
        $client->date_naiss         = $request->date_naissance;
        $client->genre              = $request->genre;
        // $client->status             = $request->status;
        // $client->photo              = $request->photo;
        $client->user_id            = $request->utilisateur;

        $client->created_by         = Auth::id();
        $client->deleted_by;
        $client->updated_by;
        $client->save();

        activity("Création du client")
            ->causedBy(Auth::user())
            ->performedOn($client)
            ->withProperties([
                'Nom du client'  => $client->name,
                'Prenom du client'  => $client->lastname,
                'Tel 1'  => $client->first_phone,
                'Tel 2'  => $client->second_phone,
                'Montant demande'  => $client->montant_demande,
                'Commission versé'  => $client->commission_averse,
                'Status'  => $client->status,
                'Status du versement'  => $client->status_versement,
                'Creer le'  => $client->created_at,
                'Creer par'  => $client->created_by,

            ])
            ->log("Création du client "  . $client->name . ' ' . $client->lastname . ' :' . $client->numb_cli);

        return response()->json(['type' => 'success', 'message' => "Le Client a été créée avec succès"]);
    }

    //EDITION DU CLIENT
    public function edit($id)
    {
        $client = Client::find($id);
        if ($client) {
            $users = User::get();
            return view('clients.modals.update', ['client' => $client], ['users' => $users]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }

    //MAJ DUN CLIENT
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom'                => 'required|max:150',
            'montant_demande'       => 'required|numeric|digits_between:1,12',
            'numero_1'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'numero_2'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'adresse'               => 'required',
            'numero_cnib'           => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $avant = [
            'Nom du client'  => $client->name,
            'Prenom du client'  => $client->lastname,
            'Tel 1'  => $client->first_phone,
            'Tel 2'  => $client->second_phone,
            'Montant demande'  => $client->montant_demande,
            'Commission versé'  => $client->commission_averse,
            'Status'  => $client->status,
            'Status du versement'  => $client->status_versement,
            'Creer le'  => $client->created_at,
            'Creer par'  => $client->created_by,
        ];

        if ($client) {
            $client->numb_cli           = $request->numb_cli;
            $client->name               = $request->nom;
            $client->lastname           = $request->prenom;
            $client->first_phone        = $request->numero_1;
            $client->second_phone       = $request->numero_2;
            $client->date_naiss         = $request->date_naiss;
            $client->numb_cnib          = $request->numero_cnib;
            $client->date_naiss         = $request->date_naiss;
            $client->adresse            = $request->adresse;
            $client->montant_demande    = $request->montant_demande;
            $client->commission_averse  = $request->montant_demande * 14 / 100;
            $client->date_naiss         = $request->date_naissance;
            $client->genre              = $request->genre;
            // $client->status             = $request->status;
            // $client->photo              = $request->photo;
            $client->user_id            = $request->utilisateur;

            $client->created_by;
            $client->deleted_by;
            $client->updated_by = Auth::id();
            $client->save();

            activity("Modification d'un client")
                ->causedBy(Auth::user())
                ->performedOn($client)
                ->withProperties([
                    'Avant' => $avant,
                    'Nouveau' => [
                        'Nom du client'  => $client->name,
                        'Prenom du client'  => $client->lastname,
                        'Tel 1'  => $client->first_phone,
                        'Tel 2'  => $client->second_phone,
                        'Montant demande'  => $client->montant_demande,
                        'Commission versé'  => $client->commission_averse,
                        'Status'  => $client->status,
                        'Status du versement'  => $client->status_versement,
                        'Creer le'  => $client->created_at,
                        'Creer par'  => $client->created_by,
                    ]
                ])
                ->log("Modification du client "  . $client->name . ' ' . $client->lastname . ' :' . $client->numb_cli);

            return response()->json(['type' => 'success', 'message' => "Le c a été modifié avec succès !"]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clientAcceptes(Request $request)
    {
        if ($request->has('trashed')) {
            $clients = Client::onlyTrashed()
                ->get();
        } else {
            $clients = Client::with('user')->get();
        }

        return view('clients.clientAcceptes', compact('clients'));
    }

    /**
     * soft delete post
     *
     * @return void
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $log = ['Client' => $client];
        if ($client) {
            $client->delete();
            activity("Sécurité")
                ->causedBy(Auth::user())
                ->performedOn($client)
                ->withProperties([
                    'Client' => $log
                ])
                ->log("Suppression d'un client: $client->numb_cli");
            return response()->json(['type' => 'success', 'message' => "Ce client a été supprimée avec succès !"]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue lors de la suppression !"]);
        }
    }

    /**
     * restore specific post
     *
     * @return void
     */
    public function restore($id)
    {
        Client::withTrashed()->find($id)->restore();

        return redirect()->back();
    }

    /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        Client::onlyTrashed()->restore();

        return redirect()->route('clients.index');
    }

    public function montantChangeStore(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'new_montant'       => 'required|integer|min:1|digits_between:1,12',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $client = Client::where('id', $id)->first();
        $client->new_montant = $request->montant_demande;
        $client->save();

        activity("Nouveau montant")
            ->causedBy(Auth::user())
            ->performedOn($client)
            ->withProperties([
                'Nouveau montant'  => $client->new_montant,
                'Creer le'  => $client->created_at,
                'Creer par'  => $client->created_by,
            ])
            ->log("Nouveau montant du client "  . $client->name . ' ' . $client->lastname . ' :' . $client->numb_cli);

        return response()->json(['type' => 'success', 'message' => 'Montant changé avec succès !']);
    }

    public function myMontant()
    {
        $client = Client::all();
        if ($client) {
            return view('clients.montant', ['client' => $client]);
        } else {
            return response()->json(['type' => 'error', 'message' => 'Une erreur est survenue !']);
        }
    }

    public function updateStatus(Request $request)
    {
        $status = Client::findOrFail($request->id);
        $status->status = $request->status;
        $status->save();

        return response()->json(['message' => 'status updated successfully.']);
    }

    //CHANGER DE STATUS
    public function statusAccepte($id)
    {
        $client = Client::where('id', $id)->first();
        $avant = [
            'status' => $client->status,
            'Nom' => $client->name,
            'Prenom'  => $client->lastname,
            'Numero du client'     => $client->numb_cli,

        ];

        if ($client) {
            $client->status = 'Accepté';
            $client->save();

            activity("Changement de statut d'un compte")
                ->causedBy(Auth::user())
                ->performedOn($client)
                ->withProperties([
                    "Avant" => $avant,

                    "Nouveau" => [
                        'Nom' => $client->name,
                        'Prenom'  => $client->lastname,
                        'Numero du client'     => $client->numb_cli,
                        'Statut' => $client->status
                    ]
                ])
                ->log("Changement de statut de compte " . $client->name . ' ' . $client->lastname . ' ' . 'en' . ' ' . $client->status);

            return response()->json(['type' => 'success', 'message' => 'Client accepté avec success !']);
        } else {
            return response()->json(['type' => 'error', 'message' => 'Une erreur est survenue !']);
        }
    }

    //CHANGER DE STATUS
    public function statusRejete($id)
    {
        $client = Client::where('id', $id)->first();

        $avant = [
            'status' => $client->status,
            'Nom' => $client->name,
            'Prenom'  => $client->lastname,
            'Numero du client'     => $client->numb_cli,
        ];

        if ($client) {
            $client->status = 'Rejeté';
            $client->save();

            activity("Changement de statut d'un compte")
                ->causedBy(Auth::user())
                ->performedOn($client)
                ->withProperties([
                    "Avant" => $avant,

                    "Nouveau" => [
                        'Nom' => $client->name,
                        'Prenom'  => $client->lastname,
                        'Numero du client'     => $client->numb_cli,
                        'Statut' => $client->status
                    ]
                ])
                ->log("Changement de statut de compte " . $client->name . ' ' . $client->lastname . ' ' . 'en' . ' ' . $client->status);
            return response()->json(['type' => 'success', 'message' => 'Client rejeté avec success !']);
        } else {
            return response()->json(['type' => 'error', 'message' => 'Une erreur est survenue !']);
        }
    }

    public function generateReport()
    {
        // $clients = Client::where('status', 'Attente')->get();
        // $clients = DB::table('clients')
        // ->where('status', 'Attente')
        // ->get();
        $clients = Client::whereDate('created_at', DB::raw('CURDATE()'))->where('status', 'Attente')->get();

        $clientsState = [];
        foreach ($clients as $item) {
            $tmp = [
                'id' => $item->id,
                'numb_cli' => $item->numb_cli,
                'name' => $item->name,
                'lastname' => $item->lastname,
                'first_phone' => $item->first_phone,
                'second_phone' => $item->second_phone,
                'status' => $item->status,
                'commission_averse' => $item->commission_averse,
                'montant_demande' => $item->montant_demande,
                'amount_credit' => $item->amount_credit,

            ];

            $clientsState[] = $tmp;
        }
        // dd($clientsState);
        $clientAttente = DB::table('clients')->where('status', 'Attente')->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 'Accepté')->where('clients.deleted_at', null)->count();
        $clientRejeté = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();

        $creditTotal = Versement::sum('somme_verse');

        $configurations = Configuration::first();

        $user = Auth::user();
        $pdf = Pdf::loadView('clients.statePdf', [
            'configurations' => $configurations,
            'creditTotal' => $creditTotal,
            'user' => $user,
            'clientsState' => $clientsState,
            'clientAttente' => $clientAttente,
            'clientAccepté' => $clientAccepté,
            'clientRejeté' => $clientRejeté
        ]);

        return $pdf->download('rapports.pdf');
    }

    public function viewReport(Request $req)
    {
        $method = $req->method();

        if ($req->isMethod('post')) {

            $startDate = $req->input('startDate');
            $endDate = $req->input('endDate');


            // $from = $req->input('from');
            // $to   = $req->input('to');
            if ($req->has('records')) {
                // select search
                // $search = Client::whereBetween('created_at', [$from, $to])->get();
                $records = DB::table('clients')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->get();
                return view('clients.import', ['records' => $records, 'startDate' => $startDate, 'endDate' => $endDate]);
            }

            // export PDF des clients inscrits
            if ($req->has('exportPDF')) {
                // $PDFReport = Client::whereBetween('created_at', [$startDate, $endDate])->get();
                // $PDFReport = Client::whereDate('created_at', DB::raw('CURDATE()'))->where('status', 'Attente')->get();
                $PDFReport = Client::where('status', 'Accepté')->whereBetween('created_at', [$startDate, $endDate])->get();
                // dd($PDFReport);
                $user = Auth::user();
                $configurations = Configuration::first();

                $pdf = PDF::loadView(
                    'clients.PDF_report',
                    [
                        'PDFReport' => $PDFReport,
                        'user' => $user,
                        'configurations' => $configurations, 'startDate' => $startDate, 'endDate' => $endDate
                    ]
                )->setPaper('a4', 'portrait');
                return $pdf->download('PDF-report.pdf');
            }

            // export PDF des clients accepted
            if ($req->has('exportClientAcPDF')) {
                $PDFReport = Client::where('status', 'Accepté')->whereBetween('created_at', [$startDate, $endDate])->get();
                // dd($PDFReport);

                $user = Auth::user();
                $configurations = Configuration::first();

                $pdf = PDF::loadView('clients.PDF_report', [
                    'PDFReport' => $PDFReport,
                    'user' => $user,
                    'configurations' => $configurations, 'startDate' => $startDate, 'endDate' => $endDate
                ])->setPaper('a4', 'portrait');
                return $pdf->download('PDF-report.pdf');
            }

            // export PDF des clients en attente
            if ($req->has('exportClientAttPDF')) {
                $PDFReport = Client::where('status', 'Attente')->whereBetween('created_at', [$startDate, $endDate])->get();
                $user = Auth::user();
                $configurations = Configuration::first();

                $pdf = PDF::loadView('clients.PDF_report', [
                    'PDFReport' => $PDFReport,
                    'user' => $user,
                    'configurations' => $configurations, 'startDate' => $startDate, 'endDate' => $endDate
                ])->setPaper('a4', 'portrait');
                return $pdf->download('PDF-report.pdf');
            }

            // export PDF des clients rejetés
            if ($req->has('exportClientRej')) {
                // $PDFReport = DB::select("SELECT * FROM clients BETWEEN '$from' AND '$to'");
                $PDFReport = Client::where('status', 'Rejeté')->whereBetween('created_at', [$startDate, $endDate])->get();
                $user = Auth::user();
                $configurations = Configuration::first();

                $pdf = PDF::loadView('clients.PDF_report', [
                    'PDFReport' => $PDFReport,
                    'user' => $user,
                    'configurations' => $configurations, 'startDate' => $startDate, 'endDate' => $endDate
                ])->setPaper('a4', 'portrait');
                return $pdf->download('PDF-report.pdf');
            }
        } else {
            $user = Auth::user();
            $configurations = Configuration::first();

            //select all
            $ViewsPage = Client::all();
            return view('clients.import', ['ViewsPage' => $ViewsPage], ['user' => $user,]);
        }
    }

    public function records(Request $request)
    {
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $clients = Client::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $clients = Client::latest()->get();
                }
            } else {
                $clients = Client::latest()->get();
            }

            return response()->json([
                'clients' => $clients
            ]);
        } else {
            abort(403);
        }
    }
}
