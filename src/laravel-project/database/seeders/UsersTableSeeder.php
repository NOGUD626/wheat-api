<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            [
                'name'=> '野口大輝',
                'firebase_id'=> '0yOujnPA6wMCvxhRu5F6HOAXxFq2',
                'email'=> 'noguchi@nogu-lab.com',
                'role_id'=> '1',
                'status_id'=> '1',
            ]
        );

        DB::table('users')->insert($users);
    }
}
