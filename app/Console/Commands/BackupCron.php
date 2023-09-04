<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mybackup:run';

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
        \Artisan::call('backup:run --only-db --disable-notifications');
               /* all backup */
               /* Artisan::call('backup:run'); */
               $output = \Artisan::output();

        \Log::info("Cron is working fine!");
    }
}
