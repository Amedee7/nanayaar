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

        $ver = new Versement();
        $ver->montant_versement                = $request->montant_versement;
        $ver->client_id                        = $request->numero_client;
        $ver->created_by = Auth::id();
        $ver->deleted_by;
        $ver->updated_by;

        $ver->save();

        activity("Effectuation d\'un versement")
            ->causedBy(Auth::user())
            ->performedOn($ver)
            ->withProperties([
                'Nom du pret'  => $ver->nom,
            ])
            ->log("Création du pret " . $ver->nom);

        return response()->json(['type' => 'success', 'message' => "Le Versement a été effectuer avec succès"]);
    }

}
