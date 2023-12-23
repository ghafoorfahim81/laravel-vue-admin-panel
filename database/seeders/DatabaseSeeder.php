<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
                PermissionsTableSeeder::class,
                RolesTableSeeder::class,
                UsersTableSeeder::class,
            ]
        );
//        Artisan::call('app:fetch-hr-data');
//        DB::table('doc_types')->insert([
//            [
//                'name' => 'عریضه',
//                'slug' => 'requisition',
//                'created_at' => Carbon::now()
//            ],
//            [
//                'name' => 'مکتوب',
//                'slug' => 'letter',
//                'created_at' => Carbon::now()
//            ],
//            [
//                'name' => 'پیشنهاد',
//                'slug' => 'suggestion',
//                'created_at' => Carbon::now()
//            ],
//        ]);


    }
}
