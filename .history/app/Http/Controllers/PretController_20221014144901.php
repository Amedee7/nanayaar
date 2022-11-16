<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Role;
use App\Models\User;
use App\Models\Pret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class PretController
 * @package App\Http\Controllers
 */
class PretController extends Controller
{

    public function datatables()
    {
        $prets = Pret::with('client')->get();
        // $clients = Client::all();
        // $prets = Pret::all();

        return datatables()->of($prets)
            ->addColumn('action', function ($prets) {
                return view('prets.actions', ['prets' => $prets]);
            })->toJson();
    }

    public function index()
    {
        $prets = Pret::all();
        $clients = Client::all();
        return view('prets.index', compact('clients', 'prets'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('prets.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date_demande_pret'    => 'required|date',
            'date_remboursement_pret'     => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $pret = new Pret();
        $pret->end                = $request->date;
        $pret->limit          = $request->end;
        $pret->client_id                        = $request->client;
        $pret->commission                        = $request->commission;
        $pret->created_by = Auth::id();
        $pret->deleted_by;
        $pret->updated_by;

        $pret->save();

        activity("Création du pret")
            ->causedBy(Auth::user())
            ->performedOn($pret)
            ->withProperties([
                'Nom du pret'  => $pret->start,
            ])
            ->log("Création du pret " . $pret->start);

        return response()->json(['type' => 'success', 'message' => "Le Pret a été créée avec succès"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
