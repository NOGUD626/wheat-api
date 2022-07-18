<?php

namespace App\Packages\Component\Transaction;

use Closure;
use Illuminate\Support\Facades\DB;

class DbTransaction implements TransactionInterface
{
    public function scope(Closure $transactionScope): mixed
    {
        return DB::transaction($transactionScope);
    }
}