<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'buyer.view'],
            ['name' => 'buyer.create'],
            ['name' => 'buyer.update'],
            ['name' => 'buyer.delete'],

            ['name' => 'seller.view'],
            ['name' => 'seller.create'],
            ['name' => 'seller.update'],
            ['name' => 'seller.delete'],

            ['name' => 'driver.view'],
            ['name' => 'driver.create'],
            ['name' => 'driver.update'],
            ['name' => 'driver.delete'],
        ];

        $insert_data = [];
        $time_stamp = Carbon::now()->toDateTimeString();
        foreach ($data as $d) {
            $d['created_at'] = $time_stamp;
            $insert_data[] = $d;
        }
        DB::table('permissions')->insert($insert_data);

        //Assign defult permission to user
        
        $perm = [
            //buyer permission
            ['role_id' => 3, 'permission_id' => 1],
            ['role_id' => 3, 'permission_id' => 2],
            ['role_id' => 3, 'permission_id' => 3],
            ['role_id' => 3, 'permission_id' => 4],
            ['role_id' => 3, 'permission_id' => 5],
            ['role_id' => 3, 'permission_id' => 9],

            //seller permission
            ['role_id' => 4, 'permission_id' => 5],
            ['role_id' => 4, 'permission_id' => 1],
            ['role_id' => 4, 'permission_id' => 6],
            ['role_id' => 4, 'permission_id' => 7],
            ['role_id' => 4, 'permission_id' => 8],
            ['role_id' => 4, 'permission_id' => 9],

            //driver permission
            ['role_id' => 5, 'permission_id' => 1],
            ['role_id' => 5, 'permission_id' => 5],
            ['role_id' => 5, 'permission_id' => 9],
            ['role_id' => 5, 'permission_id' => 10],
            ['role_id' => 5, 'permission_id' => 11],
            ['role_id' => 5, 'permission_id' => 12],
        ];

        DB::table('role_has_permissions')->insert($perm);
    }
}
