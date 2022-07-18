<?php

namespace App\Packages\Repository\Application\UserAuth;

use Illuminate\Support\Facades\DB;
use App\Packages\Repository\Model\UserAuth\ComponeyListModel;
use App\Models\User;

class UserLoginRepository implements UserLoginRepositoryInterface
{
    public function getExistUser(String $firebaseId): bool
    {
        $excistFlag = DB::table('users')
            ->where('uid', $firebaseId)
            ->exists();

        return $excistFlag;
    }

    public function getAffiliationList(String $firebaseId): array
    {
        $companyList = DB::table('staff')
            ->leftjoin('users', 'staff.user_id', '=', 'users.id')
            ->leftjoin('companies', 'staff.company_id', '=', 'companies.id')
            ->leftjoin('status_type', 'status_type.id', '=', 'companies.status_id')
            ->where('users.uid', $firebaseId)
            ->where('status_type.flag', true)
            ->select('companies.id', 'companies.name', 'companies.address', 'companies.created_at')
            ->get()->toArray();

        return array_map(
            function ($company): ComponeyListModel {
                return new ComponeyListModel(
                    $company->id,
                    $company->name,
                    $company->address,
                    $company->created_at
                );
            },
            $companyList
        );
    }

    public function getUser(String $firebaseId): User
    {
        $user = User::where('uid', '=', $firebaseId)->first();

        return $user;
    }

    public function getAbility(String $firebaseId): array
    {
        $user_str = User::where('uid', '=', $firebaseId)->first()->role->grant;
        $role = explode(',', $user_str);
        return $role;
    }
}
