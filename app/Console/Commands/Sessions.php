<?php

namespace App\Console\Commands;

use App\Notifications\SessionNotification;
use Illuminate\Console\Command;

use App\Models\Client\ClientSession;
use Carbon\Carbon;

use App\Events\Appointment;
use App\Models\User;
use App\Models\Psycho\Psychologist;
use App\Models\Timing;

class Sessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check_session:run';

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

        $now=\Carbon\Carbon::now();


        $clientSession  = (new ClientSession())
        ->join('timings','timings.id','client_sessions.timing_id')
        ->selectRaw("
        client_sessions.*,
        timings.start_time,
        timings.end_time
        ")
        ->whereDate('client_sessions.date',\Carbon\Carbon::now())
        ->get();


        foreach($clientSession AS $key=>$value)
        {
            $currentTime=$now->toTimeString();
//            $currentTime='00:35:00';
            $endtime=$value->end_time;
            $start = strtotime($currentTime);
            $end   = strtotime($endtime);

            $mins = ($end - $start) / 60;
            \Log::info('min is '.$mins);
            $url = 'clientSession/'.$value->id;
            if(round($mins)<=20)
            {
                $psychologist=(new Psychologist())->find($value->psychologist_id);

                if($psychologist)
                {
                    $user=$psychologist->user;
                    $user->notify(new SessionNotification('Dear Dr you have new patient',$url));
                }
            }

        }
        \Log::info("Cron of session work fine!");

    }
}
