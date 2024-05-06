<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

//region CKFinder
Route::any('file_browser/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')->middleware('check-permission:superadmin')->name('ckfinder_connector');
Route::any('file_browser/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')->middleware('check-permission:superadmin')->name('ckfinder_browser');
//endregion

Route::name('admin.')->namespace('Admin')->group(function (Router $router) {
    $router->get('/', function () {
        return redirect()->route('admin.login');
    });

    $router->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $router->post('login', 'Auth\LoginController@login')->name('login.post');
    $router->post('logout', 'Auth\LoginController@logout')->name('logout');
    $router->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $router->post('register', 'Auth\RegisterController@register');
    $router->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $router->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $router->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $router->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    $router->get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    $router->post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
    $router->get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    $router->get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
    $router->post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

    Route::middleware('admin')->group(function (Router $router) {
        /** Database */
        Route::prefix('database')->name('database.')->middleware('check-permission:superadmin')->group(function (Router $router) {
            $c = 'DatabaseController@';
            $router->get('', $c . 'index')->name('index');
        });
        /** Database */
        /** New Routes */
        require __DIR__.'/admin/dashboard/dashboard.php';
        require __DIR__.'/admin/languages/language.php';
        require __DIR__.'/admin/donations/donations.php';
        require __DIR__.'/admin/pages/page.php';
        require __DIR__.'/admin/gallery/gallery.php';
        require __DIR__.'/admin/file/file.php';
        require __DIR__.'/admin/videos/videos.php';
        require __DIR__.'/admin/administrators/administrator.php';
        require __DIR__.'/admin/core_values/core_values.php';
        require __DIR__.'/admin/blocks/blocks.php';
        require __DIR__.'/admin/news/news.php';
        require __DIR__.'/admin/corporate_donors/corporate_donors.php';
        require __DIR__.'/admin/success_stories/success_stories.php';
        require __DIR__.'/admin/slider/slider.php';
        require __DIR__.'/admin/subscribers/subscribers.php';
        require __DIR__.'/admin/socials/socials.php';
        require __DIR__.'/admin/home_blocks/home_blocks.php';
        require __DIR__.'/admin/faq/faq.php';
        require __DIR__.'/admin/regions/regions.php';
        require __DIR__.'/admin/needs/needs.php';
        require __DIR__.'/admin/children/children.php';
        require __DIR__.'/admin/sponsors/sponsors.php';
        require __DIR__.'/admin/countries/countries.php';
        require __DIR__.'/admin/gifts/gifts.php';
        require __DIR__.'/admin/chat/chat.php';
        require __DIR__.'/admin/fundraisers/fundraisers.php';
        require __DIR__.'/admin/volunteering/volunteering.php';
        require __DIR__.'/admin/information/information.php';
        require __DIR__.'/admin/messages/messages.php';
        //require __DIR__.'/admin/users/user.php';
        require __DIR__.'/admin/report/report.php';
        require __DIR__.'/admin/welcome_modal/welcome_modal.php';
        require __DIR__.'/admin/bindings/bindings.php';
        require __DIR__.'/admin/our_publications/our_publications.php';
        require __DIR__.'/admin/achievements/achievements.php';
        require __DIR__.'/admin/tenders/tenders.php';


        /** New Routes */

        Route::prefix('laravel-filemanager')->middleware('check-permission:superadmin')->name('laravel-filemanager.')->group(function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });

        //$router->match(['get', 'post'], 'banners/{page}', 'BannersController@renderPage')->name('banners')->middleware('admin:manager.admin');
        //$router->match(['get', 'post'], 'banners/deleteImage', 'BannersController@deleteImage')->name('zayob.deleteImage')->middleware('admin:manager.admin');
        //$router->delete('zayob/deleteImage', 'BannersController@deleteImage')->name('zayob.deleteImage');

        /*Route::prefix('zayob')->name('zayob.')->group(function (Router $router) {
            $router->delete('deleteImage', 'BannersController@deleteImage')->name('zayob.deleteImage');
        });*/

        /*Route::prefix('languages')->name('languages.')->group(function (Router $router) {
            $c = 'LanguagesController@';
            $router->get('', $c . 'main')->name('main');
            $router->patch('', $c . 'editLanguage');
            $router->patch('sort', $c . 'sort')->middleware('ajax')->name('sort')->middleware('admin:manager.admin');
        });*/

        /*Route::prefix('collections')->name('collections.')->group(function (Router $router) {
            $c = 'CollectionsController@';
            $router->get('', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->delete('deleteImage', $c . 'deleteImage')->name('deleteImage');
            $router->patch('sort', $c . 'sort')->name('sort');
        });

        Route::prefix('translations')->name('translations.')->group(function (Router $router) {
            $c = 'TranslationsController@';
            $router->get('{locale}', $c . 'main')->name('main');
            $router->get('{locale}/{filename}', $c . 'edit')->name('edit');
            $router->patch('{locale}/{filename}', $c . 'edit_patch')->name('edit');
        });*/

        /*Route::prefix('pages')->name('pages.')->group(function (Router $router) {
            $c = 'PagesController@';
            $router->get('', $c . 'main')->name('main');
            $router->get('add', $c . 'addPage')->name('add');
            $router->put('add', $c . 'addPage_put');
            $router->get('edit/{id}', $c . 'editPage')->name('edit');
            $router->patch('edit/{id}', $c . 'editPage_patch');
            $router->delete('delete', $c . 'deletePage_delete')->name('delete');
            $router->delete('deleteImage', $c . 'deleteImage')->name('deleteImage');
            $router->patch('sort', $c . 'sort')->name('sort');
        });*/

        /*Route::prefix('news')->name('news.')->group(function (Router $router) {
            $c = 'NewsController@';
            $router->get('', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->delete('deleteImage', $c . 'deleteImage')->name('deleteImage');
            $router->patch('sort', $c . 'sort')->name('sort');
        });*/

        /*Route::prefix('addresses')->name('addresses.')->group(function (Router $router) {
            $c = 'AddressesController@';
            $router->get('', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->delete('deleteImage', $c . 'deleteImage')->name('deleteImage');
            $router->patch('sort', $c . 'sort')->name('sort');
        });

        Route::prefix('services')->name('services.')->group(function (Router $router) {
            $c = 'ServicesController@';
            $router->get('', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('deleteImage', $c . 'deleteImage')->name('deleteImage');
            $router->delete('delete', $c . 'deletePage_delete')->name('delete');
            $router->patch('sort', $c . 'sort')->name('sort');
        });

        Route::prefix('home')->name('home.')->group(function (Router $router) {
            $c = 'HomeInfoController@';
            $router->get('', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
        });*/



        /*Route::prefix('user-messages')->name('user-messages.')->group(function (Router $router) {
            $c = 'UserMessagesController@';
            $router->get('{id?}', $c . 'main')->name('main');
            $router->get('view/{id}', $c . 'view')->name('view');
            $router->delete('delete', $c . 'delete')->name('delete');
        });*/

        /*Route::prefix('items')->name('items.')->group(function (Router $router) {
            $c = 'ItemsController@';
            $router->get('import/downloadExample', 'ImportController@downloadExample')->name('import.downloadExample');

            $router->get('', $c . 'index')->name('index');
            $router->post('listPortion', $c . 'listPortion')->name('listPortion');
            $router->get('create', $c . 'create')->name('create');
            $router->post('store', $c . 'store')->name('store');
            $router->get('{id}/edit', $c . 'edit')->name('edit');
            $router->put('{id}', $c . 'update')->name('update');
            $router->patch('sort', $c . 'sort')->name('sort');
            $router->delete('deleteImage', $c . 'deleteImage')->name('deleteImage');
            $router->delete('{id}', $c . 'delete')->name('destroy');

            $router->get('filters/{id}', $c . 'filters')->name('filters');
            $router->post('filters/{id}', $c . 'syncFilters')->name('filters.sync');

            $router->get('recommended/{id}', $c . 'recommended')->name('recommended');
            $router->post('recommended/{id}', $c . 'syncRecommended')->name('recommended.sync');

            $router->match(['get', 'post'], 'import/{page?}', 'ImportController@render')->name('import');
            $router->match(['get', 'post'], 'images/import', 'ImportImagesController@import')->name('import.images');

            $router->get('filterAndCategory/view/{id}', 'ImportController@view')->name('filterAndCategory.view');

        });

        Route::prefix('categories')->name('categories.')->group(function (Router $router) {
            $c = 'CategoriesController@';
            $router->get('list/{parentId?}', $c . 'index')->name('index');
            $router->get('add/{parentId?}', $c . 'create')->name('create');
            $router->post('store', $c . 'store')->name('store');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->put('edit/{id}', $c . 'update')->name('update');
            $router->delete('delete/{id}', $c . 'destroy')->name('delete');
            $router->delete('deleteImage', $c . 'deleteImage')->name('deleteImage');
            $router->patch('sort', $c . 'sort')->name('sort');

            $router->get('filters/{id}', $c . 'filters')->name('filters');
            $router->post('filters/{id}', $c . 'syncFilters')->name('filters.sync');
        });

        Route::prefix('profile')->name('profile.')->group(function (Router $router) {
            $c = 'ProfileController@';
            $router->get('', $c . 'main')->name('main');
            $router->patch('', $c . 'patch');
        });

        Route::prefix('support')->name('support.')->group(function (Router $router) {
            $c = 'SupportController@';
            $router->get('', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->patch('sort', $c . 'sort')->name('sort');
        });

        Route::prefix('question-answer')->name('question_answer.')->group(function (Router $router) {
            $c = 'QuestionAnswerController@';
            $router->get('{admin}', $c . 'main')->name('main');
            $router->get('question/add', $c . 'add')->name('add');
            $router->put('question/add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->patch('sort', $c . 'sort')->name('sort');
        });

        Route::prefix('pickup-points')->name('pickup_points.')->group(function (Router $router) {
            $c = 'PickupPointsController@';
            $router->get('', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->patch('sort', $c . 'sort')->name('sort');
        });

        Route::prefix('delivery-regions')->name('delivery_regions.')->group(function (Router $router) {
            $c = 'DeliveryRegionsController@';
            $router->get('', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->patch('sort', $c . 'sort')->name('sort');
        });

        Route::prefix('delivery-cities')->name('delivery_cities.')->group(function (Router $router) {
            $c = 'DeliveryCitiesController@';
            $router->get('{id}', $c . 'main')->name('main');
            $router->get('add/{id}', $c . 'add')->name('add');
            $router->put('add/{id}', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
        });

        Route::prefix('orders')->name('orders.')->group(function (Router $router) {
            $c = 'OrdersController@';
            $router->get('new', $c . 'newOrders')->name('new');
            $router->get('pending', $c . 'pendingOrders')->name('pending');
            $router->get('done', $c . 'doneOrders')->name('done');
            $router->get('declined', $c . 'declinedOrders')->name('declined');
            $router->get('view/{id}', $c . 'view')->name('view');
            $router->delete('delete', $c . 'delete')->name('clear');
            $router->patch('respond/{id}', $c . 'respond')->name('respond');
            $router->patch('change-process/{id}', $c . 'changeProcess')->name('change_process');
            $router->get('user/{id}/{status}', $c . 'userOrders')->name('user');
            $router->any('export/{id}', $c . 'exportOrder')->name('export');
        });

        Route::prefix('filters')->name('filters.')->group(function (Router $router) {
            $c = 'FiltersController@';

            $router->get('list', $c . 'filtersList')->name('list');
            $router->any('add', $c . 'create')->name('add');
            $router->any('edit/{id}', $c . 'update')->name('edit');
            $router->get('delete/{id}', $c . 'delete')->name('delete');
            $router->get('criterion/delete/{id}', $c . 'deleteCriterion');
            $router->post('getFilters', $c . 'getFilters');
            $router->patch('sort', $c . 'sort')->name('sort');
        });*/

        /*Route::prefix('discountForUser')->name('discountForUser.')->group(function (Router $router) {
            $c = 'DiscountForUserController@';

            $router->get('', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->patch('sort', $c . 'sort')->name('sort');
        });*/



        /*Route::prefix('main-slider')->name('main_slider.')->group(function (Router $router) {
            $c = 'MainSliderController@';

            $router->get('/', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->delete('deleteImage', $c . 'deleteImage')->name('deleteImage');
            $router->patch('sort', $c . 'sort')->name('sort');
        });

        Route::prefix('home-banner')->name('home_banner.')->group(function (Router $router) {
            $c = 'HomeBannersController@';

            $router->get('/', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->patch('sort', $c . 'sort')->name('sort');
        });

        Route::prefix('brands')->name('brands.')->group(function (Router $router) {
            $c = 'BrandsController@';

            $router->get('/', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->delete('deleteImage', $c . 'deleteImage')->name('deleteImage');
            $router->patch('sort', $c . 'sort')->name('sort');
        });

        Route::match(['get', 'post'], 'banners/{page}', 'BannersController@renderPage')->name('banners');

        Route::prefix('color-filters')->name('colorFilters.')->group(function (Router $router) {
            $router->get('list', 'ColorFiltersController@filtersList')->name('list');
            $router->any('add', 'ColorFiltersController@create')->name('add');
            $router->any('edit/{id}', 'ColorFiltersController@update')->name('edit');
            $router->get('delete/{id}', 'ColorFiltersController@delete')->name('delete');
            $router->patch('sort', 'ColorFiltersController@sort')->name('sort');
        });

        Route::prefix('country-filters')->name('countryFilters.')->group(function (Router $router) {
            $router->get('list', 'CountryFiltersController@filtersList')->name('list');
            $router->any('add', 'CountryFiltersController@create')->name('add');
            $router->any('edit/{id}', 'CountryFiltersController@update')->name('edit');
            $router->get('delete/{id}', 'CountryFiltersController@delete')->name('delete');
            $router->delete('deleteImage', 'CountryFiltersController@deleteImage')->name('deleteImage');
            $router->patch('sort', 'CountryFiltersController@sort')->name('sort');
        });*/

        /*Route::prefix('videos')->name('videos.')->group(function (Router $router) {
            $c = 'VideosController@';
            $router->get('/', $c . 'main')->name('main');
            $router->get('add', $c . 'add')->name('add');
            $router->put('add', $c . 'add_put');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->patch('sort', $c . 'sort')->name('sort');
        });*/

        /*Route::prefix('messages')->name('messages.')->group(function (Router $router) {
            $c = 'MessagesController@';
            $router->get('', $c . 'main')->name('main');
            $router->get('view/{id}', $c . 'view')->name('view');
            $router->get('edit/{id}', $c . 'edit')->name('edit');
            $router->patch('edit/{id}', $c . 'edit_patch');
            $router->delete('delete', $c . 'delete')->name('delete');
            $router->delete('deleteImage', $c . 'deleteImage')->name('deleteImage');
        });*/

    });
});
