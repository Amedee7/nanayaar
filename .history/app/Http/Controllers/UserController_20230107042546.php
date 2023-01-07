<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function datatables()
    {
        $users = User::with('roles')->with('roles');
        return datatables()->of($users)
            ->addColumn('action', function ($users) {
                return view('users.actions', ['users' => $users]);
            })->toJson();
    }

    public function index()
    {
        $clientAttente = DB::table('clients')->where('status', 'Attente')->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 'Accepté')->where('clients.deleted_at', null)->count();
        $clientRejeté = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();
        
        return view('users.index',
    
        ['clientAttente' => $clientAttente,
        'clientAccepté' => $clientAccepté,
        'clientRejeté' => $clientRejeté]
    );
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.modals.create',  ['roles' => $roles]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "firstname" => 'required',
            "lastname" => 'required',
            "telephone" => 'required|numeric|unique:users,telephone,NULL,id,deleted_at,NULL',
            "email" => 'required|unique:users,email,NULL,id,deleted_at,NULL',
            "role" => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->password = Hash::make('password');
        $user->save();

        $user->attachRole($request->role);

        activity("Audit")
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->withProperties([
                'Nom' => $user->firstname,
                'Prenom'  => $user->lastname,
                'Adresse email'     => $user->email,
                'Telephone'    => $user->telephone,
                'Statut' => $user->status
            ])
            ->log("Création de compte utilisateur " . $user->firstname . ' ' . $user->lastname);

        return response()->json(['type' => 'success', 'message' => "L'utilisateur a été créé avec succès"]);
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            $roles = Role::all();
            return view('users.modals.show', ['user' => $user, 'roles' => $roles]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            $roles = Role::all();
            return view('users.modals.update', ['user' => $user, 'roles' => $roles]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            "firstname" => 'required',
            "lastname" => 'required',
            "telephone" => 'required|unique:users,telephone,' . $user->id . ',id,deleted_at,NULL',
            "email" => 'required|unique:users,email,' . $user->id . ',id,deleted_at,NULL',
            "role" => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $previous = [
            'Nom'               => $user->firstname,
            'Prenom'            => $user->lastname,
            'Adresse email'     => $user->email,
            'Telephone'         => $user->telephone,
            'Statut'            => $user->status,
        ];

        if ($user) {
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->telephone = $request->telephone;
            $user->email = $request->email;
            $user->save();
            $user->syncRoles([$request->role]);

            activity("Modification d'un compte")
                ->causedBy(Auth::user())
                ->performedOn($user)
                ->withProperties([
                    'previous' => $previous,
                    'new' => [
                        'Nom' => $user->firstname,
                        'Prenom'  => $user->lastname,
                        'Adresse email'     => $user->email,
                        'Telephone'    => $user->telephone,
                        'Statut' => $user->status,
                    ]
                ])
                ->log("Modification de compte utilisateur " . $user->firstname . ' ' . $user->lastname);

            return response()->json(['type' => 'success', 'message' => "L'utilisateur a été modifié avec succès !"]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }

    public function status($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->status == 'actif') {
                $user->status = 'inactif';
            } else {
                $user->status = 'actif';
            }
            $user->save();
            activity("Changement de statut d'un compte")
                ->causedBy(Auth::user())
                ->performedOn($user)
                ->withProperties([
                    'Nom' => $user->firstname,
                    'Prenom'  => $user->lastname,
                    'Adresse email'     => $user->email,
                    'Telephone'    => $user->telephone,
                    'Statut' => $user->status
                ])
                ->log("Changement de statut de compte " . $user->firstname . ' ' . $user->lastname . ' ' . 'en' . ' ' . $user->status);

            return response()->json(['type' => 'success', 'message' => "Status changé avec succès !"]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }

    public function profile()
    {
        $user = User::where('id', Auth::user()->id);
        return view('users.profile.index', ['user' => $user]);
    }

    public function avatar()
    {
        $user = User::find(Auth::user()->id);
        if ($user) {
            return view('users.profile.avatar');
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }

    public function password()
    {
        return view('users.profile.password');
    }

    public function passwordReset(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Votre mot de passe est incorrect !');
                    }
                },
            ],
            "new_password"         => 'required',
            "renew_password"          => 'required|same:new_password',
        ],
        [
            'password.required' => 'Votre mot de passe est obligatoire pour continuer.',
            'new_password.required' => 'Veuillez saisir le nouveau mot de passe.',
            'renew_password.required' => 'Veuillez resaisir le nouveau mot de passe',
            'renew_password.same' => "La valeur entrée n'est pas identique.",
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 500);
        }

        $user = User::where('id', $id)->first();
        $user->password = Hash::make($request->new_password);
        $user->save();

        activity("Réinitialisation de mot de passe")
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->withProperties([
                'Nom d\'utilisateur'  => $user->username,
                'Nom' => $user->firstname,
                'Prenom'  => $user->lastname,
                'Adresse email'     => $user->email,
                'Telephone'    => $user->msisdn,
                'Statut' => $user->status
            ])
            ->log("Réinitialisation de mot de passe de utilisateur " . $user->firstname . ' ' . $user->lastname);

        return response()->json(['type' => 'success', 'message' => "Mot de passe changé avec succès !"]);
    }
}
