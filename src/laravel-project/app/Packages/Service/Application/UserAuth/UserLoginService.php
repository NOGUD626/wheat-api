<?php

namespace App\Packages\Service\Application\UserAuth;

use App\Packages\Repository\Application\UserAuth\UserLoginRepositoryInterface;

class UserLoginService implements UserLoginServiceInterface
{
    private $userLoginRepository;

    public function __construct(
        UserLoginRepositoryInterface $userLoginRepository
    ){
        $this->userLoginRepository = $userLoginRepository;
    }

    /**
     * 案件を全件取得する
     *
     * @return Boolean
     */
    public function getExistUser(String $firebaseId):void
    {
        $this->userLoginRepository->getExistUser($firebaseId);
    }
}
