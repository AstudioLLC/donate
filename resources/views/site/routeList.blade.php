@extends('site.layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center text-success mb-5">ROUTE LIST</h1>

        <ul class="row my-5">
            <li class="p-2">
                <a href="/">+++Home Page</a>
            </li>
            <li class="p-2">
                <a href="/donate">+++Donate Page</a>
            </li>
            <li class="p-2">
                <a href="/login">+++Login Page</a>
            </li>
            <li class="p-2">
                <a href="/sponsor-a-child">+++Sponsor a child Page</a>
            </li>
            <li class="p-2">
                <a href="/news-&-events">+++News & events Page</a>
            </li>
            <li class="p-2">
                <a href="/donate-2">+++ (dublication page) Donate 2 Page(second in list)</a>
            </li>
            <li class="p-2">
                <a href="/give-a-gift">+++Give a gift Page</a>
            </li>
            <li class="p-2">
                <a href="/secret-santa">+++Secret santa Page</a>
            </li>
            <li class="p-2">
                <a href="/secret-santa-general-info">+++Secret santa general info Page</a>
            </li>
            <li class="p-2">
                <a href="/faq">+++FAQ Page</a>
            </li>
            <li class="p-2">
                <a href="/volunteering">+++Volunteering Page</a>
            </li>
            <li class="p-2">
                <a href="/sms-donation">+++SMS donation Page</a>
            </li>
            <li class="p-2">
                <a href="/reports-individual">+++Reports individual Page</a>
            </li>
            <li class="p-2">
                <a href="/contacts">+++Contacts Page</a>
            </li>
            <li class="p-2">
                <a href="/about-us">+++About us Page </a>
            </li>
            <li class="p-2">
                <a href="/home">+++Home Page (second one, named "Home" in list)</a>
            </li>
            <li class="p-2">
                <a href="/my-profile">+++(dublicate)My profile Page</a>
            </li>
            <li class="p-2">
                <a href="/create-fundraiser">Create fundraiser Page</a>
            </li>
            <li class="p-2">
                <a href="/my-donations">+++My donations Page</a>
            </li>
            <li class="p-2">
                <a href="/notification">+++Notification Page</a>
            </li>
            <li class="p-2">
                <a href="/day-care-center">+++Day care center Page</a>
            </li>
            <li class="p-2">
                <a href="/corporate-partnership">+++Corporate partnership Page</a>
            </li>
            <li class="p-2">
                <a href="/privacy-policy">+++Privaty policy Page</a>
            </li>
{{--            <li class="p-2">--}}
{{--                <a href="/register">+++Register Page</a>--}}
{{--            </li>--}}
            <li class="p-2">
                <a href="/tailored-project-for-your-csr">+++Tailored project for your CSR Page</a>
            </li>
            <li class="p-2">
                <a href="/create-fundraiser-2">+++Create fundraiser 2 Page</a>
            </li>
            <li class="p-2">
                <a href="/terms-and-conditions">+++Terms and conditions Page</a>
            </li>
            <li class="p-2">
                <a href="/home-1">+++Home 1 Page</a>
            </li>
            <li class="p-2">
                <a href="/donate-2-2">+++Donate 2_2 Page (named "Doante-2" in list, donate_2_2 view name)</a>
            </li>
            <li class="p-2">
                <a href="/my-fundraisers">+++My fundraisers Page</a>
            </li>
            <li class="p-2">
                <a href="/forgot-password">+++Forgot password Page</a>
            </li>
            <li class="p-2">
                <a href="/news-&-events-individual">+++News & events individual Page</a>
            </li>
            <li class="p-2">
                <a href="/payment-methods">+++Payment methods Page</a>
            </li>
            <li class="p-2">
                <a href="/day-care-center-individual">+++Day care center individual Page</a>
            </li>
            <li class="p-2">
                <a href="/success-stories">+++Success stories Page</a>
            </li>
            <li class="p-2">
                <a href="/photos">+++Photos Page</a>
            </li>
            <li class="p-2">
                <a href="/sponsored-a-child-billing-info-4">Sponsored a child billing_info 4 Page</a>
            </li>
            <li class="p-2">
                <a href="/corporate-partnership-donate-1">+++Corporate partnership donate 1 Page (Donate 7 page)</a>
            </li>
            <li class="p-2">
                <a href="/reports">+++Reports Page</a>
            </li>
            <li class="p-2">
                <a href="/videos">+++Videos Page</a>
            </li>
            <li class="p-2">
                <a href="/give-a-gift-individual">+++Give a gift individual Page</a>
            </li>
            <li class="p-2">
                <a href="/login-1">+++(dublicate)Login 1 Page</a>
            </li>
            <li class="p-2">
                <a href="/404">+++404 Page</a>
            </li>
            <li class="p-2">
                <a href="/create-fundraiser-3">+++Create fundraiser 3 Page  (Donate 7 Page)</a>
            </li>
            <li class="p-2">
                <a href="/corporate-partnership-donate">+++Corporate partnership donate Page</a>
            </li>
            <li class="p-2">
                <a href="/donate-3">+++Donate 3 Page</a>
            </li>
            <li class="p-2">
                <a href="/home-2">Home 2 Page</a>
            </li>
            <li class="p-2">
                <a href="/sponsored-a-child-general-info">+++Sponsored a child general info Page</a>
            </li>
            <li class="p-2">
                <a href="/mailing">+++Mailing Page</a>
            </li>
            <li class="p-2">
                <a href="/our-donors">+++Our donors Page</a>
            </li>
            <li class="p-2">
                <a href="/success-stories-2">+++Success stories 2 Page</a>
            </li>
            <li class="p-2">
                <a href="/yeritsuk">+++Yeritsuk Page</a>
            </li>
            <li class="p-2">
                <a href="/login-6">+++(dublication page)Login 6 Page</a>
            </li>
            <li class="p-2">
                <a href="/search">+++Search Page</a>
            </li>
            <li class="p-2">
                <a href="/search-result">+++Search result Page</a>
            </li>
            <li class="p-2">
                <a href="/donate-3-2">+++(dublication page)Donate 3 Page (second page in list with the same name)</a>
            </li>
            <li class="p-2">
                <a href="/current-campaigns">+++Current campaigns Page</a>
            </li>
            <li class="p-2">
                <a href="/donate-6">+++Donate 6 Page</a>
            </li>
            <li class="p-2">
                <a href="/sponsored-a-child-general-info-1">+++Sponsored a child general info 1 Page</a>
            </li>
            <li class="p-2">
                <a href="/sponsored-a-child-general-info-2">Sponsored a child general info 2 Page</a>
            </li>
            <li class="p-2">
                <a href="/home-3">+++Home 3 Page</a>
            </li>
            <li class="p-2">
                <a href="/donate-2-3">+++ Donate 2 Page (third page with the same name)</a>
            </li>
            <li class="p-2">
                <a href="/sponsored-a-child-terms-&-conditions">+++Sponsored a child terms & conditions Page</a>
            </li>
            <li class="p-2">
                <a href="/give-a-gift-general-info-2">+++Give a gift general info 2 Page</a>
            </li>
            <li class="p-2">
                <a href="/sponsored-a-child-terms-&-conditions-1">+++Sponsored a child terms & conditions 1 Page</a>
            </li>
            <li class="p-2">
                <a href="/sponsored-a-child-terms-&-conditions-3">+++(dublication page) Sponsored a child terms & conditions 3 Page</a>
            </li>
            <li class="p-2">
                <a href="/sponsored-a-child-billing-info">+++Sponsored a child billing info Page</a>
            </li>
            <li class="p-2">
                <a href="/donate-2-1">Donate 2 1 Page</a>
            </li>
            <li class="p-2">
                <a href="/create-fundraiser-popup">+++Create fundraiser popup Page (Donate 7 Page)</a>
            </li>
            <li class="p-2">
                <a href="/sponsored-a-child-billing-info-1">+++Sponsored a child billing info 1 Page</a>
            </li>
            <li class="p-2">
                <a href="/sponsored-a-child-billing-info-2">+++(dublication page) Sponsored a child billing info 2 Page</a>
            </li>
            <li class="p-2">
                <a href="/sponsored-a-child-billing-info-5">+++(dublication page) Sponsored a child billing info 5 Page</a>
            </li>
            <li class="p-2">
                <a href="/donate-4">+++Donate 4 Page</a>
            </li>
            <li class="p-2">
                <a href="/donate-7">+++(dublication page) Donate 7 Page ////// Site popup collection</a>
            </li>
            <li class="p-2">
                <a href="/my-sponsorship">My sponsorship Page</a>
            </li>
            <li class="p-2">
                <a href="/my-sponsorship-sponsor-a-child">My sponsorship sponsor a child Page</a>
            </li>
        </ul>
    </div>
@endsection
