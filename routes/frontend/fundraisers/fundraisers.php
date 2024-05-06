<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('fundraisers' . '/{url}', 'Site\FundraisersController@detail')
    ->name('fundraisers.detail');


Route::get('fundraisers/make' . '/{url}', 'Site\FundraisersController@create')->name('fundraisers.create');

Route::get('/fundraisers/{url}/create-step1', 'Site\FundraisersController@createStep1')->name('fundraisers.create.step1');
Route::post('/fundraisers/{url}/create-step1', 'Site\FundraisersController@postCreateStep1')->name('fundraisers.create.step1');

Route::get('/fundraisers/{url}/create-step2', 'Site\FundraisersController@createStep2')->name('fundraisers.create.step2');
Route::post('/fundraisers/{url}/create-step2', 'Site\FundraisersController@postCreateStep2')->name('fundraisers.create.step2');

Route::get('/fundraisers/{url}/create-step3', 'Site\FundraisersController@createStep3')->name('fundraisers.create.step3');
Route::post('/fundraisers/{url}/create-step3', 'Site\FundraisersController@postCreateStep3')->name('fundraisers.create.step3');


/*Route::group(['prefix' => 'cabinet', 'middleware' => ['logged_in']], function () {
    Route::middleware(['emailVerified'])->group(function () {

    });
});*/
