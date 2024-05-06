@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/news-and-events-individual.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small d-flex flex-column">
            <a href="" class="back-to-news d-flex align-items-center text-decoration-none">
                <img class="img-fluid me-2 me-lg-3" src="{{ asset('images/left-arrow.svg') }}" alt="" title="">
                Back
            </a>

            <span class="title-usual">Summing up the results of our #TavushStrong initiative</span>

            <span class="news-date">09.09.2020</span>

            <div class="news-image-wrap">
                <img class="img-fluid" src="{{ asset('images/jessica-rockowitz-lMLG68e4wYk-unsplash.png') }}" alt="" title="">
            </div>

            <div class="news-description text-default">
                We are summing up the results of our #TavushStrong initiative. Thanks to all of our donors. Together, we have been able to replenish shelters in 8 border communities in Tavush, Armenia, making them a safer place for both adults and children.

                From now on, shelters will become safer for residents of Berd, Artsvaberd, Choratan, Tavush, Movses, Chinari, Nerkin Karmiraghbyur, and the border villages of Aygepar.

                This became possible thanks to cooperation with the administration of the Tavush region. Our charity campaign, launched in July, was unprecedented, with many people, international and local organizations joining us, as well as our compatriots from the diaspora.
                The shelters are provided with:

                water tanks with a tap, electric generators, rechargeable flashlights, sleeping bags, blankets, dispensers with essential medicines and supplies, loudspeakers.
            </div>

            @include('site.components.share')
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
