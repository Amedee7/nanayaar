<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('users')-
    }
}
