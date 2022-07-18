<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Packages\Component\Transaction\TransactionInterface;
use App\Packages\Component\Transaction\DbTransaction;

// Service
use App\Packages\Service\Application\UserAuth\UserLoginService;
use App\Packages\Service\Application\UserAuth\UserLoginServiceInterface;

// Repository

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TransactionInterface::class, DbTransaction::class);
        $this->app->bind(UserLoginServiceInterface::class, UserLoginService::class);
        
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
