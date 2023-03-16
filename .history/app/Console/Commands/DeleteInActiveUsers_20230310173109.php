<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteInActiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteInActiveUsers:deleteusers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete In Active Users';

    public 

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('users')->delete(5);
    }
}
