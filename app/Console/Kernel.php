<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Auth;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\BackupCron::class,
        Commands\Sessions::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        //$schedule->command('backup:run')->daily()->at('10:10');

        // $schedule
        // ->command('backup:run')->daily()->at('10:00')
        // ->onFailure(function () {

        // })
        // ->onSuccess(function () {

        // });
//        $schedule->command('mybackup:run')
//        ->everyMinute();

        $schedule->command('check_session:run')
        ->everyTenMinutes();




    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
