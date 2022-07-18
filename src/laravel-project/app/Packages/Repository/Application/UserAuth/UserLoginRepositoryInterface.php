<?php

namespace App\Packages\Repository\Application\UserAuth;

use App\Models\User;

interface UserLoginRepositoryInterface
{
    /**
     * ユーザがDB内に存在するかを返す
     * @param string firebaseのユーザID
     * @return boolean 存在するかのステータスフラグ
     */
    public function getExistUser(String $firebaseId): bool;

    /**
     * ユーザの所属している会社のリストを返す
     * @param string firebaseのユーザID
     * @return array
     */
    public function getAffiliationList(String $firebaseId): array;

    /**
     * ユーザ型を返す
     * @param string firebaseのユーザID
     * @return User
     */
    public function getUser(String $firebaseId): User;

    /**
     * 文字列を返す
     * @param string firebaseのユーザID
     * @return string
     */
    public function getAbility(String $firebaseId): array;
}
