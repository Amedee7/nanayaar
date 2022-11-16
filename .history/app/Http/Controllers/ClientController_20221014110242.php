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
                return view('clients.actions', ['clients' => $clients]);
            })->toJson();
    }

    public function index()
    {
        $clients = Client::get();
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
            'nom'                   => 'required|max:150',
            'prenom'                => 'required|max:150',
            'montant_demande'       => 'required|numeric|digits_between:1,12',
            'numero_1'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'numero_2'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
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
        $client->montant_demande    = $request->montant_demande;
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
            ])
            ->log("Création du client " . $client->name);

        return response()->json(['type' => 'success', 'message' => "Le Client a été créée avec succès"]);
    }

    public function edit($id)
    {
        $client = Client::find($id);
        if ($client) {
            return view('clients.modals.update', ['client' => $client]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }

    public function destroy($id){
        $client = Client::find($id);
        if($client){
            $client->delete();
            return response()->json(['type' => 'success', 'message' => "La client a été supprimée avec succès !"]);
        }else{
            return response()->json(['type' => 'error', 'message' => "Une erreur s'est produite !"]);
        }
    }


    public function update(Request $request, Client $client)
    {
        $validator = Validator::make($request->all(), [
            'nom'                   => 'required|max:150',
            'prenom'                => 'required|max:150',
            'montant_demande'       => 'required|numeric|digits_between:1,12',
            'numero_1'              => 'required|unique:users,telephone,' . $client->id . ',id,deleted_at,NULL',
            'numero_2'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'numero_cnib'           => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $previous = [
            'Nom' => $user->firstname,
            'Prenom'  => $user->lastname,
            'Adresse email'     => $user->email,
            'Telephone'    => $user->telephone,
            'Statut' => $user->status
        ];

        if ($user) {
            $client->numb_cli           = NumberService::generateNumber();
        $client->name               = $request->nom;
        $client->lastname           = $request->prenom;
        $client->first_phone        = $request->numero_1;
        $client->second_phone       = $request->numero_2;
        $client->date_naiss         = $request->date_naiss;
        $client->numb_cnib          = $request->numero_cnib;
        $client->date_naiss         = $request->date_naiss;
        $client->montant_demande    = $request->montant_demande;
        $client->date_naiss         = $request->date_naissance;
        $client->genre              = $request->genre;
        // $client->status             = $request->status;
        // $client->photo              = $request->photo;
        $client->user_id            = $request->utilisateur;
            $client->save();

            activity("Modification d'un compte")
                ->causedBy(Auth::user())
                ->performedOn($client)
                ->withProperties([
                    'previous' => $previous,
                    'new' => [
                        'Nom' => $client->firstname,
                        'Prenom'  => $client->lastname,
                        'Adresse email'     => $client->email,
                        'Telephone'    => $client->telephone,
                        'Statut' => $client->status
                    ]
                ])
                ->log("Modification de compte utilisateur " . $client->firstname . ' ' . $client->lastname);

            return response()->json(['type' => 'success', 'message' => "L'utilisateur a été modifié avec succès !"]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }
}
