<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VersementController extends Controller
{
    public function datatables()
    {
        $versements = Versement::with('user')->get();
        return datatables()->of($versements)
            ->addColumn('action', function ($versements) {
                return view('versements.create', ['versements' => $versements]);
            })->toJson();
    }

    public function index()
    {
        $versements = Versement::with('user')->get();
        $users = User::all()->pluck('id', 'firstname', 'lastname')->toArray();
        return view('versements.create', compact('users', 'versements'));
    }

    public function create()
    {
        return view('versements.create');
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

        $versement = new Versement();
        // $versement->numb_cli       = ClientService::generateNumbclient();
        $versement->nom = $request->nom;
        $versement->prenom = $request->prenom;
        $versement->first_phone = $request->first_phone;
        $versement->second_phone = $request->second_phone;
        $versement->date_naiss = $request->date_naiss;
        $versement->numb_cnib = $request->numb_cnib;


        $versement->genre = $request->genre;
        $versement->status = $request->status;
        $versement->user_id = $request->user;
        // $versement->created_by = Auth::id();
        // $versement->updated_by = Auth::id();

        $versement->save();


        return response()->json(['type' => 'success', 'message' => "Le Versement a été créée avec succès"]);
    }
}
