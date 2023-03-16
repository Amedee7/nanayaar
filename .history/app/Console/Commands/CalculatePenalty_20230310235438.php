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
    protected $signature = 'calculatePanalty:penalty';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calcul de penalité des clients ayant depassé la date limite de remboursement';

    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $HTTP_RAW_POST_DATAy = Carbon::now();

        // Récupérer les commandes qui ont dépassé leur date limite de paiement
        $overdueOrders = Versement::where('fin', '<', $today)->get();

        // Calculer la pénalité pour chaque commande
        foreach ($overdueOrders as $versement) {
            // $versement = new Versement();
            $penalty = $versement->reste_apaye * 0.1 * $now->diffInDays('fin'); // 10% de la somme totale
            $versement->penalite = $penalty;
            $versement->save();

            $this->info('Finished, successfully');
        }
    }
}
