<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinebotConfigTableSeeder extends Seeder
{
    public function run()
    {
        $config = array(
            [
                'company_id'=> 'C-62e74c9ad22ad',
                'url_path'=> 'f662ecb4f0a7b8c',
                'channel_accecc_token'=> 'w5+lVb5tItohaa08Nck0hktxYq2s4jjp5S7ETnBo6v7DYui/j3l5zpC9x/M8Uimqb5NVowLsUeUMfZEsAZTfA4aMNbYzKXCBvX+tKoSmJob4GBUZX3dn12arZAjnccniFCFyL4qAkfDbTjSL0lCPLwdB04t89/1O/w1cDnyilFU=',
                'channel_secret'=> '1449d6a8a8dbeec4eebad46107998c80'
            ],
        );

        DB::table('linebot_config')->insert($config);
    }
}
