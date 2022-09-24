<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * Class PretController
 * @package App\Http\Controllers
 */
class PretController extends Controller
{

    public function datatables(): \Illuminate\Http\JsonResponse
    {
        $prets = User::with('roles')->with('roles');
        return datatables()->of($prets)
            ->addColumn('action', function ($prets) {
                return view('prets.actions', ['prets' => $prets]);
            })->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        return view('prets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('prets.modals.create',  ['clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $client->nom            = $request->nom;
        $client->prenom         = $request->prenom;
        $client->first_phone    = $request->numero_1;
        $client->second_phone   = $request->numero_2;
        $client->date_naiss     = $request->date_naiss;
        $client->numb_cnib     = $request->numero_cnib;
        $client->date_naiss     = $request->date_naiss;
        $client->montant_demande      = $request->montant_demande;
        $client->date_naiss      = $request->date_naissance;
        $client->genre          = $request->genre;
        // $client->status         = $request->status;
        // $client->photo = $request->photo;
        $client->user_id        = $request->utilisateur;
        $client->created_by = Auth::id();
        $client->deleted_by = Auth::id();
        $client->updated_by = Auth::id();

        $client->save();

        activity("Création du client")
            ->causedBy(Auth::user())
            ->performedOn($client)
            ->withProperties([
                'Nom du client'  => $client->nom,
            ])
            ->log("Création du client " . $client->nom);

        return response()->json(['type' => 'success', 'message' => "L'utilisateur a été créé avec succès"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            $roles = Role::all();
            return view('prets.modals.show', ['user' => $user, 'roles' => $roles]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
