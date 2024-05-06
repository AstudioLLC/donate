<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('pages')->name('pages.')->group(function (Router $router) {
    $controller = 'PagesController@';
    $router->get('list/{parentId?}', $controller . 'index')->name('index')->middleware('check-permission:content');
    $router->get('add/{parentId?}', $controller . 'create')->name('create')->middleware('check-permission:content');
    $router->post('store', $controller . 'store')->name('store')->middleware('check-permission:content');
    $router->get('show/{id}', $controller . 'show')->name('show')->middleware('check-permission:content');
    $router->get('edit/{id}', $controller . 'edit')->name('edit')->middleware('check-permission:content');
    $router->put('edit/{id}', $controller . 'update')->name('update')->middleware('check-permission:content');
    $router->delete('delete/{id?}', $controller . 'destroy')->name('delete')->middleware('check-permission:content');
    $router->patch('restore/{id}', $controller . 'restore')->name('restore')->middleware('check-permission:content');

    $router->post('active/{id}', $controller . 'active')->name('active')->middleware('check-permission:content');
    $router->delete('deleteImage', $controller . 'deleteImage')->name('deleteImage')->middleware('check-permission:content');
    $router->patch('sort', $controller . 'sort')->name('sort')->middleware('check-permission:content');

    $router->get('only-trashed', $controller . 'onlyTrashed')->name('onlyTrashed')->middleware('check-permission:content');
    $router->delete('forceDelete/{id?}', $controller . 'forceDestroy')->name('forceDelete')->middleware('check-permission:content');
});
