<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Company;
use App\Models\HomeCurrency;
use App\Models\CurrencyList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Artisan;

class CompanyCreate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $company_name;
    protected $home_currency;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($company_name, $home_currency)
    {
        $this->company_name     = $company_name;
        $this->home_currency    = $home_currency;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::connection('mysql')->statement("CREATE DATABASE $this->company_name");
        Config::set("database.connections.mysql", [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => $this->company_name,
            'username' => config('database.connections.mysql.username'),
            'password' => config('database.connections.mysql.password'),
        ]);
        DB::purge('mysql');
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');

        $currency = CurrencyList::where('code', $this->home_currency)->first();

        HomeCurrency::create([
            'currency_id'   => $currency->id,
            'code'          => $currency->code,
            'symbol'        => $currency->symbol,
            'exchange_rate' => 1
        ]);

        Config::set("database.connections.mysql", [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => 'ngo',
            'username' => config('database.connections.mysql.username'),
            'password' => config('database.connections.mysql.password'),
        ]);
        DB::purge('mysql');
    }
}
