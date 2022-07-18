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

    public function getExistUser(String $firebaseId):bool
    {
        return $this->userLoginRepository->getExistUser($firebaseId);
    }

    public function getAffiliationList(String $firebaseId): void
    {
        dd($this->userLoginRepository->getAffiliationList($firebaseId));
    }
}
