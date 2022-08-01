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
                'company_id'=> 'C-62e74c9ad22ad',
                'user_id'=> 'U-62e74a8b33397',
            ],
            [
                'company_id'=> 'C-62e74c9ad22b0',
                'user_id'=> 'U-62e74a8b33397',
            ]
        );

        DB::table('staff')->insert($staff);
    }
}
