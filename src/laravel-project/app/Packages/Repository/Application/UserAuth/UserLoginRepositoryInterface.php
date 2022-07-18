<?php

namespace App\Packages\Repository\Application\UserAuth;

interface UserLoginRepositoryInterface
{
    /**
     * ユーザがDB内に存在するかを返す
     * @param string
     * @return boolean　
     */
    public function getExistUser(String $firebaseId): void;
}