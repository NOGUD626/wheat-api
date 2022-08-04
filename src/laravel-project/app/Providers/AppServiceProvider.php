<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Packages\Component\Transaction\TransactionInterface;
use App\Packages\Component\Transaction\DbTransaction;

// Service
use App\Packages\Service\Application\UserAuth\UserLoginService;
use App\Packages\Service\Application\UserAuth\UserLoginServiceInterface;
use App\Packages\Service\Application\Form\FormSchemaService;
use App\Packages\Service\Application\Form\FormSchemaServiceInterface;

// Repository
use App\Packages\Repository\Application\UserAuth\UserLoginRepository;
use App\Packages\Repository\Application\UserAuth\UserLoginRepositoryInterface;
use App\Packages\Repository\Application\Form\FormSchemaRepository;
use App\Packages\Repository\Application\Form\FormSchemaRepositoryInterface;

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
        $this->app->bind(UserLoginRepositoryInterface::class, UserLoginRepository::class);
        $this->app->bind(FormSchemaServiceInterface::class, FormSchemaService::class);
        $this->app->bind(FormSchemaRepositoryInterface::class, FormSchemaRepository::class);
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
