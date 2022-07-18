<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('firebase');
    }

    public function __invoke(Request $request): JsonResponse
    {
        $firebaseId = $request->firebaseId;
        $email = $request->email;
        var_dump($firebaseId);
        var_dump($email);

        $response = [
            'firebase_id' => $firebaseId,
            'email' => $email,
        ];

        var_dump($response);

        return response()->json($response, Response::HTTP_CREATED);
    }
}