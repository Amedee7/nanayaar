<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Versement;
use Faker\Core\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VersementController extends Controller
{
    public function datatables()
    {
        $versements = DB::table('versements')
            ->join('clients', 'clients.id', '=', 'versements.client_id')
            ->join('users', 'users.id', '=', 'versements.created_by')
            ->select(
                'versements.id',
                'versements.identifier',
                'versements.commentaire',
                'versements.montant_octroye',
                'somme_verse',
                'reste_apaye',
                'state',
                'versements.status',
                'clients.name',
                'clients.lastname',
                'clients.numb_cli',
                'clients.first_phone',
                'clients.montant_demande',

                'users.avatar',
                DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name"),
                DB::raw("CONCAT(clients.name,' ',clients.lastname) as full_name_client"),
                db::raw("date_format(versements.created_at,'%d/%m/%Y %H:%i') as created_at")
            )->where('versements.deleted_at', null);
        return datatables()->of($versements)
            ->addColumn('actions', function ($versements) {
                return view('versements.actions', ['versements' => $versements]);
            })->toJson();
    }

    public function index(Request $request)
    {
        $versements = DB::table('versements')
            ->join('clients', 'clients.id', '=', 'versements.client_id')
            ->join('users', 'users.id', '=', 'versements.created_by')
            ->select(
                'versements.id',
                'versements.identifier',
                'versements.commentaire',
                'versements.montant_octroye',
                'somme_verse',
                'reste_apaye',
                'state',
                'versements.status',
                'clients.name',
                'clients.first_phone',
                'clients.montant_demande',

                'users.avatar',
                DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name"),
                db::raw("date_format(versements.created_at,'%d/%m/%Y %H:%i') as created_at")
            )->where('versements.deleted_at', null);

        $clientAttente = DB::table('clients')->where('status', 0)->where('clients.deleted_at', null)->count();
        $clientAccept?? = DB::table('clients')->where('status', 1)->where('clients.deleted_at', null)->count();
        // $clientRejet?? = DB::table('clients')->where('status', 'Rejet??')->where('clients.deleted_at', null)->count();

        if ($request->has('trashed')) {
            $clients = Client::onlyTrashed()->paginate('10');
        } else {
            $clients = Client::with('user')->paginate('10');
        }

        return view(
            'versements.index',
            ['versements' => $versements],
            ['clients' => $clients],
            [
                'clientAttente' => $clientAttente,
                'clientAccept??' => $clientAccept??,
                // 'clientRejet??' => $clientRejet??
            ]
        );
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
            ->log("Cr??ation du pret " . $versement->nom);

        return response()->json(['type' => 'success', 'message' => "Le Versement a ??t?? effectuer avec succ??s"]);
    }


    //DETAILS DU VERSEMENT
    public function showVersement($id)
    {

        $versement = DB::table('versements')
            ->join('clients', 'clients.id', '=', 'versements.client_id')
            ->join('users', 'users.id', '=', 'versements.created_by')
            ->select(
                'versements.id',
                'versements.identifier',
                'versements.commentaire',
                'versements.montant_octroye',
                'somme_verse',
                'reste_apaye',
                'state',
                'versements.status',
                'clients.name',
                'clients.lastname',
                'clients.numb_cli as numero_client',
                'clients.first_phone as numero_telephone1_client',
                'clients.second_phone as numero_telephone2_client',


                'users.avatar',
                DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name_user"),
                DB::raw("CONCAT(clients.name,' ',clients.lastname) as full_name_client"),
                db::raw("date_format(versements.created_at,'%d/%m/%Y %H:%i') as created_at")
            )->where('versements.id', $id)->first();
        return view('versements.modals.show', [
            'versement' => $versement
        ]);
    }

    //IITIATION DU VERSEMENT STORE FUNCTIONS
    public function versementStore(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'client' => 'required|exists:clients,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }
        $client = Client::where('id', $request->client)->first();
dd($client)
        $versement = new Versement();
        $versement->identifier          = '#S' . $this->generateRandomIdentifier(10);
        $versement->state               = 'En cours';
        $versement->montant_octroye     = $client->montant_demande;
        $versement->status              = 'Non pay??';
        $versement->client_id           = $request->client;
        $versement->created_by          = Auth::user()->getAuthIdentifier();
        $versement->save();

        return response()->json(['type' => 'success', 'message' => 'Op??ration effectu??e avec succ??s !']);
    }

    //PAGE DE MODIFICATION DE COMMANDE
    public function modifyVersement($id)
    {
        // $versement = DB::table('versements')->where('id', $id)->first();
        $versements = DB::table('versements')
            ->join('clients', 'clients.id', '=', 'versements.client_id')
            ->join('users', 'users.id', '=', 'versements.created_by')
            ->select(
                'versements.id',
                'versements.identifier as identifiant_versement',
                'versements.commentaire',
                'versements.montant_octroye',
                'somme_verse',
                'reste_apaye',
                'state',
                'versements.status',
                'clients.name',
                'clients.lastname',
                'clients.numb_cli as numero_client',
                'clients.first_phone as numero_telephone1_client',
                'clients.second_phone as numero_telephone2_client',
                'users.avatar',
                DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name_user"),
                DB::raw("CONCAT(clients.name,' ',clients.lastname) as full_name_client"),
                db::raw("date_format(versements.created_at,'%d/%m/%Y %H:%i') as created_at")
            )->where('versements.id', $id)->get();

        $versement = DB::table('versements')
            ->join('clients', 'clients.id', '=', 'versements.client_id')
            ->join('users', 'users.id', '=', 'versements.created_by')
            ->select(
                'versements.id',
                'versements.identifier as identifiant_versement',
                'versements.commentaire',
                'versements.montant_octroye',
                'somme_verse',
                'reste_apaye',
                'state',
                'versements.status as status',
                'clients.name',
                'clients.lastname',
                'clients.numb_cli as numero_client',
                'clients.first_phone as numero_telephone1_client',
                'clients.second_phone as numero_telephone2_client',


                'users.avatar',
                DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name_user"),
                DB::raw("CONCAT(clients.name,' ',clients.lastname) as full_name_client"),
                db::raw("date_format(versements.created_at,'%d/%m/%Y %H:%i') as created_at")
            )->where('versements.id', $id)->first();

        // dd($versement);
        return view('versements.pages.versement', ['versement' => $versement, 'id' => $id, 'versements' => $versements]);
    }

    //innialisation dun versement
    public function versementPageStore(Request $request, $id)
    {
        $versement = Versement::where('id', $id)->first();
        $validator = Validator::make($request->all(), [
            'somme_verse' => 'required|integer|min:1|max:' . $versement->montant_octroye . '',
            'commentaire' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $versement->somme_verse = $request->somme;
        $versement->reste_apaye = ($versement->montant_octroye - $request->somme);
        $versement->state = 'Termin??';
        $versement->commentaire = $request->commentaire;
        if ($versement->montant_octroye - $request->somme == 0) {
            $versement->status = 'Pay??';
        } elseif ($versement->montant_octroye - $request->somme > 0) {
            $versement->status = 'Paiement partiel';
        }
        $versement->save();

        $client = Client::where('id', $versement->client_id)->first();
        if ($versement->montant_octroye > $request->somme) {
            $client->amount_credit = ($client->amount_credit + $versement->reste_apaye);
        }
        $client->save();


        return response()->json(['type' => 'success', 'message' => 'Commande termin?? avec succ??s !']);
    }

    //AJOUT DE PRODUIT A LA COMMANDE
    public function modifyVersementModifierMontant($id)
    {
        $versements = Client::join('versements', 'versements.client_id', '=', 'clients.id')
            ->select(
                'clients.id',
                'clients.name',
                'clients.lastname',
                'clients.numb_cli',
                'clients.first_phone'
            )->get();
        return view('versements.modals.modifierMontant', ['versements' => $versements, 'id' => $id]);
    }


//pop up de modification de montant octroue
    public function modifyVersementModifierMontantStore(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'montant_octroye' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $versement = Versement::find($id);
        $versement->montant_octroye = $request->montant_octroye;
        $versement->save();

        $client = Client::where('id', $versement->client_id)->first();
        if ($versement->montant_octroye) {
            $client->amount_credit = ($client->amount_credit + 0);
        }
        $client->save();

        return response()->json(['type' => 'success', 'message' => 'Montant modifi?? avec succ??s !']);
    }

    //ANNULER UN VERSEMENT
    public function versementCancel($id)
    {
        $versement = Versement::where('id', $id)->first();
        if ($versement) {
            $versement->state = 'Annul??';
            $versement->save();
            activity("Audit")
                ->causedBy(Auth::user())
                ->performedOn($versement)
                ->withProperties([
                    'versement annul??e' => $versement,
                ])
                ->log("Annulation d'un versement'.");
            return response()->json(['type' => 'success', 'message' => 'versement annul??e avec success !']);
        } else {
            return response()->json(['type' => 'error', 'message' => 'Une erreur est survenue !']);
        }
    }

    //SUPPRIMER UN VERSEMENT
    public function versementDelete($id)
    {
        $versement = Versement::where('id', $id)->first();
        $log = [
            'Versement' => $versement
        ];
        if ($versement) {
            $versement->delete();
            activity("S??curit??")
                ->causedBy(Auth::user())
                ->performedOn($versement)
                ->withProperties([
                    'Versement suprim??e' => $log,
                ])
                ->log("Regler somme restante'.");
            return response()->json(['type' => 'success', 'message' => 'Versement suprim??e avec success !']);
        } else {
            return response()->json(['type' => 'error', 'message' => 'Une erreur est survenue !']);
        }
    }


    function generateRandomIdentifier($chars)
    {
        $data = '1234567890';
        return substr(str_shuffle($data), 0, $chars);
    }
}
