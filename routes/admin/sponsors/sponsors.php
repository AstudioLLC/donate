<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('children-sponsors')->name('sponsors.')->group(function (Router $router) {
    $controller = 'SponsorsController@';

    $router->get('list', $controller . 'index')->name('index')->middleware('check-permission:admin');
    $router->post('listPortion', $controller . 'listPortion')->name('listPortion')->middleware('check-permission:admin');
    $router->get('exportExcel', $controller . 'exportExcel')->name('exportExcel')->middleware('check-permission:admin');
    $router->get('add', $controller . 'create')->name('create')->middleware('check-permission:admin');
    $router->post('store', $controller . 'store')->name('store')->middleware('check-permission:admin');

    $router->get('show/{id}', $controller . 'show')->name('show')->middleware('check-permission:admin');
    $router->get('edit/{id}', $controller . 'edit')->name('edit')->middleware('check-permission:admin');
    $router->put('edit/{id}', $controller . 'update')->name('update')->middleware('check-permission:admin');
    $router->delete('delete/{id?}', $controller . 'destroy')->name('delete')->middleware('check-permission:admin');
    $router->patch('restore/{id}', $controller . 'restore')->name('restore')->middleware('check-permission:admin');
    $router->get('search', $controller . 'search')->name('search')->middleware('check-permission:admin');

    $router->post('active/{id}', $controller . 'active')->name('active')->middleware('check-permission:admin');

    $router->post('selecttype/{id}', $controller . 'selecttype')->name('selecttype')->middleware('check-permission:admin');
    $router->post('addTsSession', $controller . 'addTsSession')->name('addTsSession')->middleware('check-permission:superadmin|moderator|accountant');
    $router->post('addLsSession', $controller . 'addLsSession')->name('addLsSession')->middleware('check-permission:superadmin|moderator|accountant');


    $router->delete('deleteImage', $controller . 'deleteImage')->name('deleteImage')->middleware('check-permission:admin');
    $router->patch('sort', $controller . 'sort')->name('sort')->middleware('check-permission:admin');

    $router->get('only-trashed', $controller . 'onlyTrashed')->name('onlyTrashed')->middleware('check-permission:admin');
    $router->delete('forceDelete/{id?}', $controller . 'forceDestroy')->name('forceDelete')->middleware('check-permission:admin');
});
