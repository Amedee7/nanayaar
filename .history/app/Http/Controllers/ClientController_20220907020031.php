<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;

class ClientController extends Controller
{

    public function datatables()
    {
        $clients = Client::all();
        return datatables()->of($clients)
            ->addColumn('action', function ($clients) {
                return view('clients.actions', ['eleves' => $clients]);
            })->toJson();
    }

    public function index()
    {
        return view('clients.index');
    }

    public function create()
    {
        return view('clients.modals.create');
    }


    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'numb_cli' => 'required',
                'nom' => "required|max:150",
                'prenom' => 'required',
                'first_phone' => 'required',
                'date_naiss' => 'date',
                'numb_cnib' => 'required',
                'genre' => 'required',

            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $client = new Client();
        $client->numb_cli = $request->numb_cli;
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->first_phone = $request->first_phone;
        $client->second_phone = $request->second_phone;
        $client->date_naiss = $request->date_naiss;
        $client->numb_cnib = $request->numb_cnib;
        $client->genre = $request->genre;
        $client->status = $request->status;
        $client->created_by = Auth::id();
        $client->updated_by = Auth::id();
        $client->user_id = Auth::id();

        $client->save();

        activity("Création d\'une année scolaire")
            ->causedBy(Auth::user())
            ->performedOn($client)
            ->withProperties([
                'Titre de L\'année scolaire'  => $client->numb_cli,
            ])
            ->log("Création de L\'année scolaire " . $client->numb_cli);


        return response()->json(['type' => 'success', 'message' => "L\'année scolaire a été créée avec succès"]);
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