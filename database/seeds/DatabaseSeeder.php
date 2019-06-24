<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsertypesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(DriverTableSeeder::class);
    }
}
