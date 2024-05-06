<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('videos')->name('videos.')->group(function (Router $router) {
    $controller = 'VideosController@';
    $router->get('{video}/{key}', $controller . 'index')->name('index')->middleware('check-permission:content');
    $router->get('add/{video}/{key}', $controller . 'create')->name('create')->middleware('check-permission:content');
    $router->post('store/{video}/{key}', $controller . 'store')->name('store')->middleware('check-permission:content');
    $router->get('show/{video}/{key}/{id}', $controller . 'show')->name('show')->middleware('check-permission:content');
    $router->get('edit/{video}/{key}/{id}', $controller . 'edit')->name('edit')->middleware('check-permission:content');
    $router->put('edit/{video}/{key}/{id}', $controller . 'update')->name('update')->middleware('check-permission:content');
    $router->delete('delete/{id?}', $controller . 'destroy')->name('delete')->middleware('check-permission:content');

    $router->delete('deleteImage', $controller . 'deleteImage')->name('deleteImage')->middleware('check-permission:content');
    $router->patch('sort', $controller . 'sort')->name('sort')->middleware('check-permission:content');

    $router->delete('forceDelete/{id?}', $controller . 'forceDestroy')->name('forceDelete')->middleware('check-permission:content');
});
