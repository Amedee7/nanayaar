<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;

class ClientController extends Controller
{



    public function create()
    {
        return view('clients.modals.create');
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'year' => 'required',
            'title' => "required|max:150",
            'starting_date' => 'required|date|after:now',
            'ending_date' => 'required|date|after:starting_date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $client = new Client();
        $client->year = $request->year;
        $client->title = $request->title;
        $client->starting_date = $request->starting_date;
        $client->ending_date = $request->ending_date;
        $client->created_by = Auth::id();
        $client->save();

        activity("Création d\'une année scolaire")
            ->causedBy(Auth::user())
            ->performedOn($client)
            ->withProperties([
                'Titre de L\'année scolaire'  => $client->title,
            ])
            ->log("Création de L\'année scolaire " . $client->title);


        return response()->json(['type' => 'success', 'message' => "L\'année scolaire a été créée avec succès"]);
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


    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $validator = Validator::make($request->all(), [
            'year' => 'required',
            'title' => "required|max:150",
            'starting_date' => 'required|date_format:Y-m-d|before:today|after:2021-12-31',
            'ending_date' => 'required|date|date_format:Y-m-d|after:starting_date',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $previous = [
            'Yearly'        => $client->year,
            'title'         => $client->title,
            'Date de debut' => $client->starting_date,
            'Date de Fin'   => $client->ending_date,
        ];

        $client->year = $request->year;
        $client->title = $request->title;
        $client->starting_date = $request->starting_date;
        $client->ending_date = $request->ending_date;
        $client->save();

        return response()->json(['type' => 'success', 'message' => "L\'année scolaire a été modifiée avec succès"]);
    }



    public function destroy($id)
    {
        $client = Client::find($id);
        if ($client) {
            $client->delete();
            activity("Suppression de L\'année scolaire")
                ->causedBy(Auth::user())
                ->performedOn($client)
                ->withProperties([
                    'Titre de L\'année scolaire'  => $client->title,
                ])
                ->log("Suppression de L\'année scolaire " . $client->title);
            return response()->json(['type' => 'success', 'message' => "L\'année scolaire a été supprimée avec succès !"]);
        } else {
            return response()->json(['type' => 'error', 'message' => "Une erreur est survenue !"]);
        }
    }
}
