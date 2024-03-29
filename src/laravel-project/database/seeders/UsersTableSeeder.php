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
                'id' => 'U-62e74a8b33397',
                'name'=> '野口大輝',
                'firebase_id'=> '0yOujnPA6wMCvxhRu5F6HOAXxFq2',
                'email'=> 'noguchi@nogu-lab.com',
                'role_id'=> '1',
                'status_id'=> '1',
            ],
            [
                'id' => 'U-62ee84dd2944e',
                'name'=> 'tsukasa kumeta',
                'firebase_id'=> 'A09athBrMbTTsMRxz584VgVGZk93',
                'email'=> 'kumeta@cps.im.dendai.ac.jp',
                'role_id'=> '1',
                'status_id'=> '1',
            ]
        );

        DB::table('users')->insert($users);
    }
}
