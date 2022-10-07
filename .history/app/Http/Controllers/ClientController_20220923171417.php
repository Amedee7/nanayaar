<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Services\NumberService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{

    public function datatables()
    {
        $clients = Client::with('user')->get();
        return datatables()->of($clients)
            ->addColumn('action', function ($clients) {
                return view('clients.create', ['clients' => $clients]);
            })->toJson();
    }

    public function index()
    {
        $clients = Client::with('user')->get();
        $users = User::all()->pluck('id', 'firstname', 'lastname')->toArray();
        return view('clients.index', compact('users', 'clients'));
    }

    public function create()
    {
        return view('clients.create', ['lastClient' => NumberService::generateNumber(), 'users' => User::all()]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'           => 'required|max:150',
            'prenom'        => 'required',
            'montant_demande'        => 'required',
            'numero_1'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'numero_2'  => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'date_naissance'    => 'required|date',
            'numero_cnib'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $client = new Client();
        $client->numb_cli       = NumberService::generateNumber();
        $client->nom            = $request->nom;
        $client->prenom         = $request->prenom;
        $client->first_phone    = $request->numero_1;
        $client->second_phone   = $request->numero_2;
        $client->date_naiss     = $request->date_naiss;
        $client->date_naiss     = $request->date_naiss;
        $client->montant_demande      = $request->montant_demande;
        $client->date_naiss      = $request->date_naissance;
        $client->genre          = $request->genre;
        $client->status         = $request->status;
        $client->photo = $request->photo;
        $client->user_id        = $request->user;
        $client->created_by = Auth::id();
        $client->updated_by = Auth::id();

        $client->save();

        activity("Création du client")
            ->causedBy(Auth::user())
            ->performedOn($client)
            ->withProperties([
                'Nom du client'  => $client->nom,
            ])
            ->log("Création du client " . $client->nom);

        return response()->json(['type' => 'success', 'message' => "Le Client a été créée avec succès"]);
    }
    [17:13:20] LOG.error: SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'status' cannot be null (SQL: insert into `clients` 
    (`numb_cli`, `nom`, `prenom`, `first_phone`, `second_phone`, `date_naiss`, `montant_demande`, `genre`, `status`, `photo`, `user_id`, `created_by`, 
    `updated_by`, `updated_at`, `created_at`) values (2022-1, Officia modi anim qu, Consequatur eum plac, +1 (457) 462-4456, +1 (916) 837-2179, 2011-08-25, 31, Féminin, ?, ?, ?, 2, 2, 2022-09-23 17:13:20, 2022-09-23 17:13:20)) 
    {"userId":2,"exception":{"errorInfo":["23000",1048,"Column 'status' cannot be null"]}}

    public function edit($id)
    {
        $client = Client::find($id);
        if ($client) {
            return view('clients.modals.update', ['client' => $client]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }
}
