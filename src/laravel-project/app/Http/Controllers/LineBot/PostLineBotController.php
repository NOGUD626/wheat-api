<?php

namespace App\Http\Controllers\LineBot;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\LineBot\PostLineBotValidationRequest;
use App\Packages\Service\Application\LineBot\LineBotConfigurationServiceInterface;
use Illuminate\Support\Facades\Log;

class PostLineBotController extends Controller
{

    public function __construct(
        LineBotConfigurationServiceInterface $lineBotConfigurationService
    )
    {
        $this->lineBotConfigurationService = $lineBotConfigurationService;
    }

    public function __invoke(PostLineBotValidationRequest $request): JsonResponse
    {
        $company = $request->company;

        $lineBotSecretData = $this->lineBotConfigurationService->getLineBotSecret($company);

        $this->lineBotConfigurationService->validateSignature($request,$lineBotSecretData->getChannelSecret());

        $bot = $this->lineBotConfigurationService->getLineBotObject($lineBotSecretData);

        $this->lineBotConfigurationService->parseEventRequest($bot,$request);

        // $events = $bot->parseEventRequest($request->getContent(), $request->header('x-line-signature'));


        // $request->collect('events')->each(function ($event) use($bot) {
        //     $bot->replyText($event['replyToken'], $event['message']['text']);
        // });

        return response()->json(
            [],
            Response::HTTP_OK
        );
    }
}
