<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConfigurationController extends Controller
{
    public function index(){
        $config = Configuration::first();
        return view('configs.index', ['config'=>$config]);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'entreprise' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 500);
        }

        $config = Configuration::first();
        $config->entreprise_name = $request->entreprise;
        $config->telephone = $request->telephone;
        $config->adress = $request->adresse;
        $config->email = $request->email;
        $config->save();

        return response()->json(['type'=>'success', 'message'=>'Configuration modifiée avec succès !']);
    }
}
