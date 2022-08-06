<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(StatusTypeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class); 
        $this->call(StaffTableSeeder::class);
        $this->call(FormsTableSeeder::class);
        $this->call(LinebotConfigTableSeeder::class);
    }
}
