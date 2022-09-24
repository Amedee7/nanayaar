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

        $pret = new Versement();
        $pret->montant_versement                = $request->montant_versement;
        $pret->client_id                        = $request->numero_client;
        $pret->created_by = Auth::id();
        $pret->deleted_by;
        $pret->updated_by;

        $pret->save();

        activity("Effectuation d\'un versement")
            ->causedBy(Auth::user())
            ->performedOn($pret)
            ->withProperties([
                'Nom du pret'  => $pret->nom,
            ])
            ->log("Création du pret " . $pret->nom);

        return response()->json(['type' => 'success', 'message' => "Le Pret a été créée avec succès"]);
    }

}
