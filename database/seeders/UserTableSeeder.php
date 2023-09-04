<?php

namespace Database\Seeders;

// use App\Models\Psycho\Psychologist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Zone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $role = (new Role()) -> where('name', 'abar tarnegar') -> first();
        $user = (new User()) -> where('name', 'admin') -> first();
        // $zone=(new Zone())->get(['id']);

        if (!$user) {
            $user = User:: create([
                'name'     => 'admin',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('password'),
                'setting'  => '[
                                    {
                                        "name": "Order",
                                        "data": [
                                            {
                                                "section": "fields",
                                                "values": [
                                                    {
                                                        "name": "organization",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "from_date",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "to_date",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "project",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "currency",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "exchange_rate",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "reference_number",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "description",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "grant_total",
                                                        "value": true
                                                    }
                                                ]
                                            },
                                            {
                                                "section": "table",
                                                "values": [
                                                    {
                                                        "name": "no",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "item",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "quantity",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "price",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "total",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "action",
                                                        "value": true
                                                    }
                                                ]
                                            }
                                        ]
                                    },
                                    {
                                        "name": "Invoice",
                                        "data": [
                                            {
                                                "section": "fields",
                                                "values": [
                                                    {
                                                        "name": "invoice_number",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "organization",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "date",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "project",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "currency",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "exchange_rate",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "vol_rep",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "purpose",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "description",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "sub_total",
                                                        "value": true
                                                    }
                                                ]
                                            },
                                            {
                                                "section": "table",
                                                "values": [
                                                    {
                                                        "name": "no",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "date",
                                                        "value": false
                                                    },
                                                    {
                                                        "name": "location",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "description",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "household",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "amount",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "service_fee_percent",
                                                        "value": false
                                                    },
                                                    {
                                                        "name": "service_fee_amount",
                                                        "value": false
                                                    },
                                                    {
                                                        "name": "total",
                                                        "value": true
                                                    },
                                                    {
                                                        "name": "action",
                                                        "value": true
                                                    }
                                                ]
                                            }
                                        ]
                                    }
                                ]',
                'type'  => 'main',
                // 'setting'  => "[{\"name\":\"Order\",\"data\":[{\"section\":\"fields\",\"values\":[{\"name\":\"organization\",\"value\":true},{\"name\":\"from_date\",\"value\":true},{\"name\":\"to_date\",\"value\":true},{\"name\":\"project\",\"value\":true},{\"name\":\"currency\",\"value\":true},{\"name\":\"exchange_rate\",\"value\":true},{\"name\":\"reference_number\",\"value\":true},{\"name\":\"description\",\"value\":true}]},{\"section\":\"table\",\"values\":[{\"name\":\"no\",\"value\":true},{\"name\":\"item\",\"value\":true},{\"name\":\"quantity\",\"value\":true},{\"name\":\"prcie\",\"value\":true},{\"name\":\"total\",\"value\":true},{\"name\":\"action\",\"value\":true}]}]},{\"name\":\"Invoice\",\"data\":[{\"section\":\"fields\",\"values\":[{\"name\":\"organization\",\"value\":true},{\"name\":\"date\",\"value\":true},{\"name\":\"project\",\"value\":true},{\"name\":\"currency\",\"value\":true},{\"name\":\"exchange_rate\",\"value\":true},{\"name\":\"vol_rep\",\"value\":true},{\"name\":\"invoice_number\",\"value\":true},{\"name\":\"description\",\"value\":true}]},{\"section\":\"table\",\"values\":[{\"name\":\"no\",\"value\":true},{\"name\":\"item\",\"value\":true},{\"name\":\"quantity\",\"value\":true},{\"name\":\"location\",\"value\":true},{\"name\":\"house\",\"value\":true},{\"name\":\"amount\",\"value\":true},{\"name\":\"commission\",\"value\":true},{\"name\":\"service_free_percent\",\"value\":true},{\"name\":\"service_free_amount\",\"value\":true},{\"name\":\"total\",\"value\":true},{\"name\":\"action\",\"value\":true}]}]}]"
            ]);
            if ($role && $user) {
                $user -> roles() -> attach($role -> id, ['id' => Str:: uuid() -> toString()]);
            }
        }

    }
}
