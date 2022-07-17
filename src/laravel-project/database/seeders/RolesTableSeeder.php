<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = array(
            ['name'=> 'developer'],
            ['name'=>'admin'],
            ['name'=>'user']
        );

        DB::table('roles')->insert($role);
    }
}
