<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('information')->name('information.')->group(function (Router $router) {
    $controller = 'InformationController@';
    //$router->get('list', $controller . 'index')->name('index')->middleware('check-permission:content');
    //$router->get('add', $controller . 'create')->name('create')->middleware('check-permission:content');
    //$router->post('store', $controller . 'store')->name('store')->middleware('check-permission:content');
    $router->get('show/{id}', $controller . 'show')->name('show')->middleware('check-permission:content');
    $router->get('edit/{id}', $controller . 'edit')->name('edit')->middleware('check-permission:content');
    $router->put('edit/{id}', $controller . 'update')->name('update')->middleware('check-permission:content');
    //$router->delete('delete/{id?}', $controller . 'destroy')->name('delete')->middleware('check-permission:content');

    //$router->post('active/{id}', $controller . 'active')->name('active')->middleware('check-permission:content');
    //$router->delete('deleteImage', $controller . 'deleteImage')->name('deleteImage')->middleware('check-permission:content');
    //$router->patch('sort', $controller . 'sort')->name('sort')->middleware('check-permission:content');
});
