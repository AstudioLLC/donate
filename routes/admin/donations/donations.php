<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('donations')->name('donations.')->group(function (Router $router) {
    $controller = 'DonationsController@';

    $router->get('list', $controller . 'index')->name('index')->middleware('check-permission:superadmin|moderator|accountant');
    $router->post('listPortion', $controller . 'listPortion')->name('listPortion')->middleware('check-permission:superadmin|moderator|accountant');
    $router->post('addYearFilterToSession', $controller . 'addYearFilterToSession')->name('addYearFilterToSession')->middleware('check-permission:superadmin|moderator|accountant');
    $router->post('addMonthFilterToSession', $controller . 'addMonthFilterToSession')->name('addMonthFilterToSession')->middleware('check-permission:superadmin|moderator|accountant');
    $router->post('addGiftFilterToSession', $controller . 'addGiftFilterToSession')->name('addGiftFilterToSession')->middleware('check-permission:superadmin|moderator|accountant');
    $router->post('addFundraiserToSession', $controller . 'addFundraiserToSession')->name('addFundraiserToSession')->middleware('check-permission:superadmin|moderator|accountant');
    $router->post('addFailedToSession', $controller . 'addFailedToSession')->name('addFailedToSession')->middleware('check-permission:superadmin|moderator|accountant');
    $router->post('addChildToSession', $controller . 'addChildToSession')->name('addChildToSession')->middleware('check-permission:superadmin|moderator|accountant');
    $router->post('updateAjax/{id}', $controller . 'updateAjax')->name('updateAjax')->middleware('check-permission:superadmin|moderator|accountant');

    $router->get('exportExcel', $controller . 'exportExcel')->name('exportExcel')->middleware('check-permission:superadmin|moderator|accountant');
    /*$router->get('add', $controller . 'create')->name('create');
    $router->post('store', $controller . 'store')->name('store');*/

    $router->get('show/{id}', $controller . 'show')->name('show')->middleware('check-permission:superadmin|moderator');
    $router->get('edit/{id}', $controller . 'edit')->name('edit')->middleware('check-permission:superadmin|moderator');
    $router->put('edit/{id}', $controller . 'update')->name('update')->middleware('check-permission:superadmin|moderator');
    $router->delete('delete/{id?}', $controller . 'destroy')->name('delete')->middleware('check-permission:superadmin|moderator');
    $router->patch('restore/{id}', $controller . 'restore')->name('restore')->middleware('check-permission:superadmin|moderator');

    $router->post('status/{id}', $controller . 'status')->name('status')->middleware('check-permission:superadmin|moderator');
    $router->post('binding/{id}', $controller . 'binding')->name('binding')->middleware('check-permission:superadmin|moderator');
    $router->delete('deleteImage', $controller . 'deleteImage')->name('deleteImage')->middleware('check-permission:superadmin|moderator');
    $router->patch('sort', $controller . 'sort')->name('sort')->middleware('check-permission:superadmin|moderator');

    $router->get('only-trashed', $controller . 'onlyTrashed')->name('onlyTrashed')->middleware('check-permission:superadmin|moderator');
    $router->delete('forceDelete/{id?}', $controller . 'forceDestroy')->name('forceDelete')->middleware('check-permission:superadmin|moderator');
});
