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
            'montant_versement' => 'required|num',
            'prenom' => 'required',
        ]);



        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }



        $eleve = new Versement();
        $eleve->first_name      = $request->nom;
        $eleve->last_name       = $request->prenom;
        $eleve->full_name       = $request->full_name;
        $eleve->day_of_birth    = $request->day_of_birth;
        $eleve->email           = $request->email;
        $eleve->phone           = $request->phone;
        $eleve->admission_date = $request->admission_date;
        $eleve->school_precedent = $request->school_precedent;
        $eleve->photo = $request->photo;
        $eleve->created_by = Auth::id();
        $eleve->save();

        activity("Création d\'une école")
            ->causedBy(Auth::user())
            ->performedOn($eleve)
            ->withProperties([
                'Titre de L\'école'  => $eleve->first_name,
            ])
            ->log("Création de L\'école " . $eleve->first_name);


        return response()->json(['type' => 'success', 'message' => "L\'école a été créée avec succès"]);
    }
}