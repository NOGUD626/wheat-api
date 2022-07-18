<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Controllers\Controller;
use App\Packages\Service\Application\UserAuth\UserLoginServiceInterface;
use App\Packages\Service\Model\UserAuth\ComponeyListModel;

class UserLoginController extends Controller
{
    private $userLoginService;

    public function __construct(
        UserLoginServiceInterface $userLoginService
    ) {
        $this->userLoginService = $userLoginService;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $firebaseId = $request->firebaseId;

        if (!$this->userLoginService->getExistUser($firebaseId)) {

            return response()->json(
                ['message' => 'Unauthorized'],
                Response::HTTP_UNAUTHORIZED
            );
        }

        $companyList = $this->userLoginService->getAffiliationList($firebaseId);

        $companyList = array_map(
            function (ComponeyListModel $company) {
                return [
                    'id' => $company->getCompanyId(),
                    'name' => $company->getCompanyName(),
                    'address' => $company->getCompanyAddress(),
                    'created_at' => $company->getCreatedAt(),
                ];
            },
            $companyList
        );

        $token = $this->userLoginService->getAccessToken($firebaseId);

        return response()->json(
            [
                'company_list' => $companyList,
                'access-token' => $token
            ],
            Response::HTTP_OK
        );
    }
}
