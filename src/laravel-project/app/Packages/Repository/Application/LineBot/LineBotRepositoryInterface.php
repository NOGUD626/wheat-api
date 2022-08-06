<?php

namespace App\Packages\Repository\Application\LineBot;

use App\Packages\Repository\Model\LineBot\LineBotSecretDataModel;

interface LineBotRepositoryInterface
{
    /**
     * パスの企業情報に応じてLineBOTの設定を返す
     * @param string companyパスコード
     * @return LineBotSecretDataModel Botのシークレット情報
     */
    public function getLineBotToken(String $companyPath): LineBotSecretDataModel;
}