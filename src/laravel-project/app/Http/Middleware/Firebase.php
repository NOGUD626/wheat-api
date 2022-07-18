<?php

namespace App\Http\Middleware;

use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

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
        } catch (FailedToVerifyToken $e) {
            echo 'The token is invalid: '.$e->getMessage();
        }

        $firebaseId = $verifiedIdToken->claims()->get('sub');
        $email = $verifiedIdToken->claims()->get('email');

        $request->merge([
            'firebaseId' => $firebaseId,
            'email' => $email,
        ]);

        return $next($request);
    }
}
