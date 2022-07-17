<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Kreait\Laravel\Firebase\Facades\Firebase;

class UserController extends Controller
{

    public function __construct()
    {
        $this->auth = Firebase::auth();
    }

    public function __invoke(Request $request)
    {
        $idTokenString = $request->headers->get('authorization');
        $token = trim(str_replace('Bearer', '', $idTokenString));
    
        try {
            $verifiedIdToken = $this->auth->verifyIdToken($token);
        } catch (FailedToVerifyToken $e) {
            echo 'The token is invalid: '.$e->getMessage();
        }
        $uid = $verifiedIdToken->claims()->get('sub');
        
        dd($verifiedIdToken->claims());
        exit();

        return '{data:"data"}';
    }
} 