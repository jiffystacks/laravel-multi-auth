<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $users = [];
        $faker = Factory::create();

        for($i=0; $i<=3; $i++){
            $email = 'buyer'.($i+1).'@demo.com';

        	$users[] = [
	    		'name' => $faker->name(),
                'email' => $email,
                'email_verified_at' => $faker->dateTime(),
	    		'password' => Hash::make('test@123'),
	    		'role' => 3,
	    		'created_at' => $faker->dateTime(),
	    		'updated_at' => $faker->dateTime(),
	    	];
		}
		
		for($i=0; $i<=3; $i++){
            $email = 'seller'.($i+1).'@demo.com';

        	$users[] = [
	    		'name' => $faker->name(),
                'email' => $email,
                'email_verified_at' => $faker->dateTime(),
	    		'password' => Hash::make('test@123'),
	    		'role' => 4,
	    		'created_at' => $faker->dateTime(),
	    		'updated_at' => $faker->dateTime(),
	    	];
        }

        DB::table('users')->insert($users);
    }
}