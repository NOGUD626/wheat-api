<?php

namespace App\Packages\Service\Application\LineBot;

use LINE\LINEBot;
use LINE\LINEBot\Event\BaseEvent;
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use Illuminate\Http\Request;
use App\Packages\Repository\Application\LineBot\LineBotRepositoryInterface;
use App\Packages\Service\Model\LineBot\LineBotSecretDataModel;
use Illuminate\Support\Facades\Log;

class LineBotConfigurationService implements LineBotConfigurationServiceInterface
{
    public function __construct(
        LineBotRepositoryInterface $lineBotRepository
    ) {
        $this->lineBotRepository = $lineBotRepository;
    }

    /**
     * LINE Botのシークレット情報とアクセストークン
     *
     * @param string 会社毎に発行したパス
     * @return array
     */
    public function getLineBotSecret(String $companyPath): LineBotSecretDataModel
    {
        $LineBotToken = $this->lineBotRepository->getLineBotToken($companyPath);
        return new LineBotSecretDataModel(
            $LineBotToken->getChannelAcceccToken(),
            $LineBotToken->getChannelSecret()
        );
    }

    /**
     * LINEの署名確認
     *
     * @param Request
     * @return void
     * @throws HttpException
     */
    public function validateSignature(Request $request, String $channelSecre): void
    {
        // リクエストヘッダーについてくる実際の署名
        $signature = $request->header('X-Line-Signature');
        if ($signature === null) {
            abort(400);
        }

        // LINEチャネルシークレットとリクエストボディを基に署名を生成
        $hash = hash_hmac('sha256', $request->getContent(), $channelSecre, true);
        $expect_signature = base64_encode($hash);

        // 実際の署名と生成した署名が同じであれば検証OK
        if (!hash_equals($expect_signature, $signature)) {
            abort(400);
        }
    }

    /**
     * LINEの署名確認
     *
     * @param LineBotSecretDataModel LineBotのシークレット情報
     * @return LINEBot botオブジェクト
     */
    public function getLineBotObject(LineBotSecretDataModel $lineBotSecretData): LINEBot
    {
        $httpClient =  new CurlHTTPClient($lineBotSecretData->getChannelAcceccToken());
        $bot = new LINEBot($httpClient, ['channelSecret' => $lineBotSecretData->getChannelSecret()]);
        return $bot;
    }

    /**
     * LINEのEvent処理
     *
     * @param LINEBot LINE BOTオブジェクト
     * @param Request
     * @return void
     * https://qiita.com/KoeInoue/items/3e65a90144518118ffac
     */
    public function parseEventRequest(LINEBot $bot, Request $request): void
    {
        $events = $bot->parseEventRequest($request->getContent(), $request->header('X-Line-Signature'));

        foreach ($events as $event) {
            // $line_user_id = $event->getUserId();

            switch (true) {
                    //友達登録＆ブロック解除
                case $event instanceof LINEBot\Event\FollowEvent:
                    break;
                    //メッセージの受信
                case $event instanceof LINEBot\Event\MessageEvent\TextMessage:
                    $this->LineBotMessageEventProcess($bot, $event);
                    break;
                    //位置情報の受信
                case $event instanceof LINEBot\Event\MessageEvent\LocationMessage:
                    break;
                    //選択肢とか選んだ時に受信するイベント
                case $event instanceof LINEBot\Event\PostbackEvent:
                    break;
                    //ブロック
                case $event instanceof LINEBot\Event\UnfollowEvent:
                    break;
                default:
                    $body = $event->getEventBody();
                    logger()->warning('Unknown event. [' . get_class($event) . ']', compact('body'));
            }
        }
    }

    private function LineBotMessageEventProcess(LINEBot $bot, BaseEvent $event): void
    {
        $mesage = $event->getText();
        $reply_token = $event->getReplyToken();
        
        $bot->replyText($reply_token, $mesage);
    }
}
