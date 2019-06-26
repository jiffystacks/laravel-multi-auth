<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class DriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drivers')->truncate();

        $drivers = [];
        $faker = Factory::create();

        for($i=0; $i<=3; $i++){
            $email = 'dp'.($i+1).'@demo.com';
        	$drivers[] = [
	    		'name' => $faker->name(),
                'phone' => $faker->e164PhoneNumber(),
                'password' => Hash::make('test@123'),
                'email' => $email,
                'role' => 5,
	    		'vehicle_no' => $faker->unique()->randomDigitNotNull,
	    		'created_at' => $faker->dateTime(),
	    		'updated_at' => $faker->dateTime(),
	    	];
		}


        DB::table('drivers')->insert($drivers);
    }
}
