<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Versement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function index(Request $request)
    {
        $clientAttente = DB::table('clients')->where('status', 'Attente')->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 'Accepté')->where('clients.deleted_at', null)->count();
        $clientRejeté = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();


        $versements = Versement::with('user')->get();

        return view('versements.index', 
        ['versements' => $versements],
        ['clients' =>$clients],
        [
            'clientAttente' =>$clientAttente,
            'clientAccepté' =>$clientAccepté,
            'clientRejeté' =>$clientRejeté
        ]);
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

        $versement = new Versement();
        $versement->montant_versement                = $request->montant_versement;
        $versement->client_id                        = $request->numero_client;
        $versement->created_by = Auth::id();
        $versement->deleted_by;
        $versement->updated_by;

        $versement->save();

        activity("Effectuation d\'un versement")
            ->causedBy(Auth::user())
            ->performedOn($versement)
            ->withProperties([
                'Nom du pret'  => $versement->nom,
            ])
            ->log("Création du pret " . $versement->nom);

        return response()->json(['type' => 'success', 'message' => "Le Versement a été effectuer avec succès"]);
    }


    //IITIATION DU VERSEMENT STORE FUNCTIONS
    public function versementStore(Request $request){
        $validator = Validator::make($request->all(), [
            'client' => 'required|exists:clients,id'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 500);
        }

        $versement = New Versement();
        $versement->identifier = '#S'.$this->generateRandomIdentifier(10);
        $versement->state = 'En cours';
        $versement->status = 'Non payé';
        $versement->client_id = $request->client;
        $versement->created_by = Auth::user()->getAuthIdentifier();
        $versement->save();

        return response()->json(['type'=>'success', 'message'=>'Opération effectuée avec succès !']);

    }

    //TERMINER LA COMMANDE
    public function versementPageStore(Request $request, $id){
        $versement = Versement::where('id',$id)->first();
        $validator = Validator::make($request->all(), [
            'somme' => 'required|integer|min:1|max:'.$versement->montant_octroye.'',
            'commentaire' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 500);
        }

        $versement->somme_verse = $request->somme;
        $versement->reste_apaye = ($versement->montant_octroye-$request->somme);
        $versement->state = 'Terminé';
        $versement->commentaire = $request->commentaire;
        if ($versement->montant_octroye-$request->somme == 0){
            $versement->status = 'Payé';
        }elseif ($versement->montant_octroye-$request->somme > 0){
            $versement->status = 'Paiement partiel';
        }
        $versement->save();

        $client = Client::where('id', $versement->customer_id)->first();
        if ($versement->montant_octroye > $request->somme){
            $client->amount_credit = ($client->amount_credit+$versement->reste_apaye);
        }
        $client->save();

        return response()->json(['type'=>'success', 'message'=>'Commande terminé avec succès !']);
    }


    function generateRandomIdentifier($chars) {
        $data = '1234567890';
        return substr(str_shuffle($data), 0, $chars);
    }
}