<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classe;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ClasseController extends Controller
{
    public function datatables(){
        $classes = classe::all();
        return datatables()->of($classes)
            ->addColumn('action', function ($classes) {
                return view('classes.actions',['classes'=>$classes]);
            })->toJson();
    }


    public function index(){
        return view('classes.index');
    }


    public function create(){
        return view('classes.modals.create');
    }


    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            "name" => 'required|unique:classes,name,NULL,id,deleted_at,NULL',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $classe = new classe();
        $classe->name = $request->name;
        $classe->created_by = Auth::id();
        $classe->save();

        activity("Création de ville")
            ->causedBy(Auth::user())
            ->performedOn($classe)
            ->withProperties([
                'Nom de la ville'  =>$classe->name,
            ])
            ->log("Création de la ville ".$classe->name);


        return response()->json(['type' => 'success', 'message' => "La ville a été créée avec succès"]);

    }


    public function edit($id){
        $classe = classe::find($id);
        if($classe){
            return view('classes.modals.update', ['classe'=>$classe]);
        }else{
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }


    public function update(Request $request, $id){
        $classe = classe::find($id);
        $validator = Validator::make($request->all(), [
            "name" => 'required|unique:classes,name,'.$id.',id,deleted_at,NULL',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $previous = [
            'Nom de la classe'=>$classe->name
        ];

        $classe->name = $request->name;
        $classe->save();

        activity("Modidification de la classe")
            ->causedBy(Auth::user())
            ->performedOn($classe)
            ->withProperties([
                'previous'=>$previous,
                'new'=>[
                    'Nom de la ville'  =>$classe->name,
                ]
            ])
            ->log("Modidification de la ville ".$classe->name);

        return response()->json(['type' => 'success', 'message' => "La classe a été modifiée avec succès"]);

    }



    public function destroy($id){
        $classe = classe::find($id);
        if($classe){
            $classe->delete();
            activity("Suppression de ville")
                ->causedBy(Auth::user())
                ->performedOn($classe)
                ->withProperties([
                    'Nom de la ville'  =>$classe->name,
                ])
                ->log("Suppression de la ville ".$classe->name);
            return response()->json(['type' => 'success', 'message' => "La ville a été supprimée avec succès !"]);
        }else{
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }
}

