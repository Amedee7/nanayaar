<?php

namespace App\Http\Controllers;

use COM;
use App\Models\User;
use App\Models\Client;
use App\Models\Versement;
use Illuminate\Http\Request;
use App\Services\NumberService;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class ClientController extends Controller
{

    public function datatables(Request $request)
    {
        $clients = DB::table('clients')
        ->join('users', 'users.id', '=', 'clients.created_by')
        ->select(
            'name',
            'lastname',
            'number',
            'versements.status',
            'clients.name',
            'clients.lastname',
            'clients.numb_cli',
            'clients.first_phone',

            'users.avatar',
            DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name"),
            DB::raw("CONCAT(clients.name,' ',clients.lastname) as full_name_client"),
            db::raw("date_format(versements.created_at,'%d/%m/%Y %H:%i') as created_at")
        )->where('versements.deleted_at', null);

        $clients = Client::with('user')->get();
        if ($request->has('trashed')) {
            $clients = Client::onlyTrashed()->orderBy('id', 'desc');
        } else {
            $clients = Client::with('user')->orderBy('id', 'desc');
        }
        return datatables()->of($clients)
            ->addColumn('action', function ($clients) {
                return view('clients.actions', ['clients' => $clients]);
            })->toJson();
    }

    public function index(Request $request)
    {
        $clientAttente = DB::table('clients')->where('status', 0)->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 1)->where('clients.deleted_at', null)->count();
        // $clientRejeté = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();

        if ($request->has('trashed')) {
            $clients = Client::onlyTrashed()->orderBy('id', 'desc')->paginate('10');
        } else {
            $clients = Client::with('user')->orderBy('id', 'desc')->paginate('10');
        }

        return view(
            'clients.index',
            ['clients' => $clients],
            [
                'clientAttente' => $clientAttente,
                'clientAccepté' => $clientAccepté,
                // 'clientRejeté' => $clientRejeté
            ]
        );
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
            'adresse'               => 'required',
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
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom'                => 'required|max:150',
            'montant_demande'       => 'required|numeric|digits_between:1,12',
            'numero_1'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'numero_2'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'adresse'               => 'required',
            'numero_cnib'           => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        if ($client) {
            $client->numb_cli           = $request->numb_cli;
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
    
            $client->created_by;         
            $client->deleted_by;
            $client->updated_by = Auth::id();
            $client->save();


            return response()->json(['type' => 'success', 'message' => "Le c a été modifié avec succès !"]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }


    //change status
    // public function changeStatus($id)
    // {
    //     $status = Client::select('status')->where('id', $id)->first();

    //     Client::where('id', $id)->update(['status' => $status]);
    //     $status->save();

    //     return redirect()->back();
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
            return response()->json(['type' => 'success', 'message' => "Ce client a été supprimée avec succès !"]);
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

    public function montantChangeStore(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'new_montant'       => 'required|integer|min:1|digits_between:1,12',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $client = Client::where('id', $id)->first();
        $client->new_montant = $request->montant_demande;
        $client->save();
        return response()->json(['type' => 'success', 'message' => 'Montant changé avec succès !']);
    }

    public function myMontant()
    {
        $client = Client::all();
        if ($client) {
            return view('clients.montant', ['client' => $client]);
        } else {
            return response()->json(['type' => 'error', 'message' => 'Une erreur est survenue !']);
        }
    }

    public function updateStatus(Request $request)
    {
        $status = Client::findOrFail($request->id);
        $status->status = $request->status;
        $status->save();

        return response()->json(['message' => 'status updated successfully.']);
    }
}
