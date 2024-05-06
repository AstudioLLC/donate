<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('administrators')->name('administrators.')->group(function (Router $router) {
    $controller = 'AdministratorsController@';

    $router->get('list', $controller . 'index')->name('index')->middleware('check-permission:superadmin');
    $router->post('listPortion', $controller . 'listPortion')->name('listPortion')->middleware('check-permission:superadmin');
    $router->get('add', $controller . 'create')->name('create')->middleware('check-permission:superadmin');
    $router->post('store', $controller . 'store')->name('store')->middleware('check-permission:superadmin');

    $router->get('show/{id}', $controller . 'show')->name('show')->middleware('check-permission:superadmin');
    $router->get('edit/{id}', $controller . 'edit')->name('edit')->middleware('check-permission:superadmin');
    $router->put('edit/{id}', $controller . 'update')->name('update')->middleware('check-permission:superadmin');
    $router->delete('delete/{id?}', $controller . 'destroy')->name('delete')->middleware('check-permission:superadmin');
    //$router->patch('restore/{id}', $controller . 'restore')->name('restore')->middleware('check-permission:superadmin');

    $router->post('active/{id}', $controller . 'active')->name('active')->middleware('check-permission:superadmin');
    //$router->delete('deleteImage', $controller . 'deleteImage')->name('deleteImage')->middleware('check-permission:superadmin');
    //$router->patch('sort', $controller . 'sort')->name('sort')->middleware('check-permission:superadmin');

    //$router->get('only-trashed', $controller . 'onlyTrashed')->name('onlyTrashed')->middleware('check-permission:superadmin');
    //$router->delete('forceDelete/{id?}', $controller . 'forceDestroy')->name('forceDelete')->middleware('check-permission:superadmin');
});
