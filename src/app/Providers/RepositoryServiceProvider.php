<?php

namespace App\Providers;

use App\Repositories\Auth\Permission\PermissionRepository;
use App\Repositories\Auth\Permission\PermissionRepositoryEloquent;
use App\Repositories\Auth\Role\RoleRepository;
use App\Repositories\Auth\Role\RoleRepositoryEloquent;
use App\Repositories\Auth\User\UserRepository;
use App\Repositories\Auth\User\UserRepositoryEloquent;
use App\Repositories\Macro\MacroRepository;
use App\Repositories\Macro\MacroRepositoryEloquent;
use App\Repositories\File\FileRepository;
use App\Repositories\File\FileRepositoryEloquent;
use App\Repositories\Script\ScriptRepository;
use App\Repositories\Script\ScriptRepositoryEloquent;
use App\Repositories\Settings\SettingRepository;
use App\Repositories\Settings\SettingRepositoryEloquent;
use App\Repositories\Actions\ActionRepository;
use App\Repositories\Actions\ActionRepositoryEloquent;
use App\Repositories\Address\AddressRepository;
use App\Repositories\Address\AddressRepositoryEloquent;
use App\Repositories\News\NewsRepository;
use App\Repositories\News\NewsRepositoryEloquent;
use App\Repositories\Payment\PaymentRepository;
use App\Repositories\Payment\PaymentRepositoryEloquent;
use App\Repositories\Rates\RateRepository;
use App\Repositories\Rates\RateRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            PermissionRepository::class,
            PermissionRepositoryEloquent::class
        );
        $this->app->bind(
            RoleRepository::class,
            RoleRepositoryEloquent::class
        );
        $this->app->bind(
            UserRepository::class,
            UserRepositoryEloquent::class
        );
        $this->app->bind(
            MacroRepository::class,
            MacroRepositoryEloquent::class
        );
        $this->app->bind(
            FileRepository::class,
            FileRepositoryEloquent::class
        );
        $this->app->bind(
            FileRepository::class,
            FileRepositoryEloquent::class
        );
        $this->app->bind(
            ScriptRepository::class,
            ScriptRepositoryEloquent::class
        );
        $this->app->bind(
            SettingRepository::class,
            SettingRepositoryEloquent::class
        );
        $this->app->bind(
            ActionRepository::class,
            ActionRepositoryEloquent::class
        );
        $this->app->bind(
            RateRepository::class,
            RateRepositoryEloquent::class
        );

        $this->app->bind(
            PaymentRepository::class,
            PaymentRepositoryEloquent::class
        );
        $this->app->bind(
            AddressRepository::class,
            AddressRepositoryEloquent::class
        );
        $this->app->bind(
            NewsRepository::class,
            NewsRepositoryEloquent::class
        );
        //:end-bindings:
    }

}