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
     **The Artisan commands provided by your application.
     **
     ** @var array
     **/
    protected $commands = [
        //This is the line of code added, at the end, we the have class name of CalculatePenalty.php inside appconsolecommands
        Commands\CalculatePenalty::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('calculate:penalty')->daily();
        $schedule->command('CalculatePenalty:penalty')->everyMinute();
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
