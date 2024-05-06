<?php

use App\Models\Binding;
use App\Models\Children;
use App\Models\UserOptions;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('routeList', function () {
    return view('site.routeList');
});

/*Route::get('/', function () {
    return view('site.frontend.homePage');
});*/

//Route::get('donate', function () {
//    return view('site.frontend.donate');
//});

Route::get('login', function () {
    return view('site.frontend.login');
});

Route::get('sponsor-a-child', function () {
    return view('site.frontend.sponsor_a_child');
});

Route::get('news-&-events', function () {
    return view('site.frontend.news_&_events');
});

Route::get('donate-2', function () {
    return view('site.frontend.donate_2');
});

/*Route::get('give-a-gift', function () {
    return view('site.frontend.give_a_gift');
});*/

Route::get('secret-santa', function () {
    return view('site.frontend.secret_santa');
});

Route::get('secret-santa-general-info', function () {
    return view('site.frontend.secret_santa_general_info');
});

/*Route::get('faq', function () {
    return view('site.frontend.faq');
});*/

/*Route::get('volunteering', function () {
    return view('site.frontend.volunteering');
});*/

/*Route::get('sms-donation', function () {
    return view('site.frontend.sms_donation');
});*/

Route::get('reports-individual', function () {
    return view('site.frontend.reports_individual');
});

Route::get('contacts', function () {
    return view('site.frontend.contacts');
});

/*Route::get('about-us', function () {
    return view('site.frontend.about_us');
});*/

/*Route::get('home', function () {
    return view('site.frontend.home');
});*/

Route::get('my-profile', function () {
    return view('site.frontend.my_profile');
});

Route::get('create-fundraiser', function () {
    return view('site.frontend.create_fundraiser');
});

Route::get('my-donations', function () {
    return view('site.frontend.my_donations');
});

Route::get('notification', function () {
    return view('site.frontend.notification');
});

Route::get('day-care-center', function () {
    return view('site.frontend.day_care_center');
});

/*Route::get('corporate-partnership', function () {
    return view('site.frontend.corporate_partnership');
});*/

/*Route::get('privacy-policy', function () {
    return view('site.frontend.privacy_policy');
});*/

Route::get('register', function () {
    return view('site.frontend.register');
});

/*Route::get('tailored-project-for-your-csr', function () {
    return view('site.frontend.tailored_project_for_your_csr');
});*/

Route::get('create-fundraiser-2', function () {
    return view('site.frontend.create_fundraiser_2');
});

/*Route::get('terms-and-conditions', function () {
    return view('site.frontend.terms_and_conditions');
});*/

Route::get('home-1', function () {
    return view('site.frontend.home_1');
});

Route::get('donate-2-2', function () {
    return view('site.frontend.donate_2_2');
});

Route::get('my-fundraisers', function () {
    return view('site.frontend.my_fundraisers');
});

Route::get('forgot-password', function () {
    return view('site.frontend.forgot_password');
});

Route::get('news-&-events-individual', function () {
    return view('site.frontend.news_&_events_individual');
});

Route::get('payment-methods', function () {
    return view('site.frontend.payment_methods');
});

Route::get('day-care-center-individual', function () {
    return view('site.frontend.day_care_center_individual');
});

/*Route::get('success-stories', function () {
    return view('site.frontend.success_stories');
});*/

Route::get('photos', function () {
    return view('site.frontend.photos');
});

Route::get('sponsored-a-child-billing-info-4', function () {
    return view('site.frontend.sponsored_a_child_billing_info_4');
});

Route::get('corporate-partnership-donate-1', function () {
    return view('site.frontend.corporate_partnership_donate_1');
});

Route::get('reports', function () {
    return view('site.frontend.reports');
});

Route::get('videos', function () {
    return view('site.frontend.videos');
});

Route::get('give-a-gift-individual', function () {
    return view('site.frontend.give_a_gift_individual');
});

Route::get('login-1', function () {
    return view('site.frontend.login_1');
});

Route::get('404', function () {
    return view('site.frontend.404');
});

Route::get('create-fundraiser-3', function () {
    return view('site.frontend.create_fundraiser_3');
});

Route::get('corporate-partnership-donate', function () {
    return view('site.frontend.corporate_partnership_donate');
});

Route::get('donate-3', function () {
    return view('site.frontend.donate_3');
});

Route::get('home-2', function () {
    return view('site.frontend.home_2');
});

Route::get('sponsored-a-child-general-info', function () {
    return view('site.frontend.sponsored_a_child_general_info');
});

Route::get('mailing', function () {
    return view('site.frontend.mailing');
});

//Route::get('our-donors', function () {
//    return view('site.frontend.our_donors');
//});

Route::get('success-stories-2', function () {
    return view('site.frontend.success_stories_2');
});

Route::get('yeritsuk', function () {
    return view('site.frontend.yeritsuk');
});

Route::get('login-6', function () {
    return view('site.frontend.login_6');
});

/*Route::get('search', function () {
    return view('site.frontend.search');
});

Route::get('search-result', function () {
    return view('site.frontend.search_result');
});*/

/*Route::get('current-campaigns', function () {
    return view('site.frontend.current_campaigns');
});*/

Route::get('donate-6', function () {
    return view('site.frontend.donate_6');
});

Route::get('sponsored-a-child-general-info-1', function () {
    return view('site.frontend.sponsored_a_child_general_info_1');
});

Route::get('sponsored-a-child-general-info-2', function () {
    return view('site.frontend.sponsored_a_child_general_info_2');
});

Route::get('home-3', function () {
    return view('site.frontend.home_3');
});

Route::get('donate-2-3', function () {
    return view('site.frontend.donate_2_3');
});

Route::get('sponsored-a-child-terms-&-conditions', function () {
    return view('site.frontend.sponsored_a_child_terms_&_conditions');
});

Route::get('give-a-gift-general-info-2', function () {
    return view('site.frontend.give_a_gift_general_info_2');
});

Route::get('sponsored-a-child-terms-&-conditions-1', function () {
    return view('site.frontend.sponsored_a_child_terms_&_conditions_1');
});

Route::get('sponsored-a-child-terms-&-conditions-3', function () {
    return view('site.frontend.sponsored_a_child_terms_&_conditions_3');
});

Route::get('sponsored-a-child-billing-info', function () {
    return view('site.frontend.sponsored_a_child_billing_info');
});

Route::get('donate-2-1', function () {
    return view('site.frontend.donate_2_1');
});

Route::get('create-fundraiser-popup', function () {
    return view('site.frontend.create_fundraiser_popup');
});

Route::get('sponsored-a-child-billing-info-1', function () {
    return view('site.frontend.sponsored_a_child_billing_info_1');
});

Route::get('sponsored-a-child-billing-info-2', function () {
    return view('site.frontend.sponsored_a_child_billing_info_2');
});

Route::get('sponsored-a-child-billing-info-5', function () {
    return view('site.frontend.sponsored_a_child_billing_info_5');
});

Route::get('donate-4', function () {
    return view('site.frontend.donate_4');
});

Route::get('donate-7', function () {
    return view('site.frontend.donate_7');
});

Route::get('my-sponsorship', function () {
    return view('site.frontend.my_sponsorship');
});

Route::get('my-sponsorship-sponsor-a-child', function () {
    return view('site.frontend.my_sponsorship_sponsor_a_child');
});






