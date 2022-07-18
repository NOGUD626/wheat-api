<?php

namespace App\Packages\Repository\Application\UserAuth;

interface UserLoginRepositoryInterface
{
    /**
     * ユーザがDB内に存在するかを返す
     * @param string firebaseのユーザID
     * @return boolean 存在するかのステータスフラグ
     */
    public function getExistUser(String $firebaseId): bool;
}