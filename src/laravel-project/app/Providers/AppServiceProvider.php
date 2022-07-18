<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Packages\Component\Transaction\TransactionInterface;
use App\Packages\Component\Transaction\DbTransaction;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TransactionInterface::class, DbTransaction::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
