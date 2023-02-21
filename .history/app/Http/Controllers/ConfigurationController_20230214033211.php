<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientAttente = DB::table('clients')->where('status', 'Attente')->where('clients.deleted_at', null)->count();
        $clientAccepté = DB::table('clients')->where('status', 'Accepté')->where('clients.deleted_at', null)->count();
        $clientRejeté = DB::table('clients')->where('status', 'Rejeté')->where('clients.deleted_at', null)->count();
        $configs = Configuration::select(['id', 'entreprise_name'])->find(1);
        return view(
            'configs.index',
            [
                'config' => $configs,
                'clientAttente' => $clientAttente,
                'clientAccepté' => $clientAccepté,
                'clientRejeté' => $clientRejeté
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $validator = Validator::make($request->all(), [
            'entreprise' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $config = Configuration::first();
        $config->entreprise_name = $request->entreprise;
        $config->telephone = $request->telephone;
        $config->adress = $request->adresse;
        $config->email = $request->email;
        $config->save();

        return response()->json(['type' => 'success', 'message' => 'Configuration modifiée avec succès !']);
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
