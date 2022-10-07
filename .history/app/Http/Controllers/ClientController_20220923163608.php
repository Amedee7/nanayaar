<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Services\NumbService;
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
        $client->montant      = $request->numero_cnib;
        $client->date_naiss      = $request->date_naissance;
        $client->genre          = $request->genre;
        $client->status         = $request->status;
        $client->user_id        = $request->user;
        $client->created_by = Auth::id();
        $client->updated_by = Auth::id();

        $client->save();


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
}