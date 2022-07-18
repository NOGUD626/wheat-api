<?php

namespace App\Packages\Service\Application\UserAuth;

use App\Packages\Repository\Application\UserAuth\UserLoginRepositoryInterface;
use App\Packages\Repository\Model\UserAuth\ComponeyListModel as ComponeyListRepositoryModel;
use App\Packages\Service\Model\UserAuth\ComponeyListModel as ComponeyListServiceModel;
use Laravel\Sanctum\NewAccessToken;

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

    public function getAffiliationList(String $firebaseId): array
    {
        $companyList = $this->userLoginRepository->getAffiliationList($firebaseId);

        return array_map(
            function (ComponeyListRepositoryModel $company): ComponeyListServiceModel {
                return new ComponeyListServiceModel(
                    $company->getCompanyId(),
                    $company->getCompanyName(),
                    $company->getCompanyAddress(),
                    $company->getCreatedAt()
                );
            },
            $companyList
        );
    }

    public function getAccessToken(String $firebaseId):string
    {
        $user = $this->userLoginRepository->getUser($firebaseId);
        $role = $this->userLoginRepository->getAbility($firebaseId);

        $token = $user->createToken($firebaseId,$role)->plainTextToken;

        return $token;
    }
}
