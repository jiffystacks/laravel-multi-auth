<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class UsertypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usertypes')->truncate();
        $faker = Factory::create();
        DB::table('usertypes')->insert([
            [
                'type'=> 'buyer', 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ],
            [
                'type'=> 'seller', 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]
        ]);
    }
}
