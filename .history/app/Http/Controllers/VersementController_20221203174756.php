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

    //TERMINER LA COMMANDE
    public function closeOutStockPageStore(Request $request, $id){
        $outStock = Versement::where('id',$id)->first();
        $validator = Validator::make($request->all(), [
            'somme' => 'required|integer|min:1|max:'.$outStock->amount_total.'',
            'commentaire' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 500);
        }

        $outStock->amount_payed = $request->somme;
        $outStock->amount_rule = ($outStock->amount_total-$request->somme);
        $outStock->state = 'Terminé';
        $outStock->comment = $request->commentaire;
        if ($outStock->amount_total-$request->somme == 0){
            $outStock->status = 'Payé';
        }elseif ($outStock->amount_total-$request->somme > 0){
            $outStock->status = 'Paiement partiel';
        }
        $outStock->save();

        $customer = Client::where('id', $outStock->customer_id)->first();
        if ($outStock->amount_total > $request->somme){
            $customer->amount_credit = ($customer->amount_credit+$outStock->amount_rule);
        }
        $customer->save();

        return response()->json(['type'=>'success', 'message'=>'Commande terminé avec succès !']);
    }
}
