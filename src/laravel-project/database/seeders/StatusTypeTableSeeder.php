<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTypeTableSeeder extends Seeder
{

    public function run()
    {
        $status = array(
            ['flag'=> true],
            ['flag'=> false]
        );

        DB::table('status_type')->insert($status);
    }
}
