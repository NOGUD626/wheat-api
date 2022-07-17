<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff = array(
            [
                'company_id'=> 1,
                'user_id'=> 1,
            ],
            [
                'company_id'=> 2,
                'user_id'=> 1,
            ]
        );

        DB::table('staff')->insert($staff);
    }
}
