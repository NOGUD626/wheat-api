<?php

namespace App\Packages\Service\Application\UserAuth;

class UserLoginService implements UserLoginServiceInterface
{
    /**
     * 案件を全件取得する
     *
     * @return Boolean
     */
    public function getExistUser(String $firebaseId):void
    {
        echo 'hello';
    }
}
