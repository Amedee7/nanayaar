<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VersementController extends Controller
{
    public function datatables()
    {
        $clients = Versement::with('user')->get();
        return datatables()->of($clients)
            ->addColumn('action', function ($clients) {
                return view('clients.create', ['clients' => $clients]);
            })->toJson();
    }

    public function index()
    {
        $clients = Versement::with('user')->get();
        $users = User::all()->pluck('id', 'firstname', 'lastname')->toArray();
        return view('clients.create', compact('users', 'clients'));
    }

    public function create()
    {
        return view('clients.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numb_cli'      => 'required',
            'nom'           => 'required|max:150',
            'prenom'        => 'required',
            'first_phone'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'second_phone'  => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'date_naiss'    => 'date',
            'numb_cnib'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $client = new Versement();
        // $client->numb_cli       = ClientService::generateNumbclient();
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->first_phone = $request->first_phone;
        $client->second_phone = $request->second_phone;
        $client->date_naiss = $request->date_naiss;
        $client->numb_cnib = $request->numb_cnib;


        $client->genre = $request->genre;
        $client->status = $request->status;
        $client->user_id = $request->user;
        // $client->created_by = Auth::id();
        // $client->updated_by = Auth::id();

        $client->save();


        return response()->json(['type' => 'success', 'message' => "Le Versement a été créée avec succès"]);
    }
}
