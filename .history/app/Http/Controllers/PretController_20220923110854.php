<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PretController extends Controller
{
    public function datatables()
    {
        $prets = User::with('roles')->with('roles');
        return datatables()->of($prets)
            ->addColumn('action', function ($prets) {
                return view('prets.actions', ['prets' => $prets]);
            })->toJson();
    }


    public function index()
    {
        return view('prets.index');
    }


    public function create()
    {
        $clients = Client::all();
        return view('prets.modals.create',  ['clients' => $clients]);
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "firstname" => 'required',
            "lastname" => 'required',
            "telephone" => 'required|numeric|unique:prets,telephone,NULL,id,deleted_at,NULL',
            "email" => 'required|unique:prets,email,NULL,id,deleted_at,NULL',
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
            return view('prets.modals.show', ['user' => $user, 'roles' => $roles]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }
}
