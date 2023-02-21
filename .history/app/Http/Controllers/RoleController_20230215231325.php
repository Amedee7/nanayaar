<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Configuration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function datatables()
    {
        $roles = Role::all();
        $configs = Configuration::select(['id','entreprise_name'])->find(1);
        return datatables()->of($roles, $configs)
            ->addColumn('action', function ($roles) {
                return view('roles.actions', ['roles' => $roles]);
            })->toJson();
    }


    public function index()
    {
        $clientAttente = DB::table('clients')->where('status', 'Attente')->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 'Accepté')->where('clients.deleted_at', null)->count();
        $clientRejeté = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();
        $configs = Configuration::select(['id','entreprise_name'])->find(1);        $user = Auth::user();

        return view('roles.index',
        [            'user' => $user,
            'configs' => $configs,
            'clientAttente' => $clientAttente,
            'clientAccepté' => $clientAccepté,
            'clientRejeté' => $clientRejeté
        ]
    
    );
    }


    public function create()
    {
        $permissions = Permission::all()->pluck('id', 'name')->toArray();
        $modules = ['utilisateur', 'numero', 'pointage', 'operation', 'role', 'permission', 'profile', 'client', 'pret', 'versement'];
        return view('roles.modals.create', ['permissions' => $permissions, 'modules' => $modules]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => 'required|unique:roles,name,NULL,id,deleted_at,NULL',
                'display_name' => 'required',
                'permissions' => 'required'
            ],
            [
                'permissions.required' => 'Choisissez au moins une permissions.'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $roles = new Role();
        $roles->name = $request->name;
        $roles->display_name = $request->display_name;
        $roles->description = $request->description;
        $roles->save();
        $roles->attachPermissions($request->permissions);

        activity("Audit")
            ->causedBy(Auth::user())
            ->performedOn($roles)
            ->withProperties([
                'Role' => $roles
            ])
            ->log("Création de role: $roles->name ");
        return response()->json(['type' => 'success', 'message' => "Le rôle a été créé avec succès"]);
    }


    public function show($id)
    {
        $role = Role::find($id);
        $modules = ['utilisateur', 'numero', 'pointage', 'operation', 'role', 'permission', 'profile', 'client', 'pret', 'versement'];
        $permissions = Permission::all()->pluck('id', 'name')->toArray();
        return view('roles.modals.view', ['role' => $role, 'permissions' => $permissions, 'modules' => $modules]);
    }


    public function edit($id)
    {
        $role = Role::find($id);
        $modules = ['utilisateur', 'numero', 'pointage', 'operation', 'role', 'permission', 'profile', 'client', 'pret', 'versement'];
        $permissions = Permission::all()->pluck('id', 'name')->toArray();
        return view('roles.modals.update', ['role' => $role, 'permissions' => $permissions, 'modules' => $modules]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required|unique:roles,name,' . $id . ',id,deleted_at,NULL',
            'display_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $roles = Role::find($id);
        $roles->name =  $request->get('name');
        $roles->display_name = $request->get('display_name');
        $roles->description = $request->get('description');
        $roles->save();
        $roles->syncPermissions($request->permissions);

        activity("Audit")
            ->causedBy(Auth::user())
            ->performedOn($roles)
            ->withProperties([
                'Role' => $roles
            ])
            ->log("Modification de role: $roles->name ");

        return response()->json(['type' => 'success', 'message' => "Le rôle a été modifié avec succès"]);
    }


    public function destroy($id)
    {
        $role = Role::find($id);
        $log = ['Role' => $role];
        if ($role) {
            $role->delete();
            activity("Sécurité")
                ->causedBy(Auth::user())
                ->performedOn($role)
                ->withProperties([
                    'Role' => $log
                ])
                ->log("Suppression de role: $role->name");
            return response()->json(['type' => 'success', 'message' => "Le rôle a été supprimé avec succès !"]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur s'est produite !"]);
        }
    }
}
