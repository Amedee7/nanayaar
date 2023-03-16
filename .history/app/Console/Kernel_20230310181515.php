<?php

namespace App\Console;

use Carbon\Carbon;
use App\Services\NumberService;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('calculate:penalty')->daily();
        $schedule->command('calculate:penalty')->everyMinute();

        $schedule->call(function () {
            DB::table('versements')->insert([
                'rended' => 1
            ]);
        })->when(function () {
            $currentDate = Carbon::now();
            $deadline = NumberService::generateNumber();
            return $currentDate->gte($deadline);
        });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
