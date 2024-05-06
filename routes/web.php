<?php

use App\Services\LanguageManager\Facades\LanguageManager;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/linkstorage', function () {
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('storage:link');
    Artisan::call('optimize:clear');

});*/

//Route::get('/cron',function (){
//    Artisan::call('schedule:run');
//});
/** New Routes for front */
require __DIR__.'/frontend/frontend.php';
/** New Routes for front */

// Route::any('filemanager/upload', function () {
//     abort(500);
// });
// Route::any('filemanager', function () {
//     abort(500);
// });


Route::group(['prefix' => LanguageManager::getPrefix(), 'middleware' => 'languageManager'], function () {
    Route::post('login', 'Site\Auth\LoginController@login')->name('login.post');
    //Route::post('order', 'Site\ProductsController@order')->name('order');
    Route::post('register', 'Site\Auth\RegisterController@register')->name('register.post');
    Route::post('reset', 'Site\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset/{email}/{token}', 'Site\Auth\ResetPasswordController@reset')->name('password.update');
//    Route::get('verifyEmail/{email}/{token}', 'Site\Auth\RegisterController@verifyEmail')->name('verification.email');
    Route::get('/user/verify/{token}', 'Site\Auth\RegisterController@verifyUser');
    //Route::post('send-mail', 'Site\AppController@sendMail')->name('contacts.send_mail');
});

/*Route::get('basket/all', 'Site\Cabinet\BasketController@basket')->name('cabinet.basket.all');
Route::get('basket/list', 'Site\Cabinet\BasketController@getBasketItems')->name('cabinet.basket.get');
Route::post('basket/add', 'Site\Cabinet\BasketController@add')->name('cabinet.basket.add');
Route::put('basket/update', 'Site\Cabinet\BasketController@update')->name('cabinet.basket.update');
Route::delete('basket/remove', 'Site\Cabinet\BasketController@delete')->name('cabinet.basket.delete');*/

