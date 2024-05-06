@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/secret-santa.css') }}">
@endpush

@section('content')
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb')
        <div class="page-with-background-relative position-relative">
            <img class="img-fluid d-none d-md-block" src="{{ asset('images/secret-santa.png') }}" alt="" title="">

            <img class="w-100 d-md-none" src="{{ asset('images/secret-santa2.png') }}" alt="" title="">

            <div class="page-background-content container-small">
                <div class="white-right-block">
                    <span class="title-usual white-block-name">Secret Santa</span>

                    <span class="make-change">Give a gift. Make a change!</span>

                    <span class="text-default white-block-description">
                        It is already the fourth year, World Vision Armenia has been organising Secret Santa charity campaign to raise funds from individuals and companies for Christmas presents for the most vulnerable children of Armenia..</span>

                    @include('site.components.progressbar')

                    <a class="white-block-sponsor-button text-decoration-none button-orange" href="#">Give</a>

                    @include('site.components.share')
                </div>
            </div>
        </div>
    </div>

    <div class="container-small my-margin background-page-content">
        <div class="page-witch-background-editor text-default">
            With due consideration of the current situation in Armenia related to the Nagorno-Karabakh conflict and COVID-19 pandemic, this year we aim to not only reach children from needy families residing in Armenia but also support children and families who arrived from Nagorno-Karabakh into Armenia.

            This Christmas let us unite our efforts to not only buy Christmas presents for the children from Nagorno-Karabakh, but also provide them with food packages.

            Through our 'Secret Santa 2021’campaign, you can…

            • Become a Secret Santa for a kid and donate for a Christmas present; 1 present for 1 child costs 5000 AMD
            and/or
            • Become a Secret Santa for a family and donate for the families’ vital necessities; 1 donation for 1 family costs 10,000 AMD (food package)

            Please join our campaign and make payment through www.donate.am or 220413350228000 bank account.
            If you want to become a corporate partner and involve your staff, please call +37495005881.

            Become a Secret Santa!
            Donate a Christmas miracle!
        </div>
    </div>
    @include('site.components.donate_now')
@endsection
