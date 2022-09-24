<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use App\Models\Versement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VersementController extends Controller
{
    public function datatables()
    {
        $versements = Versement::all();
        return datatables()->of($versements)
            ->addColumn('action', function ($versements) {
                return view('versements.actions', ['versements' => $versements]);
            })->toJson();
    }

    public function index()
    {
        $versements = Versement::with('user')->get();
        $clients = Client::all()->pluck('id', 'firstname', 'lastname')->toArray();
        return view('versements.index', compact('clients', 'versements'));
    }


    public function create()
    {
        $clients = Client::all();
        return view('versements.create', compact('clients'));
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
        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $verse = new Versement();
        $verse->montant_versement                = $request->montant_versement;
        $verse->client_id                        = $request->numero_client;
        $verse->created_by = Auth::id();
        $verse->deleted_by;
        $verse->updated_by;

        $verse->save();

        activity("Effectuation d\'un versement")
            ->causedBy(Auth::user())
            ->performedOn($verse)
            ->withProperties([
                'Nom du pret'  => $verse->nom,
            ])
            ->log("Création du pret " . $verse->nom);

        return response()->json(['type' => 'success', 'message' => "Le Versement a été effectuer avec succès"]);
    }

}
