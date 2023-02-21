<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function datatables()
    {
        $logs = DB::table('activity_log')->join('users', 'users.id', '=', 'activity_log.causer_id')
            ->select(
                'activity_log.id',
                'activity_log.log_name',
                'activity_log.description',
                'activity_log.subject_type',
                'activity_log.subject_id',
                DB::raw('CONCAT(lastname, " ", firstname) AS full_name'),
                db::raw("date_format(activity_log.created_at,'%d/%m/%Y %H:%i') as created_at")
            )->orderByDesc('activity_log.id');
        return datatables()->of($logs, 'configs'=)
            ->addColumn('action', function($logs){
                return view('logs.actions', ['logs'=>$logs]);
            })->toJson();
    }

    public function index(){
        $configs = Configuration::select(['id','entreprise_name'])->find(1);
        return view('logs.index',
        ['$configs' =>$configs],
    );
    }

    public function show($id){
        $log = DB::table('activity_log')->join('users', 'users.id', '=', 'activity_log.causer_id')
            ->select(
                'activity_log.id',
                'activity_log.log_name',
                'activity_log.description',
                'activity_log.subject_type',
                'activity_log.subject_id',
                'activity_log.properties',
                DB::raw('CONCAT(lastname, " ", firstname) AS full_name'),
                db::raw("date_format(activity_log.created_at,'%d/%m/%Y %H:%i') as created_at")
            )->where('activity_log.id', $id)->first();
        if ($log){
            return view('logs.modals.show', ['log'=>$log]);
        }else{
            return response()->json(['type' => 'error', 'message' => "Une erreur s'est produite !"]);
        }
    }
}
