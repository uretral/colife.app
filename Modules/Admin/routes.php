<?php

use Modules\Admin\Controllers\Exchange\BitrixDataSetController;
use Modules\Admin\Controllers\Exchange\BitrixEntityController;
use Modules\Admin\Controllers\Exchange\BitrixFieldsController;
use Modules\Admin\Controllers\Roles\PermissionController;
use Modules\Admin\Controllers\Roles\RoleController;


use Modules\Admin\Controllers\Users\UserController;
use Illuminate\Routing\Router;

use Modules\Admin\Routes\TenantAdminRoutes;
use \Modules\Admin\Routes\MyAdminRoutes;

Route::domain(config('app.domain_admin'))->group(function () {

    Admin::routes();

    Route::group(
        [
            'prefix' => config('admin.route.prefix'),
            'namespace' => config('admin.route.namespace'),
            'middleware' => config('admin.route.middleware'),
            'as' => config('admin.route.prefix') . '.',
        ],
        function (Router $router) {


            #Система
            Route::group(['prefix' => 'auth'], function () use ($router) {
                $router->resource('locale', \Modules\Admin\Controllers\LocaleController::class);
                $router->resource('countries', \Modules\Admin\Controllers\CountryController::class);
                $router->resource('menus', \Modules\Admin\Controllers\MenuController::class);
            });


            $router->get('/', [UserController::class, 'index'])->name('home');
            $router->resource('/users', UserController::class);
            $router->resource('/roles', RoleController::class);
            $router->resource('/permissions', PermissionController::class);

            #Узнать на предмет актуальности
            $router->resource('/bitrix/entities', BitrixEntityController::class);
            $router->resource('/bitrix/dataset', BitrixDataSetController::class);
            $router->resource('/bitrix/fields', BitrixFieldsController::class);

            TenantAdminRoutes::handle($router);
            MyAdminRoutes::handle($router);


        });

});
