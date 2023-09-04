<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Artisan;

class DBConfigMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $db_name = 'ngo';
        if(auth()->user()->companies != null){

            $companies = json_decode(auth()->user()->companies);
            foreach ($companies as $company) {
                if(auth()->user()->current_company == $company->id){
                    $db_name = $company->db_name;
                    break;
                }
            }
        }
        Config::set("database.connections.mysql", [
                'driver' => 'mysql',
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => $db_name,
                'username' => config('database.connections.mysql.username'),
                'password' => config('database.connections.mysql.password'),
            ]);
        DB::purge('mysql');
        if($db_name == 'ngo_Unc') return response()->json('Your account is inactive');
        
        return $next($request);
    }
}
