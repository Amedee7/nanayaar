<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Versement;
use Illuminate\Http\Request;
use App\Services\NumberService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class ClientController extends Controller
{

    public function datatables()
    {
        $clients = Client::with('user', 'desc')->get();
        return datatables()->of($clients)
            ->addColumn('action', function ($clients) {
                return view('clients.actions', ['clients' => $clients]);
            })->toJson();
    }

    public function index(Request $request)
    {
        $clientAttente = DB::table('clients')->where('status', 'Attente')->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 'Accepté')->where('clients.deleted_at', null)->count();
        $clientRejeté = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();

        if ($request->has('trashed')) {
            $clients = Client::onlyTrashed()->orderBy('id', 'desc')->paginate('10');
        } else {
            $clients = Client::with('user')->orderBy('id', 'desc')->paginate('10');
        }


        return view('clients.index', 
        ['clients' => $clients],
        [
            'clientAttente' =>$clientAttente,
            'clientAccepté' =>$clientAccepté,
            'clientRejeté' =>$clientRejeté
        ]);
    }

    // public function clientAcceptes(){
    //     $clients = Client::with('user')->select("*")->withTrashed()->where('status', 'Accepté')->get();
    //     $deletecount=Client::withTrashed()->count();

    //     return view('clients.clientAcceptes', ['clients'=>$clients], ['deletecount'=>$deletecount]);
    // }


    //AFFICHAGES DES CLIENTS
    public function moderation_clients()
    {
        $users = User::all()->pluck('id', 'firstname', 'lastname')->toArray();

        $clients = Client::get();
        return view('clients.moderation_clients', compact('users', 'clients'));
    }

        // AFFICHAGE DES CLIENTS EN FONCTION DU STATUS
    // public function moderation_clients()
    // {
    //     $users = User::all()->pluck('id', 'firstname', 'lastname')->toArray();

    //     $clients = Client::select("*")
    //     ->where('status', 'Accepter')->get();

    //     return view('clients.moderation_clients', compact('users', 'clients'));
    // }

    //RECUPERATION D'UN CLIENT
    public function detailClient(Client $client)
    {
        return view('clients.pages.details', ['client' => $client]);
    }

    //CREATION DU CLIENT
    public function create()
    {
        return view('clients.create', ['lastClient' => NumberService::generateNumber(), 'users' => User::all()]);
    }

    //ENREGISTREMENT DU CLIENT
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'numero_client'         => 'required|unique:clients,numb_cli,NULL,id,deleted_at,NULL'
            'nom'                   => 'required|max:150',
            'prenom'                => 'required|max:150',
            'montant_demande'       => 'required|numeric|digits_between:1,12',
            'numero_1'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'numero_2'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'adresse'               =>'required',
            'numero_cnib'           => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $client = new Client();
        $client->numb_cli           = NumberService::generateNumber();
        $client->name               = $request->nom;
        $client->lastname           = $request->prenom;
        $client->first_phone        = $request->numero_1;
        $client->second_phone       = $request->numero_2;
        $client->date_naiss         = $request->date_naiss;
        $client->numb_cnib          = $request->numero_cnib;
        $client->date_naiss         = $request->date_naiss;
        $client->adresse            = $request->adresse;
        $client->montant_demande    = $request->montant_demande;
        $client->commission_averse  = $request->montant_demande * 14 / 100;
        $client->date_naiss         = $request->date_naissance;
        $client->genre              = $request->genre;
        // $client->status             = $request->status;
        // $client->photo              = $request->photo;
        $client->user_id            = $request->utilisateur;

        $client->created_by         = Auth::id();
        $client->deleted_by;
        $client->updated_by;
        $client->save();

        activity("Création du client")
            ->causedBy(Auth::user())
            ->performedOn($client)
            ->withProperties([
                'Nom du client'  => $client->name,
            ])
            ->log("Création du client " . $client->name);

        return response()->json(['type' => 'success', 'message' => "Le Client a été créée avec succès"]);
    }

    //EDITION DU CLIENT
    public function edit($id)
    {
        $client = Client::find($id);
        if ($client) {
            $users = User::get();
            return view('clients.modals.update', ['client' => $client], ['users' => $users]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }

        //MAJ DUN CLIENT
    public function update(Request $request, Client $client)
    {
        $users = User::all()->pluck('id', 'firstname', 'lastname')->toArray();

        $validator = Validator::make($request->all(), [
            'montant_demande'       => 'numeric|digits_between:1,12',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $previous = [
            'Statut' => $client->montant_demande,

        ];

        if ($client) {
            $client->numb_cli           = NumberService::generateNumber();
            $client->name               = $request->nom;
            $client->lastname           = $request->prenom;
            $client->first_phone        = $request->numero_1;
            $client->second_phone       = $request->numero_2;
            $client->date_naiss         = $request->date_naiss;
            $client->numb_cnib          = $request->numero_cnib;
            $client->date_naiss         = $request->date_naiss;
            $client->montant_demande    = $request->montant_demande;
            $client->genre              = $request->genre;
            // $client->status             = $request->status;
            // $client->photo              = $request->photo;
            $client->user_id            = $request->utilisateur;
            $client->save();


            return response()->json(['type' => 'success', 'message' => "L'utilisateur a été modifié avec succès !"]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }


    //change status
    public function changeStatus($id)
    {
        $status = Client::select('status')->where('id', $id)->first();
        
        Client::where('id', $id)->update(['status' => $status]);
        return redirect()->back();
    }

    // public function status($id)
    // {
    //     $client = Client::find($id);
    //     if ($client) {
    //         if ($client->status == 'Accepté') {
    //             $client->status = 'Attente';
    //         } else {
    //             $client->status = 'Rejeté';
    //         }
    //         $client->save();

    //         activity("Audit")
    //             ->causedBy(Auth::user())
    //             ->performedOn($client)
    //             ->withProperties([
    //                 'Customer' => $client
    //             ])
    //             ->log("Changement de status du client.");

    //         return response()->json(['type' => 'success', 'message' => 'Changé avec succès !']);
    //     } else {
    //         return response()->json(['type' => 'error', 'message' => 'Une erreur est survenue !']);
    //     }
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clientAcceptes(Request $request)
    {
        if ($request->has('trashed')) {
            $clients = Client::onlyTrashed()
                ->get();
        } else {
            $clients = Client::with('user')->get();
        }

        return view('clients.clientAcceptes', compact('clients'));
    }

    /**
     * soft delete post
     *
     * @return void
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if ($client) {
            $client->delete();
            return response()->json($);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue lors de la suppression !"]);
        }

    }

    /**
     * restore specific post
     *
     * @return void
     */
    public function restore($id)
    {
        Client::withTrashed()->find($id)->restore();

        return redirect()->back();
    }

    /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        Client::onlyTrashed()->restore();

        return redirect()->route('clients.index');
    }

    public function montantChangeStore(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'new_montant'       => 'required|integer|min:1|digits_between:1,12',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 500);
        }

        $client = Client::where('id', $id)->first();
        $client->new_montant = $request->montant_demande;
        $client->save();
        return response()->json(['type'=>'success', 'message'=>'Montant changé avec succès !']);
    }

    public function myMontant(){
        $client = Client::all();
        if ($client){
            return view('clients.montant', ['client'=>$client]);
        }else{
            return response()->json(['type' => 'error', 'message' => 'Une erreur est survenue !']);
        }
    }

    
}
