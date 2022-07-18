<?php

namespace App\Packages\Service\Application\UserAuth;

interface UserLoginServiceInterface
{
    /**
     * ユーザがDB内に存在するかを返す
     *
     * @return boolean　
     */
    public function getExistUser(String $firebaseId): void;
}