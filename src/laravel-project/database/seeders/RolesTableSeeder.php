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
        $developer = [
            'user/read',
            'user/write',
            'form/read',
            'form/write',
            'form/delete',
            'form/update'
        ];
        $developer_csv = implode(',', $developer);

        $admin = [
            'user/read', 
            'user/write',
            'form/read',
            'form/write',
            'form/delete',
            'form/update'
        ];
        $admin_csv = implode(',', $admin);

        $user = ['user/read'];
        $user_csv = implode(',', $user);

        $role = array(
            ['name' => 'developer', 'grant' => $developer_csv],
            ['name' => 'admin', 'grant' => $admin_csv],
            ['name' => 'user', 'grant' => $user_csv]
        );

        DB::table('roles')->insert($role);
    }
}
