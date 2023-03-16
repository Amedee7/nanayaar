<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Versement;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();

        // Récupérer les commandes qui ont dépassé leur date limite de paiement
        $overdueOrders = Versement::where('fin', '<', $now)->get();

        // Calculer la pénalité pour chaque commande
        foreach ($overdueOrders as $versement) {
            $now =Carbon::parse('2023-03-11');
            $fin = Carbon::parse('2023-03-09');
            $jour = $fin->diffInDays($now);
            $penalty = $versement->reste_apaye * 1 / 100 * $jour; // 10% de la somme totale restante
            $versement->penalite = $penalty;
            $versement->save();

            $this->info('Finished, successfully');
        }
    }
}
