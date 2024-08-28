<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Can;


// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),


    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');

    Route::crud('book', 'BookCrudController');
    Route::crud('author', 'AuthorCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('publisher', 'PublisherCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('permission', 'PermissionCrudController');
}); // this should be the absolute last line of this file



// Route::group([
//     'prefix' => config('backpack.base.route_prefix', 'admin'),
//     'middleware' => array_merge(
//         (array) config('backpack.base.web_middleware', 'web'),
//         (array) config('backpack.base.middleware_key', 'admin'),
//         ['role:admin']
//     ),
//     'middleware' => 'role:admin',

//     'namespace' => 'App\Http\Controllers\Admin',
// ], function () { // custom admin routes
//     Route::crud('user', 'UserCrudController');
// });


/**
 * DO NOT ADD ANYTHING HERE.
 */
