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
protected $commands = **[**

//This is the line of code added, at the end, we the have class name of DeleteInActiveUsers.php inside appconsolecommands
'AppConsoleCommandsDeleteInActiveUsers',
];

        /**
            Define the application's command schedule.

        @param IlluminateConsoleSchedulingSchedule $schedule
        @return void
        */
        protected function schedule(Schedule $schedule)
        {
        //insert name and signature of you command and define the time of excusion
        $schedule->command('DeleteInActiveUsers:deleteusers')
        ->everyMinute();
        }

        /**
        Register the Closure based commands for the application.

        @return void
        */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}

// class Kernel extends ConsoleKernel
// {
//     /**
//      * Define the application's command schedule.
//      *
//      * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
//      * @return void
//      */
//     protected function schedule(Schedule $schedule)
//     {
//         $schedule->command('calculate:penalty')->daily();
        
//         $schedule->call(function () {
//             DB::table('versements')->insert([
//                 'rended' => 1
//             ]);
//         })->when(function () {
//             $currentDate = Carbon::now();
//             $deadline = NumberService::generateNumber();
//             return $currentDate->gte($deadline);
//         });
//     }

//     /**
//      * Register the commands for the application.
//      *
//      * @return void
//      */
//     protected function commands()
//     {
//         $this->load(__DIR__.'/Commands');

//         require base_path('routes/console.php');
//     }
// }
