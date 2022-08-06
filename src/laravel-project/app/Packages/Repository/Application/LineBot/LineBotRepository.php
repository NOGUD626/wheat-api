<?php

namespace App\Packages\Repository\Application\LineBot;
use Illuminate\Support\Facades\DB;
use App\Packages\Repository\Model\LineBot\LineBotSecretDataModel;

class LineBotRepository implements LineBotRepositoryInterface
{
    public function getLineBotToken(String $companyPath):LineBotSecretDataModel
    {
        $lineBotConfig = DB::table('linebot_config')
            ->leftjoin('companies', 'linebot_config.company_id', '=', 'companies.id')
            ->where('linebot_config.url_path', $companyPath)
            ->select('*')
            ->first();

        return new LineBotSecretDataModel(
            $lineBotConfig->channel_accecc_token,
            $lineBotConfig->channel_secret,
        );
    }

}
