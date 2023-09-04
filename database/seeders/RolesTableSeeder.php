<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // role table
        $r=(new Role())->where('name','abar tarnegar')->first();
        if(!$r)
        {
            $r=Role::create([
                'name'=>'abar tarnegar'
            ]);

            foreach(Permission::all() AS $key=>$value)
            {
                $r->permissions()->attach($value, ['id' => Str::uuid()->toString()]);
            }
        }
 
    }
}
