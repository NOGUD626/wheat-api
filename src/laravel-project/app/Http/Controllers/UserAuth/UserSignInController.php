<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserSignInController extends Controller
{
    public function __construct()
    {
        $this->middleware('firebase');
    }

    public function __invoke(Request $request): JsonResponse
    {
        $firebaseId = $request->firebaseId;
        $email = $request->email;
        $name = $request->name;

        $user = User::where('uid', $firebaseId);

        if ($user->get()->isEmpty()) {

            $user = new User();
            $user->name = $name;
            $user->uid = $firebaseId;
            $user->email = $email;
            $user->role_id = 1;
            $user->status_id = 1;
            $user->save();

            return response()->json(
                ['message' => 'Completion of registration'],
                Response::HTTP_CREATED
            );
        };

        return response()->json(
            ['message' => 'Already registered'],
            Response::HTTP_OK
        );
    }
}