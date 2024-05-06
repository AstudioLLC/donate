@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/event-card.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small">
            <h2 class="title-usual">News & Events</h2>

            <div class="mx-0 row block-mt">
                <div class="col-12 col-sm-6 col-lg-4 d-flex flex-column event-card">
                    <div class="event-image-wrap">
                        <img class="w-100" src="{{ asset('images/event-image-1.jpg') }}" alt="" title="">
                    </div>

                    <div class="event-details-wrap">
                        <div class="event-details d-flex flex-column">
                            <span class="event-name">We continue to sort your donations We continue to sort your donations We continue to sort your donations</span>
                            <div class="event-description">
                                We continue to sort your donations. Part of the support has already been sent ...
                                We continue to sort your donations. Part of the support has already been sent ...
                            </div>

                            <div class="d-flex justify-content-between align-items-center event-details-bottom">
                                <span class="event-date">06.10.2020</span>
                                <div class="share-img-wrap">
                                    <img class="" src="{{ asset('images/share-img.jpg') }}" alt="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 d-flex flex-column event-card">
                    <div class="event-image-wrap">
                        <img class="w-100" src="{{ asset('images/event-image-1.jpg') }}" alt="" title="">
                    </div>

                    <div class="event-details-wrap">
                        <div class="event-details d-flex flex-column">
                            <span class="event-name">We continue to sort your donations We continue to sort your donations We continue to sort your donations</span>
                            <div class="event-description">
                                We continue to sort your donations. Part of the support has already been sent ...
                                We continue to sort your donations. Part of the support has already been sent ...
                            </div>

                            <div class="d-flex justify-content-between align-items-center event-details-bottom">
                                <span class="event-date">06.10.2020</span>
                                <div class="share-img-wrap">
                                    <img class="" src="{{ asset('images/share-img.jpg') }}" alt="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 d-flex flex-column event-card">
                    <div class="event-image-wrap">
                        <img class="w-100" src="{{ asset('images/event-image-1.jpg') }}" alt="" title="">
                    </div>

                    <div class="event-details-wrap">
                        <div class="event-details d-flex flex-column">
                            <span class="event-name">We continue to sort your donations We continue to sort your donations We continue to sort your donations</span>
                            <div class="event-description">
                                We continue to sort your donations. Part of the support has already been sent ...
                                We continue to sort your donations. Part of the support has already been sent ...
                            </div>

                            <div class="d-flex justify-content-between align-items-center event-details-bottom">
                                <span class="event-date">06.10.2020</span>
                                <div class="share-img-wrap">
                                    <img class="" src="{{ asset('images/share-img.jpg') }}" alt="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 d-flex flex-column event-card">
                    <div class="event-image-wrap">
                        <img class="w-100" src="{{ asset('images/event-image-1.jpg') }}" alt="" title="">
                    </div>

                    <div class="event-details-wrap">
                        <div class="event-details d-flex flex-column">
                            <span class="event-name">We continue to sort your donations We continue to sort your donations We continue to sort your donations</span>
                            <div class="event-description">
                                We continue to sort your donations. Part of the support has already been sent ...
                                We continue to sort your donations. Part of the support has already been sent ...
                            </div>

                            <div class="d-flex justify-content-between align-items-center event-details-bottom">
                                <span class="event-date">06.10.2020</span>
                                <div class="share-img-wrap">
                                    <img class="" src="{{ asset('images/share-img.jpg') }}" alt="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 d-flex flex-column event-card">
                    <div class="event-image-wrap">
                        <img class="w-100" src="{{ asset('images/event-image-1.jpg') }}" alt="" title="">
                    </div>

                    <div class="event-details-wrap">
                        <div class="event-details d-flex flex-column">
                            <span class="event-name">We continue to sort your donations We continue to sort your donations We continue to sort your donations</span>
                            <div class="event-description">
                                We continue to sort your donations. Part of the support has already been sent ...
                                We continue to sort your donations. Part of the support has already been sent ...
                            </div>

                            <div class="d-flex justify-content-between align-items-center event-details-bottom">
                                <span class="event-date">06.10.2020</span>
                                <div class="share-img-wrap">
                                    <img class="" src="{{ asset('images/share-img.jpg') }}" alt="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 d-flex flex-column event-card">
                    <div class="event-image-wrap">
                        <img class="w-100" src="{{ asset('images/event-image-1.jpg') }}" alt="" title="">
                    </div>

                    <div class="event-details-wrap">
                        <div class="event-details d-flex flex-column">
                            <span class="event-name">We continue to sort your donations We continue to sort your donations We continue to sort your donations</span>
                            <div class="event-description">
                                We continue to sort your donations. Part of the support has already been sent ...
                                We continue to sort your donations. Part of the support has already been sent ...
                            </div>

                            <div class="d-flex justify-content-between align-items-center event-details-bottom">
                                <span class="event-date">06.10.2020</span>
                                <div class="share-img-wrap">
                                    <img class="" src="{{ asset('images/share-img.jpg') }}" alt="" title="">
                                </div>
                            </div>
                        </div>
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

    @include('site.components.donate_now')
@endsection
