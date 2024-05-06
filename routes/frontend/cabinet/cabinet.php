<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cabinet', 'middleware' => ['logged_in']], function () {
//    Route::middleware(['emailVerified','verified'])->group(function () {
        //Route::get('home', 'Site\Cabinet\HomeController@index')->name('cabinet.home.index');
        Route::get('home', 'Site\Cabinet\HomeController@index')->name('cabinet.home.index');
        Route::get('sponsorship', 'Site\Cabinet\SponsorshipController@index')->name('cabinet.sponsorship.index');
        Route::get('profile/settings', 'Site\Cabinet\ProfileController@settings')->name('cabinet.profile.settings');
        Route::get('notification', 'Site\Cabinet\NotificationController@index')->name('cabinet.notification.index');
        Route::get('donations', 'Site\Cabinet\DonationsController@index')->name('cabinet.donations.index');
        Route::get('fundraisers', 'Site\Cabinet\FundraisersController@index')->name('cabinet.fundraisers.index');
        Route::get('fundraisers/create', 'Site\Cabinet\FundraisersController@create')->name('cabinet.fundraisers.create');

        Route::post('profile/settings/updateUserInfo', 'Site\Cabinet\ProfileController@updateUserInfo')->name('cabinet.profile.updateUserInfo');
        Route::post('profile/settings/updateUserPassword', 'Site\Cabinet\ProfileController@updateUserPassword')->name('cabinet.profile.updateUserPassword');
        /**
         * Cabinet Sponsor card unread elements
         **/
        Route::post('report/seen/{key?}', 'Site\Cabinet\ProfileController@seen')->name('report.seen');
        Route::post('video/seen/{key?}', 'Site\Cabinet\ProfileController@videoseen')->name('video.seen');
        Route::post('photo/seen/{key?}', 'Site\Cabinet\ProfileController@photoseen')->name('photo.seen');
        Route::post('social/seen/{key?}', 'Site\Cabinet\ProfileController@socialstoryseen')->name('socialstory.seen');
        Route::post('donation/seen/{key?}', 'Site\Cabinet\ProfileController@donationseen')->name('donation.seen');
        Route::post('donation/all/seen', 'Site\Cabinet\NotificationController@donationallseen')->name('donation.all.seen');

        /**
         * Chat
         */
        Route::get('chat/{childrenId}/{sponsorId}', 'Site\Cabinet\ChatController@index')->name('cabinet.chat.index');
        Route::post('chat/store/{childrenId}/{sponsorId}', 'Site\Cabinet\ChatController@store')->name('cabinet.chat.store');

        /**
         * Sponsorship steps
         */
        Route::get('/sponsorship/create-step1', 'Site\Cabinet\SponsorshipController@createStep1')->name('cabinet.sponsorship.create.step1');
        Route::post('/sponsorship/create-step1', 'Site\Cabinet\SponsorshipController@postCreateStep1')->name('cabinet.sponsorship.create.step1');

        Route::get('/sponsorship/create-step2', 'Site\Cabinet\SponsorshipController@createStep2')->name('cabinet.sponsorship.create.step2');
        Route::post('/sponsorship/create-step2', 'Site\Cabinet\SponsorshipController@postCreateStep2')->name('cabinet.sponsorship.create.step2');

        Route::get('/sponsorship/create-step3', 'Site\Cabinet\SponsorshipController@createStep3')->name('cabinet.sponsorship.create.step3');
        Route::post('/sponsorship/create-step3', 'Site\Cabinet\SponsorshipController@postCreateStep3')->name('cabinet.sponsorship.create.step3');




        /**
         * Cabinet Donate steps
         */

        Route::get('/donate/create-step1/{id?}', 'Site\Cabinet\DonateController@createStep1')->name('cabinet.donate.create.step1');
        Route::post('/donate/create-step1', 'Site\Cabinet\DonateController@postCreateStep1')->name('cabinet.donate.create.step1');

        Route::get('/donate/create-step2', 'Site\Cabinet\DonateController@createStep2')->name('cabinet.donate.create.step2');
        Route::post('/donate/create-step2', 'Site\Cabinet\DonateController@postCreateStep2')->name('cabinet.donate.create.step2');

        Route::get('/donate/create-step3', 'Site\Cabinet\DonateController@createStep3')->name('cabinet.donate.create.step3');
        Route::post('/donate/create-step3', 'Site\Cabinet\DonateController@postCreateStep3')->name('cabinet.donate.create.step3');


        /*Route::get('profile/settings', 'Site\Cabinet\ProfileController@settings')->name('cabinet.profile.settings');
        Route::post('/user/messages', 'Site\Cabinet\UserMessagesController@add')->name('cabinet.userMessages');
        Route::post('profile/settings/update', 'Site\Cabinet\ProfileController@updateUserInfo')->name('cabinet.profile.updateUserInfo');
        Route::get('profile/support', 'Site\Cabinet\ProfileController@support')->name('cabinet.profile.support');
        Route::get('profile/favorites', 'Site\Cabinet\ProfileController@favorites')->name('cabinet.profile.favorite');
        Route::post('payment', 'Site\Cabinet\PaymentController@payment')->name('cabinet.payment');
        Route::get('paymentCheck', 'Site\Cabinet\PaymentController@paymentCheck')->name('cabinet.paymentCheck');
        //Route::post('profile/reviews/add', 'Site\Cabinet\ReviewsController@add')->name('user.review.add');
        Route::get('profile/orders/history', 'Site\Cabinet\ProfileController@ordersHistory')->name('cabinet.profile.orders.history');
        Route::get('profile/orders/active', 'Site\Cabinet\ProfileController@activeOrders')->name('cabinet.profile.orders.active');
        Route::get('orders/pending', 'Site\Cabinet\OrdersController@pending')->name('cabinet.orders.pending');
        Route::get('orders/create', 'Site\Cabinet\OrdersController@createOrder')->name('cabinet.order.create');
        Route::post('orders/submit', 'Site\Cabinet\OrdersController@submitOrder')->name('cabinet.order.submit');
        Route::get('orders/accepted', 'Site\Cabinet\OrdersController@accepted')->name('cabinet.orders.accepted');
        Route::get('orders/declined', 'Site\Cabinet\OrdersController@declined')->name('cabinet.orders.declined');
        Route::get('order/{id}', 'Site\Cabinet\OrdersController@order')->name('cabinet.order');*/
