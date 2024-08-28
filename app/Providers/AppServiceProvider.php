<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \Backpack\PermissionManager\app\Http\Controllers\UserCrudController::class, // package controller
            \App\Http\Controllers\Admin\UserCrudController::class // the controller using CrudPermissionTrait
        );
        $this->app->bind(
            \Backpack\PermissionManager\app\Http\Controllers\RoleCrudController::class, // package controller
            \App\Http\Controllers\Admin\RoleCrudController::class // the controller using CrudPermissionTrait
        );
        $this->app->bind(
            \Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController::class, // package controller
            \App\Http\Controllers\Admin\PermissionCrudController::class // the controller using CrudPermissionTrait
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->overrideConfigValues();
    }

    protected function overrideConfigValues()
    {
        $config = [];
        if (config('settings.show_powered_by')) {
            $config['backpack.ui.show_powered_by'] = config('settings.show_powered_by') == '1';
        }
        config($config);
    }
}
