<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Services\NumberService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{

    public function datatables()
    {
        $clients = Client::with('users')->select("*")
            ->where('status', 'Accepté')->get();
        return datatables()->of($clients)
            ->addColumn('action', function ($clients) {
                return view('clients.actions', ['clients' => $clients]);
            })->toJson();
    }

    // public function index()
    // {
    //     $clients = Client::get();
    //     $users = User::all()->pluck('id', 'firstname', 'lastname')->toArray();
    //     return view('clients.index', compact('users', 'clients'));
    // }

    public function index()
    {        
        $users = User::all()->pluck('id', 'firstname', 'lastname')->toArray();

        $clients = DB::table('clients')->join('users', 'users.id', '=', 'clients.created_by')
        ->select('clients.id',
            'clients.numb_cli',
            'clients.uuid',
            'clients.name',
            'clients.lastname',
            'clients.first_phone',
            'clients.second_phone',
            'clients.status',
            'clients.photo',
            'clients.montant_demande',
            DB::raw("date_format(clients.created_at,'%d/%m/%Y à %H:%i') as created_at"),
            DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name"),
        )->paginate('10');
        return view('clients.index', ['clients'=>$clients]);
    }

    public function clientAcceptes(){

        $users = User::all()->pluck('id', 'firstname', 'lastname')->toArray();
        
        $clients = Client::get();
        return view('clients.clientAcceptes', ['clients'=>$clients]);
    }

    public function moderation_clients()
    {
        $users = User::all()->pluck('id', 'firstname', 'lastname')->toArray();
        
        $clients = Client::get();

        //  $trashClients = Client::onlyTrashed()->latest()->simplePaginate(10);

        return view('clients.moderation_clients', compact('users', 'clients'));
    }

    // public function moderation_clients()
    // {
    //     $users = User::all()->pluck('id', 'firstname', 'lastname')->toArray();
        
    //     $clients = Client::select("*")
    //     ->where('status', 'Accepter')->get();

    //     return view('clients.moderation_clients', compact('users', 'clients'));
    // }

    public function detailClient(Client $client){
        return view('clients.pages.details', ['client' => $client]);
    }

    public function create()
    {
        return view('clients.create', ['lastClient' => NumberService::generateNumber(), 'users' => User::all()]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom'                   => 'required|max:150',
            'prenom'                => 'required|max:150',
            'montant_demande'       => 'required|numeric|digits_between:1,12',
            'numero_1'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'numero_2'              => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
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
        $client->montant_demande    = $request->montant_demande;
        $client->commission_averse  = $request->montant_demande * 14 / 100 ;
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

    public function edit($id)
    {
        $client = Client::find($id);
        if ($client) {
            return view('clients.modals.update', ['client' => $client]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        if ($client) {
            $client->delete();
            return response()->json(['type' => 'success', 'message' => "La client a été supprimée avec succès !"]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur s'est produite !"]);
        }
    }


    public function update(Request $request, Client $client)
    {
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
    // public function changeStatus($id)
    // {
    //     $getStatus = Client::select('status')->where('id', $id)->first();
    //     if ($getStatus->status == 'Accepter') {
    //         $status = 'Attente';
    //     } else {
    //         $status = 'Accepter';
    //     }
    //     Client::where('id', $id)->update(['status' => $status]);
    //     return redirect()->back();
    // }

    public function status($id){
        $client = Client::find($id);
        if ($client){
            if ($client->status=='Accepté'){
                $client->status = 'Attente';
            }else{
                $client->status = 'Rejeté';
            }
            $client->save();

            activity("Audit")
                ->causedBy(Auth::user())
                ->performedOn($client)
                ->withProperties([
                    'Customer' => $client
                ])
                ->log("Changement de status du client.");

            return response()->json(['type'=>'success', 'message'=>'Changé avec succès !']);
        }else{
            return response()->json(['type'=>'error', 'message'=>'Une erreur est survenue !']);
        }
    }
}
