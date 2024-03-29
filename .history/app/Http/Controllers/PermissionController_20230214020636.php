<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Configuration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function datatables()
    {

        $permissions = Permission::all();
        $configs = Configuration::select(['id','entreprise_name'])->find(1);

        return datatables()->of($permissions, $configs)
            ->addColumn('action', function ($permissions) {
                return view('permissions.actions', ['permissions' => $permissions]);
            })->toJson();
    }


    public function index()
    {
        $clientAttente = DB::table('clients')->where('status', 'Attente')->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 'Accepté')->where('clients.deleted_at', null)->count();
        $clientRejeté = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();
        $configs = Configuration::select(['id','entreprise_name'])->find(1);

        return view(
            'permissions.index',
            [
                
                'clientAttente' => $clientAttente,
                'clientAccepté' => $clientAccepté,
                'clientRejeté' => $clientRejeté
            ]
        );
    }


    public function create()
    {
        return view('permissions.modals.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required|unique:permissions,name,NULL,id,deleted_at,NULL',
            "display_name" => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        return response()->json(['type' => 'success', 'message' => "La permission a été créée avec succès"]);
    }


    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permissions.modals.update', ['permission' => $permission]);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            "name" => 'required|unique:permissions,name,' . $id . ',id,deleted_at,NULL',
            "display_name" => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $permission = Permission::find($id);
        if ($permission) {
            $permission->name = $request->name;
            $permission->display_name = $request->display_name;
            $permission->description = $request->description;
            $permission->save();
            return response()->json(['type' => 'success', 'message' => "La permission a été modifiée avec succès !"]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur s'est produite !"]);
        }
    }


    public function destroy($id)
    {
        $permission = Permission::find($id);
        if ($permission) {
            $permission->delete();
            return response()->json(['type' => 'success', 'message' => "La permission a été supprimée avec succès !"]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur s'est produite !"]);
        }
    }
}
