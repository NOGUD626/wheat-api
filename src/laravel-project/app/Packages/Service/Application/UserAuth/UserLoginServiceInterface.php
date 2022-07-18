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
     * ユーザの所属している会社のリストを返す
     * @param string firebaseのユーザID
     * @return void
     */
    public function getAffiliationList(String $firebaseId): array;

    /**
     * ユーザ認証用のアクセストークンを返す
     * @param string firebaseのユーザID
     * @return void
     */
    public function getAccessToken(String $firebaseId): string;
}