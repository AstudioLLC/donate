<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('chat')->name('chat.')->group(function (Router $router) {
    $controller = 'ChatController@';
    $router->get('list/{childrenId?}/{sponsorId?}', $controller . 'index')->name('index')->middleware('check-permission:admin');
    $router->get('add/{childrenId?}/{sponsorId?}', $controller . 'create')->name('create')->middleware('check-permission:admin');
    $router->post('store/{childrenId}/{sponsorId}', $controller . 'store')->name('store')->middleware('check-permission:admin');
    $router->get('show/{childrenId}/{sponsorId}', $controller . 'show')->name('show')->middleware('check-permission:admin');
    $router->get('edit/{childrenId}/{sponsorId}', $controller . 'edit')->name('edit')->middleware('check-permission:admin');
    $router->put('edit/{id}', $controller . 'update')->name('update')->middleware('check-permission:admin');
    $router->delete('delete/{id?}', $controller . 'destroy')->name('delete')->middleware('check-permission:admin');
    $router->patch('restore/{id}', $controller . 'restore')->name('restore')->middleware('check-permission:admin');

    $router->post('active/{id}', $controller . 'active')->name('active')->middleware('check-permission:admin');
    $router->delete('deleteImage', $controller . 'deleteImage')->name('deleteImage')->middleware('check-permission:admin');
    $router->patch('sort', $controller . 'sort')->name('sort')->middleware('check-permission:admin');

    $router->get('only-trashed', $controller . 'onlyTrashed')->name('onlyTrashed')->middleware('check-permission:admin');
    $router->delete('forceDelete/{id?}', $controller . 'forceDestroy')->name('forceDelete')->middleware('check-permission:admin');
});
