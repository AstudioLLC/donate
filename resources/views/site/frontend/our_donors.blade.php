@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/our-donors.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small">
            <h2 class="title-usual">Կորպորատիվ նվիրատուներ և հիմնադրամներ</h2>

            <div class="our-donors-description text-default">
                Վերջին 4 տարվա ընթացքում բազմաթիվ կազմակերպություններ դարձել են Վորլդ Վիժն Հայաստանի գործընկերը՝ օգնելով բարեփոխել բազմաթիվ երեխաների և նրանց ընտանիքների կյանքը և դրսևորելով սոցիալական պատասխանատվության բարձր արժեքները:
            </div>

            <div class="mx-0 row block-mt">
                <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
                    <div class="our-donor-card">
                        <div class="partner-logo">
                            <img class="w-100" src="{{ asset('images/partner1.jpg') }}" alt="" title="">
                        </div>

                        <div class="partner-information d-flex flex-column">
                            <span class="partner-name">Մայքրոսոֆթ Ինովացիոն Կենտրոն Հայաստան</span>

                            <span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                            <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
                    <div class="our-donor-card">
                        <div class="partner-logo">
                            <img class="w-100" src="{{ asset('images/partner2.jpg') }}" alt="" title="">
                        </div>

                        <div class="partner-information d-flex flex-column">
                            <span class="partner-name">ՀԲԸՄ Հայկական Բարեգործական Ընդհանուր Միություն</span>

                            <span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                            <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
                    <div class="our-donor-card">
                        <div class="partner-logo">
                            <img class="w-100" src="{{ asset('images/partner3.jpg') }}" alt="" title="">
                        </div>

                        <div class="partner-information d-flex flex-column">
                            <span class="partner-name">ՍԻԹԻԶԵՆ -Մասնագիտությունների Մանկական Քաղաք</span>

                            <span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                            <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
                    <div class="our-donor-card">
                        <div class="partner-logo">
                            <img class="w-100" src="{{ asset('images/partner4.jpg') }}" alt="" title="">
                        </div>

                        <div class="partner-information d-flex flex-column">
                            <span class="partner-name">Ինստիգեյթ Դիզայն</span>

                            <span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                            <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
                    <div class="our-donor-card">
                        <div class="partner-logo">
                            <img class="w-100" src="{{ asset('images/partner5.jpg') }}" alt="" title="">
                        </div>

                        <div class="partner-information d-flex flex-column">
                            <span class="partner-name">«Քուեսթրեյդ Ինթերնեշնլ Ինկ.», Հայաստանյան Մասնաճյուղ</span>

                            <span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                            <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
                    <div class="our-donor-card">
                        <div class="partner-logo">
                            <img class="w-100" src="{{ asset('images/partner6.jpg') }}" alt="" title="">
                        </div>

                        <div class="partner-information d-flex flex-column">
                            <span class="partner-name">Էս Թի - Դեվ</span>

                            <span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                            <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
                    <div class="our-donor-card">
                        <div class="partner-logo">
                            <img class="w-100" src="{{ asset('images/partner7.jpg') }}" alt="" title="">
                        </div>

                        <div class="partner-information d-flex flex-column">
                            <span class="partner-name">Իզի Փեյ</span>

                            <span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                            <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
                    <div class="our-donor-card">
                        <div class="partner-logo">
                            <img class="w-100" src="{{ asset('images/partner8.jpg') }}" alt="" title="">
                        </div>

                        <div class="partner-information d-flex flex-column">
                            <span class="partner-name">Ֆայն Սերվիս</span>

                            <span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                            <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
                    <div class="our-donor-card">
                        <div class="partner-logo">
                            <img class="w-100" src="{{ asset('images/partner9.jpg') }}" alt="" title="">
                        </div>

                        <div class="partner-information d-flex flex-column">
                            <span class="partner-name">«Նովա» հյուրանոց</span>

                            <span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                            <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
                    <div class="our-donor-card">
                        <div class="partner-logo">
                            <img class="w-100" src="{{ asset('images/partner10.jpg') }}" alt="" title="">
                        </div>

                        <div class="partner-information d-flex flex-column">
                            <span class="partner-name">«Վիստաա Փորձագիտական Կենտրոն» Խորհրդատվական Կազմակերպություն</span>

                            <span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                            <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
                    <div class="our-donor-card">
                        <div class="partner-logo">
                            <img class="w-100" src="{{ asset('images/partner11.jpg') }}" alt="" title="">
                        </div>

                        <div class="partner-information d-flex flex-column">
                            <span class="partner-name">ՈՒրբան Լոջիսթիք Սերվիսիս</span>

                            <span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                            <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
                    <div class="our-donor-card">
                        <div class="partner-logo">
                            <img class="w-100" src="{{ asset('images/partner12.jpg') }}" alt="" title="">
                        </div>

                        <div class="partner-information d-flex flex-column">
                            <span class="partner-name">Վիասֆեր Տեխնոպարկ</span>

                            <span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                            <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>
                        </div>
                    </div>
                </div>
            </div>
        <nav class="pagination-wrap" aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link-prev" href="#" aria-label="Previous">
                            <span aria-hidden="true">
                                <img class="img-fluid" src="{{ asset('images/pagination-prev.jpg') }}" alt="" title="">
                            </span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item page-item-active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link-next" href="#" aria-label="Next">
                            <span aria-hidden="true">
                                <img class="img-fluid" src="{{ asset('images/pagination-next.jpg') }}" alt="" title="">
                            </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    </div>

    @include('site.components.donate_now')
@endsection
