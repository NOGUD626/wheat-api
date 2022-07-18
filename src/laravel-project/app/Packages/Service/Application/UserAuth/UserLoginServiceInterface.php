<?php

namespace App\Packages\Service\Application\UserAuth;

interface UserLoginServiceInterface
{
    /**
     * ユーザがDB内に存在するかを返す
     * @param string firebaseのユーザID
     * @return boolean 存在するかのステータスフラグ
     */
    public function getExistUser(String $firebaseId): bool;

    /**
     * ユーザがDB内に存在するかを返す
     * @param string firebaseのユーザID
     * @return void
     */
    public function getAffiliationList(String $firebaseId): void;
}