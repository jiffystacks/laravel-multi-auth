<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time_stamp = Carbon::now()->toDateTimeString();
        DB::table('roles')->insert([
            [
                'name'=> 'super-admin', 
                'created_at' => $time_stamp,
                'updated_at' => $time_stamp,
            ],
            [
                'name'=> 'admin', 
                'created_at' => $time_stamp,
                'updated_at' => $time_stamp,
            ],
            [
                'name'=> 'buyer', 
                'created_at' => $time_stamp,
                'updated_at' => $time_stamp,
            ],
            [
                'name'=> 'seller', 
                'created_at' => $time_stamp,
                'updated_at' => $time_stamp,
            ],
            [
                'name'=> 'driver', 
                'created_at' => $time_stamp,
                'updated_at' => $time_stamp,
            ]
        ]);
    }
}
