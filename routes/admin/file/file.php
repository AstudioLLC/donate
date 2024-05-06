<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('file')->name('file.')->group(function (Router $router) {
    $controller = 'FilesController@';
    $router->get('{file}/{key}', $controller . 'index')->name('index')->middleware('check-permission:content');
    $router->get('add/{file}/{key}', $controller . 'create')->name('create')->middleware('check-permission:content');
    $router->post('store/{file}/{key}', $controller . 'store')->name('store')->middleware('check-permission:content');
    $router->get('show/{file}/{key}/{id}', $controller . 'show')->name('show')->middleware('check-permission:content');
    $router->get('edit/{file}/{key}/{id}', $controller . 'edit')->name('edit')->middleware('check-permission:content');
    $router->put('edit/{file}/{key}/{id}', $controller . 'update')->name('update')->middleware('check-permission:content');
    $router->delete('delete/{id?}', $controller . 'destroy')->name('delete')->middleware('check-permission:content');

    $router->patch('sort', $controller . 'sort')->name('sort')->middleware('check-permission:content');

    $router->delete('forceDelete/{id?}', $controller . 'forceDestroy')->name('forceDelete')->middleware('check-permission:content');

    $router->post('deleteImage/{id}', $controller . 'deleteImage')->name('deleteImage')->middleware('check-permission:content');
    $router->post('deleteImageSmall/{id}', $controller . 'deleteImageSmall')->name('deleteImageSmall')->middleware('check-permission:content');
    $router->post('deleteFile/{id}', $controller . 'deleteFile')->name('deleteFile')->middleware('check-permission:content');

});
