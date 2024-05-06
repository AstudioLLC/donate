<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('bindings')->name('bindings.')->group(function (Router $router) {
    $controller = 'BindingsController@';
    $router->get('list', $controller . 'index')->name('index')->middleware('check-permission:content');
    $router->get('exportExcel', $controller . 'exportExcel')->name('exportExcel')->middleware('check-permission:superadmin|moderator|accountant');
    $router->post('selectchild/{id}', $controller . 'selectchild')->name('selectchild')->middleware('check-permission:admin');
    $router->delete('delete/{id?}', $controller . 'destroy')->name('delete')->middleware('check-permission:superadmin|moderator');
    $router->get('search', $controller . 'search')->name('search')->middleware('check-permission:admin');

    $router->post('active/{id}', $controller . 'active')->name('active')->middleware('check-permission:content');
});
