<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Versement;
use Illuminate\Console\Command;

class CalculatePenalty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculatealite:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today();
        // Récupérer les commandes qui ont dépassé leur date limite de paiement
        $overdueOrders = Versement::where('fin', '<', $today)->get();

        // Calculer la pénalité pour chaque commande
        foreach ($overdueOrders as $versement) {
            $penalty = $versement->reste_apaye * 0.1 * ('DATEDIFF(now(), fin'); // 10% de la somme totale
            $versement->penalite = $penalty;
            $versement->save();
        }
        // dd($overdueOrders);
        
    }
}
