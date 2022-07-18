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

    public function getAffiliationList(String $firebaseId): void
    {
        $companyList = DB::table('staff')
        ->leftjoin('users', 'staff.user_id', '=', 'users.id')
        ->leftjoin('companies', 'staff.company_id', '=', 'companies.id')
        ->select('companies.id','companies.name','companies.address');
        dd($companyList-> get());
        exit();
    }
}