//    });
    /*Route::any('phone/set', 'Site\Cabinet\ProfileController@setPhone')->name('cabinet.phoneVerification.setPhone');
    Route::get('phone/verify', 'Site\Cabinet\ProfileController@showPhoneVerify')->name('cabinet.phoneVerification.notice');
    Route::post('phone/verify', 'Site\Cabinet\ProfileController@verify')->name('cabinet.phoneVerification.verify');

    Route::post('phone/change/code', 'Site\Cabinet\ProfileController@sendPhoneChangingCode')->name('cabinet.phoneVerification.sendPhoneChangingCode');
    Route::post('phone/change', 'Site\Cabinet\ProfileController@phoneChange')->name('cabinet.phoneVerification.change');

    Route::post('email/change/code', 'Site\Cabinet\ProfileController@sendEmailChangingCode')->name('cabinet.emailVerification.sendEmailChangingCode');
    Route::post('email/change', 'Site\Cabinet\ProfileController@emailChange')->name('cabinet.emailVerification.change');

    Route::get('email/notice', 'Site\Cabinet\ProfileController@showEmailVerify')->name('cabinet.emailVerification.notice');
    Route::post('email/resend', 'Site\Cabinet\ProfileController@resendVerificationEmail')->name('cabinet.emailVerification.resend');

    Route::get('favorites/list', 'Site\Cabinet\FavoritesController@getFavorites')->name('user.favorite.get');
    Route::post('favorites/add', 'Site\Cabinet\FavoritesController@add')->name('user.favorite.add');
    Route::delete('favorites/remove', 'Site\Cabinet\FavoritesController@destroy')->name('user.favorite.destroy');*/

    Route::post('logout', 'Site\Auth\LoginController@logout')->name('user.logout');

});
