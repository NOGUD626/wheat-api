<?php

namespace App\Packages\Repository\Model\LineBot;

class LineBotSecretDataModel
{
    protected $channelAcceccToken;
    protected $channelSecret;

    public function __construct(
        string $channelAcceccToken,
        string $channelSecret
    ) {
        $this->channelAcceccToken=$channelAcceccToken;
        $this->channelSecret=$channelSecret;
    }

    /**
     * @return string
     */
    public function getChannelAcceccToken(): string
    {
        return $this->channelAcceccToken;
    }

    /**
     * @return string
     */
    public function getChannelSecret(): string
    {
        return $this->channelSecret;
    }

}