<?php

use Illuminate\Support\Facades\Route;



    


/**
 * Route Plans
 */
    Route::prefix('admin')
                ->namespace('Admin')
                ->middleware('auth')
                ->group(function() {



        /**
         * Roles x User
         */

        Route::get('users/{id}/role/{idRole}/detach', 'ACL\RoleUserController@detachRolesUser')->name('users.role.detach');
        Route::post('users/{id}/roles', 'ACL\RoleUserController@attachRolesUser')->name('users.roles.attach');
        Route::any('users/{id}/roles/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available');
        Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');
        Route::get('role/{id}/users', 'ACL\RoleUserController@users')->name('roles.users');

         /**
         * Permission x Role
         */

        Route::get('roles/{id}/premission/{idPermission}/detach', 'ACL\PermissionRoleController@detachPermissionsRole')->name('roles.permissions.detach');
        Route::post('roles/{id}/premissions', 'ACL\PermissionRoleController@attachPermissionsRole')->name('roles.permissions.attach');
        Route::any('roles/{id}/premissions/create', 'ACL\PermissionRoleController@permissionsAvailable')->name('roles.permissions.available');
        Route::get('roles/{id}/premissions', 'ACL\PermissionRoleController@permissions')->name('roles.permissions');
        Route::get('premissions/{id}/role', 'ACL\PermissionRoleController@roles')->name('permissions.roles');

         /**
         * Routes Profiles 
         */

        Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search');
        Route::resource('roles', 'ACL\RoleController');


        /**
         * Routes Tenants 
         */

        Route::any('tenants/search', 'TenantController@search')->name('tenants.search');
        Route::resource('tenants', 'TenantController');

         /**
         * Routes Tables 
         */

        Route::any('tables/search', 'TableController@search')->name('tables.search');
        Route::resource('tables', 'TableController');

         /**
         * product x Category
         */

         Route::get('products/{id}/category/{idCategory}/detach', 'CategoryProductController@detachCategoryProduct')->name('products.category.detach');
         Route::post('products/{id}/categories', 'CategoryProductController@attachCategoriesProduct')->name('products.categories.attach');
         Route::any('products/{id}/categories/create', 'CategoryProductController@categoriesAvailable')->name('products.categories.available');
         Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');
         Route::get('categories/{id}/products', 'CategoryProductController@products')->name('categories.products');

        /**
         * Routes Users 
         */

        Route::any('users/search', 'UserController@search')->name('users.search');
        Route::resource('users', 'UserController');


        /**
         * Routes Products 
         */

        Route::any('products/search', 'ProductController@search')->name('products.search');
        Route::resource('products', 'ProductController');


        /**
         * Routes Categories
         */

        Route::any('categories/search', 'CategoryController@search')->name('categories.search');
        Route::resource('categories', 'CategoryController');

        /**
         * Plans x Profile
         */

         Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profile.detach');
         Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
         Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
         Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
         Route::get('Profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');

        /**
         * Permission x Profile
         */

         Route::get('profiles/{id}/premission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfille')->name('profiles.permissions.detach');
         Route::post('profiles/{id}/premissions', 'ACL\PermissionProfileController@attachPermissionsProfille')->name('profiles.permissions.attach');
         Route::any('profiles/{id}/premissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
         Route::get('profiles/{id}/premissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
         Route::get('premissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

        /**
         * Routes Profiles 
         */

         Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
         Route::resource('permissions', 'ACL\PermissionController');

        /**
         * Routes Profiles 
         */

         Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
         Route::resource('profiles', 'ACL\ProfileController');

        /**
         * Routes Details Plans
         */
        Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
        Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
        Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
        Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
        Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
        Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
        Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');


        Route::get('plans/create', 'PlanController@create')->name('plans.create');
        Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
        Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
        Route::any('plans/search', 'PlanController@search')->name('plans.search');
        Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
        Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
        Route::post('plans', 'PlanController@store')->name('plans.store');
        Route::get('plans', 'PlanController@index')->name('plans.index');

    /**
     * Home Dashboard
     */
    Route::get('/', 'PlanController@index')->name('admin.index');
});

/**
 * Site
 */
Route::get('/plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');

/**
 * Auth Routes
 */
Auth::routes();
