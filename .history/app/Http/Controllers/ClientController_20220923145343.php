<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Services\ClientnumbService;
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
        return view('clients.create', compact('users', 'clients'));
    }

    public function create()
    {
        $users = User::all();
        return view('clients.create', ['lastClient' => NumbService::generateNumbclient(), 'users']);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

        $client = new Client();
        $client->numb_cli       = NumbService::generateNumbclient();
        $client->nom            = $request->nom;
        $client->prenom         = $request->prenom;
        $client->first_phone    = $request->first_phone;
        $client->second_phone   = $request->second_phone;
        $client->date_naiss     = $request->date_naiss;
        $client->numb_cnib      = $request->numb_cnib;
        $client->genre          = $request->genre;
        $client->status         = $request->status;
        $client->user_id        = $request->user;
        // $client->created_by = Auth::id();
        // $client->updated_by = Auth::id();

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