Route::group(['prefix' => LanguageManager::getPrefix(), 'middleware' => 'languageManager'], function () {
    /** Auth */
    //Route::get('smallBasket/list', 'Site\Cabinet\BasketController@getSmallBasket')->name('cabinet.basket.getSmallBasket');
    Route::get('login', 'Site\Auth\LoginController@showLoginForm')
        ->name('login');
    Route::get('sp-login', 'Site\Auth\LoginController@showSpLoginForm')
        ->name('sp-login');
    Route::get('register', 'Site\Auth\RegisterController@showRegistrationForm')
        ->name('register');
    Route::get('reset', 'Site\Auth\ForgotPasswordController@showLinkRequestForm')
        ->name('password.request');
    Route::get('password/reset/{email}/{token}', 'Site\Auth\ResetPasswordController@showResetForm')
        ->name('password.reset');
    /** End Auth */

    Route::get('/verification-is-send','Site\Auth\RegisterController@verifyForCabinet')->name('verifyforCabinet');
    Route::get('search', 'Site\SearchController@index')
        ->name('search');

    Route::get('{url?}', 'Site\StaticPagesController@pageManager')
        ->name('page');

    Route::get('news' . '/{url}', 'Site\NewsController@detail')
        ->name('news.detail');
    Route::get('our-publication' . '/{url}', 'Site\OurPublicationController@detail')
        ->name('our.publication.detail');
    Route::get('success-stories' . '/{url}', 'Site\SuccessStoriesController@detail')
        ->name('success_stories.detail');

    Route::get('faq' . '/{url}', 'Site\FaqsController@detail')
        ->name('faq.detail');



    /**
     * Page forms
     */
    Route::post('volunteering/send-message', 'Site\InnerController@sendVolunteeringMessage')
        ->name('volunteering.send_message');

    Route::post('contact/send-message', 'Site\InnerController@sendContactMessage')
        ->name('contact.send_message');

    /**
     * Add Subscriber
     */
    Route::post('subscriber/create', 'Site\InnerController@addSubscriber')
        ->name('subscriber.create');




    /**
     * Donate steps
     */

    Route::post('/create-step1', 'Site\DonateController@postCreateStep1')->name('donate.create.step1');

    Route::get('/donate/create-step2', 'Site\DonateController@createStep2')->name('donate.create.step2');
    Route::post('/donate/create-step2', 'Site\DonateController@postCreateStep2')->name('donate.create.step2');

    Route::get('/donate/create-step3', 'Site\DonateController@createStep3')->name('donate.create.step3');
    Route::post('/donate/create-step3', 'Site\DonateController@postCreateStep3')->name('donate.create.step3');









    require __DIR__.'/frontend/fundraisers/fundraisers.php';
    require __DIR__.'/frontend/gifts/gifts.php';
    require __DIR__.'/frontend/cabinet/cabinet.php';
    require __DIR__.'/frontend/payments/idram.php';
    require __DIR__.'/frontend/payments/arca.php';

    /*Route::group(['prefix' => 'cabinet', 'middleware' => ['logged_in']], function () {
        Route::middleware(['emailVerified'])->group(function () {
            Route::get('profile/settings', 'Site\Cabinet\ProfileController@settings')->name('cabinet.profile.settings');
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
            Route::get('order/{id}', 'Site\Cabinet\OrdersController@order')->name('cabinet.order');
        });
        //Route::any('phone/set', 'Site\Cabinet\ProfileController@setPhone')->name('cabinet.phoneVerification.setPhone');
        //Route::get('phone/verify', 'Site\Cabinet\ProfileController@showPhoneVerify')->name('cabinet.phoneVerification.notice');
        //Route::post('phone/verify', 'Site\Cabinet\ProfileController@verify')->name('cabinet.phoneVerification.verify');

        //Route::post('phone/change/code', 'Site\Cabinet\ProfileController@sendPhoneChangingCode')->name('cabinet.phoneVerification.sendPhoneChangingCode');
        //Route::post('phone/change', 'Site\Cabinet\ProfileController@phoneChange')->name('cabinet.phoneVerification.change');

        Route::post('email/change/code', 'Site\Cabinet\ProfileController@sendEmailChangingCode')->name('cabinet.emailVerification.sendEmailChangingCode');
        Route::post('email/change', 'Site\Cabinet\ProfileController@emailChange')->name('cabinet.emailVerification.change');

        Route::get('email/notice', 'Site\Cabinet\ProfileController@showEmailVerify')->name('cabinet.emailVerification.notice');
        Route::post('email/resend', 'Site\Cabinet\ProfileController@resendVerificationEmail')->name('cabinet.emailVerification.resend');

        Route::get('favorites/list', 'Site\Cabinet\FavoritesController@getFavorites')->name('user.favorite.get');
        Route::post('favorites/add', 'Site\Cabinet\FavoritesController@add')->name('user.favorite.add');
        Route::delete('favorites/remove', 'Site\Cabinet\FavoritesController@destroy')->name('user.favorite.destroy');

        Route::post('logout', 'Site\Auth\LoginController@logout')->name('user.logout');

    });*/


    /*Route::get('products/getPortion', 'Site\ItemsController@getPortion')
        ->name('product.getPortion');
    Route::get('products/getPriceRange', 'Site\ItemsController@getPriceRange')
        ->name('product.getPriceRange');
    Route::get('products/changeItemByCollection', 'Site\ItemsController@changeItemByCollection')
        ->name('product.changeItemByCollection');
    Route::get('products/{category}', 'Site\ItemsController@index')
        ->name('products.list');
    Route::get('product' . '/{alias}', 'Site\ItemsController@detail')
        ->name('product.detail');
    Route::get('producta/search', 'Site\ItemsController@search')
        ->name('products.search');

    Route::get('{url?}', 'Site\AppController@pageManager')
        ->name('page');*/

    /*Route::get('news-detail', function () {
        return view('site.pages.news.detail');
    });*/

    /*Route::get('news' . '/{url}', 'Site\NewsController@detail')
        ->name('news.detail');

    Route::get('services' . '/{url}', 'Site\ServicesController@detail')
        ->name('services.detail');

    Route::get('brands' . '/{url}', 'Site\BrandsController@detail')
        ->name('brands.detail');

    Route::post(r('contacts').'/send-message', 'Site\InnerController@sendContactsMessage')
        ->name('contacts.send_message');

    Route::post(r('loan').'/send-message', 'Site\InnerController@sendLoanMessage')
        ->name('loan.send_message');

    Route::post(r('measurement').'/send-message', 'Site\InnerController@sendMeasurementMessage')
        ->name('measurement.send_message');

    Route::get('basket', function () {
        return view('site.pages.cabinet.basket');
    });
    Route::get('order', function () {
        return view('site.pages.cabinet.order');
    });*/
    /*Route::get('product', function () {
        return view('site.pages.product.index');
    });*/
    /*Route::get('detail', function () {
        return view('site.pages.product.detail');
    });
    Route::get('profile', function () {
        return view('site.pages.cabinet.profileSettings');
    });
    Route::get('reg', function () {
        return view('site.auth.register');
    });
    Route::get('regVerify', function () {
        return view('site.auth.registerVerify');
    });
    Route::get('catalog', function () {
        return view('site.pages.catalog.index');
    });
    Route::get('info', function () {
        return view('site.pages.info.index');
    });

    Route::get('contact', function () {
        return view('site.pages.contact.index');
    });

    Route::get('about', function () {
        return view('site.pages.about.index');
    });
    Route::get('about-shop', function () {
        return view('site.pages.about.shop');
    });
    Route::get('partners', function () {
        return view('site.pages.partners.index');
    });
    Route::get('order-date', function () {
        return view('site.pages.cabinet.order-date');
    });*/

});
