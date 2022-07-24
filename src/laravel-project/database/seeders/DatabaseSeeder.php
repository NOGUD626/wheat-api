<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $form = DB::connection('mongodb')->collection('form');
        dd($form->insert([
            'from' => 'Jane Doe',
            'message' => 'Hi John',
        ]));
        
        // $this->call(RolesTableSeeder::class);
        // $this->call(StatusTypeTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(CompaniesTableSeeder::class); 
        // $this->call(StaffTableSeeder::class);

    }
}
