<?php

namespace App\Packages\Service\Application\LineBot;

use LINE\LINEBot;
use Illuminate\Http\Request;
use App\Packages\Service\Model\LineBot\LineBotSecretDataModel;

interface LineBotConfigurationServiceInterface
{
    /**
     * LINE Botのシークレット情報とアクセストークン
     *
     * @param string 会社毎に発行したパス
     * @return array Botのシークレット情報
     */
    public function getLineBotSecret(String $companyPath): LineBotSecretDataModel;

    /**
     * LINEの署名確認
     *
     * @param Request
     * @return void
     * @throws HttpException
     */
    public function validateSignature(Request $request,String $channelSecre): void;

    /**
     * LINEの署名確認
     *
     * @param LineBotSecretDataModel LineBotのシークレット情報
     * @return LINEBot
     */
    public function getLineBotObject(LineBotSecretDataModel $lineBotSecretData): LINEBot;

    /**
     * LINEのEvent処理
     *
     * @param LINEBot LINE BOTオブジェクト
     * @param Request
     * @return void
     */
    public function parseEventRequest(LINEBot $bot,Request $request): void;
}