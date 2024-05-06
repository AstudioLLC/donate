<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('payments/arca/success', 'Site\Payments\ArcaController@success')->name('payment.arca.success');
Route::get('payments/arca/failed', 'Site\Payments\ArcaController@failed')->name('payment.arca.failed');
Route::get('payments/arca/result', 'Site\Payments\ArcaController@result')->name('payment.arca.result');

