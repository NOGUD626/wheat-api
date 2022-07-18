<?php

namespace App\Packages\Repository\Application\UserAuth;

use Illuminate\Support\Facades\DB;

class UserLoginRepository implements UserLoginRepositoryInterface
{
    public function getExistUser(String $firebaseId): bool
    {
        $excistFlag = DB::table('users')
        ->where('uid', $firebaseId)
        ->exists();
        
        return $excistFlag;
    }
}
