<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Versement;
use Illuminate\Http\Request;
use App\Services\ClientService;
use Illuminate\Support\Facades\Validator;

class VersementController extends Controller
{
    public function datatables()
    {
        $versements = Versement::with('user')->get();
        return datatables()->of($versements)
            ->addColumn('action', function ($versements) {
                return view('versements.actions', ['versements' => $versements]);
            })->toJson();
    }

    public function index()
    {
        $versements = Versement::with('user')->get();
        $users = User::all()->pluck('id', 'firstname', 'lastname')->toArray();
        return view('versements.index', compact('users', 'versements'));
    }

    public function create()
    {
        return view('versements.create', ['lastClient' => CLientService::generateNumbclient()]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numb_cli'      => 'required',
            'nom'           => 'required|max:150',
            'prenom'        => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $versement = new Versement();
        $versement->numb_cli       = ClientService::generateNumbclient();
        $versement->nom = $request->nom;
        $versement->prenom = $request->prenom;
        $versement->first_phone = $request->first_phone;
        $versement->second_phone = $request->second_phone;


        $versement->genre = $request->genre;
        $versement->status = $request->status;
        $versement->user_id = $request->user;
        // $versement->created_by = Auth::id();
        // $versement->updated_by = Auth::id();

        $versement->save();


        return response()->json(['type' => 'success', 'message' => "Le Versement a été créée avec succès"]);
    }
}
