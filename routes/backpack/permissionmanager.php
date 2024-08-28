<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Can;

Route::group([
    'namespace'  => 'App\Http\Controllers\Admin', // the new namespace
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', 'admin', backpack_middleware()],
], function () {
    // the adapted controllers
    Route::crud('user', 'UserCrudController');
    // Route::crud('role', 'RoleCrudController');
});
Route::group([
    'namespace'  => '\Backpack\PermissionManager\app\Http\Controllers', // the original namespace
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', 'admin', backpack_middleware()],
], function () {
    // to original controllers
    // not modified yet in this example
    Route::crud('permission', 'PermissionCrudController');
    Route::crud('role', 'RoleCrudController');
});
