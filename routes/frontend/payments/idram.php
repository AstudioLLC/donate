<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('payments/idram/success', 'Site\Payments\IdramController@success')->name('payment.idram.success');
Route::get('payments/idram/failed', 'Site\Payments\IdramController@failed')->name('payment.idram.failed');
Route::post('payments/idram/result', 'Site\Payments\IdramController@result')->name('payment.idram.result');

