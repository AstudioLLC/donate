<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*Route::namespace('Users')->prefix('retail-users')->name('retail-users.')->group(function (Router $router) {
    $c = 'RetailUsersController@';
    $router->get('', $c . 'index')->name('index');
    $router->post('listPortion', $c . 'listPortion')->name('listPortion');
});

Route::namespace('Users')->prefix('wholesale-users')->name('wholesale-users.')->group(function (Router $router) {
    $c = 'WholesaleUsersController@';
    $router->get('', $c . 'index')->name('index');
    $router->post('listPortion', $c . 'listPortion')->name('listPortion');
});

Route::prefix('users')->name('users.')->group(function (Router $router) {
            $c = 'UsersController@';

            $router->get('type/{role?}', $c . 'main')->name('main');
            $router->get('company/package/{id}', $c . 'packagesEdit')->name('package.edit');
            $router->post('company/package/submit/{id}', $c . 'packagesEditSubmit')->name('packages.submit');
            $router->get('magazine', $c . 'magazine')->name('view.magazine');
            $router->get('accept/{id}', $c . 'acceptEmail')->name('accept.email');
            $router->get('discount/{id}', $c . 'userDiscount')->name('discount');
            $router->get('view/{id}', $c . 'view')->name('view');
            $router->get('add/{type}', $c . 'addUserByType')->name('add');
            $router->post('add/{type}', $c . 'addUserByType')->name('add_put');
            $router->post('discount/add/{id}', $c . 'addDiscountToUser')->name('add.discount');
            $router->get('add/admins/{role}', $c . 'addAdminsByType')->name('add.admin');
            $router->post('add/admins/put/{role}', $c . 'addAdminsByType')->name('add_put.admin');
            $router->patch('toggle-active', $c . 'toggleActive')->name('toggleActive');
            $router->delete('delete', $c . 'delete')->name('delete');
        });
*/


Route::prefix('users')->name('users.')->group(function (Router $router) {
    $c = 'UsersController@';
    $router->get('', $c . 'index')->name('index');
    $router->post('listPortion', $c . 'listPortion')->name('listPortion');
    $router->get('accept/{id}', $c . 'acceptEmail')->name('accept.email');
    $router->get('discount/{id}', $c . 'userDiscount')->name('discount');
    $router->get('view/{id}', $c . 'view')->name('view');
    $router->post('discount/add/{id}', $c . 'addDiscountToUser')->name('add.discount');
    $router->get('add/admins/{role}', $c . 'addAdminsByType')->name('add.admin');
    $router->post('add/admins/put/{role}', $c . 'addAdminsByType')->name('add_put.admin');
    $router->patch('toggle-active', $c . 'toggleActive')->name('toggleActive');
    $router->delete('delete', $c . 'delete')->name('delete');
    $router->get('statistics', $c . 'statistics')->name('statistics');
});
