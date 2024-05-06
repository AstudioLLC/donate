<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('gifts' . '/{url}', 'Site\GiftsController@detail')
    ->name('gifts.detail');
Route::get('gift/make' . '/{url}', 'Site\GiftsController@create')
    ->name('gifts.create');

Route::get('/gifts/{url}/create-step1', 'Site\GiftsController@createStep1')->name('gifts.create.step1');
Route::post('/gifts/{url}/create-step1', 'Site\GiftsController@postCreateStep1')->name('gifts.create.step1');

Route::get('/gifts/{url}/create-step2', 'Site\GiftsController@createStep2')->name('gifts.create.step2');
Route::post('/gifts/{url}/create-step2', 'Site\GiftsController@postCreateStep2')->name('gifts.create.step2');

Route::get('/gifts/{url}/create-step3', 'Site\GiftsController@createStep3')->name('gifts.create.step3');
Route::post('/gifts/{url}/create-step3', 'Site\GiftsController@postCreateStep3')->name('gifts.create.step3');



/*Route::group(['prefix' => 'cabinet', 'middleware' => ['logged_in']], function () {
    Route::middleware(['emailVerified'])->group(function () {

    });
});*/
