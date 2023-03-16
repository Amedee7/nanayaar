<?php

namespace App\Console\Commands;

use App\Models\Versement;
use Illuminate\Console\Command;

class CalculatePenalty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
        $today = 
        // Récupérer les commandes qui ont dépassé leur date limite de paiement
        $overdueOrders = Versement::where('end', '<', now())->get();

        // Calculer la pénalité pour chaque commande
        foreach ($overdueOrders as $order) {
            $penalty = $order->total * 0.1; // 10% de la somme totale
            $order->penalty = $penalty;
            $order->save();
        }
    }
}
