<?php

namespace App\Http\Middleware;

use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Illuminate\Http\Exceptions\HttpResponseException;

class Firebase
{
    private Auth $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, \Closure $next)
    {
        $idTokenString = $request->headers->get('authorization');
        $token = trim(str_replace('Bearer', '', $idTokenString));

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($token);
        } catch (FailedToVerifyToken $e) {;
            $response = response()->json([
                'status' => 'The token is invalid'
            ], 401);
            throw new HttpResponseException($response);
        }

        $firebaseId = $verifiedIdToken->claims()->get('sub');
        $email = $verifiedIdToken->claims()->get('email');
        $name =  $verifiedIdToken->claims()->get('name');

        $request->merge([
            'firebaseId' => $firebaseId,
            'email' => $email,
            'name' => $name,
        ]);

        return $next($request);
    }
}
