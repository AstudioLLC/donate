<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*Route::prefix('languages')->name('languages.')->group(function (Router $router) {
            $controller = 'LanguagesController@';
            $router->get('', $controller . 'main')->name('main');
            $router->patch('', $controller . 'editLanguage');
            $router->patch('sort', $controller . 'sort')->middleware('ajax')->name('sort')->middleware('admin:manager.admin');
});*/

Route::prefix('languages')->name('languages.')->group(function (Router $router) {
    $controller = 'LanguagesController@';
    $router->get('', $controller . 'index')->name('index')->middleware('check-permission:content');
    $router->get('add', $controller . 'create')->name('create')->middleware('check-permission:content');
    $router->post('store', $controller . 'store')->name('store')->middleware('check-permission:content');
    $router->get('show/{id}', $controller . 'show')->name('show')->middleware('check-permission:content');
    $router->get('edit/{id}', $controller . 'edit')->name('edit')->middleware('check-permission:content');
    $router->put('edit/{id}', $controller . 'update')->name('update')->middleware('check-permission:content');
    $router->delete('delete/{id}', $controller . 'destroy')->name('delete')->middleware('check-permission:content');
    //$router->delete('deleteImage', $controller . 'deleteImage')->name('deleteImage')->middleware('check-permission:content');
    $router->patch('sort', $controller . 'sort')->name('sort')->middleware('check-permission:content');

    $router->post('admin/{id}', $controller . 'admin')->name('admin')->middleware('check-permission:content');
    $router->post('url/{id}', $controller . 'url')->name('url')->middleware('check-permission:content');
    $router->post('default/{id}', $controller . 'default')->name('default')->middleware('check-permission:content');
    $router->post('active/{id}', $controller . 'active')->name('active')->middleware('check-permission:content');
});
