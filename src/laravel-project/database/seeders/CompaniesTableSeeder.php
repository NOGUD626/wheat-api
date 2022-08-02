<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = array(
            [
                'id'=> 'C-62e74c9ad22ad',
                'name'=> 'CPSLAB',
                'address'=> '東京都足立区千住旭町5番 11F 11108',
                'status_id'=> '1',
            ],
            [
                'id'=> 'C-62e74c9ad22b0',
                'name'=> 'Wheat',
                'address'=> '東京都足立区千住2丁目18 為靜ビル2F',
                'status_id'=> '1',
            ],
        );

        DB::table('companies')->insert($companies);
    }
}
