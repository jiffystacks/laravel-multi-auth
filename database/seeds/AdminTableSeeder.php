<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();

        $faker = Factory::create();

        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'password' => Hash::make('Admin@123'),
            'role' => 1,
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ]);
    }
}
