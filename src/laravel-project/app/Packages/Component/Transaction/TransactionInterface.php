<?php

declare(strict_types=1);

namespace App\Packages\Component\Transaction;

use Closure;

interface TransactionInterface
{
    /**
     * 引数で受け取ったClosureに対してトランザクションを張る
     *
     * @param Closure $transactionScope
     * @return mixed
     */
    public function scope(Closure $transactionScope): mixed;
}