<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Packages\Service\Application\UserAuth\UserLoginServiceInterface;

class UserLoginController extends Controller
{
    private $userLoginService;

    public function __construct(
        UserLoginServiceInterface $userLoginService
    ){
        $this->userLoginService = $userLoginService;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $firebaseId = $request->firebaseId;

        if(!$this->userLoginService->getExistUser($firebaseId)){
    
            return response()->json(
                ['message' => 'Unauthorized'],
                Response::HTTP_UNAUTHORIZED
            );

        }

        $this->userLoginService->getAffiliationList($firebaseId);

        exit();
    }
}