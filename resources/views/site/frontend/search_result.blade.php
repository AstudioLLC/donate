@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/search-results.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/search-results.js') }}"></script>
@endpush

{{--@push('js')--}}

{{--@endpush--}}

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-mini">
            <span class="title-usual">Search</span>

            <div class="search-results-form-wrap">
                <form id="search-result-form" class="search-result-form d-flex align-items-center justify-content-between">
                    <div class="input-default input-default-parent d-flex justify-content-between align-items-center">
                        <input class="result-inp" name="result" type="text" onchange="change()">
                        <div class="clear-result-inp d-flex justify-content-center align-items-center">
                            <img class="img-fluid" src="{{ asset('images/close.svg') }}" alt="" title="">
                        </div>
                    </div>

                    <button type="submit" class="button-orange d-flex justify-content-center align-items-center">
                        <img class="img-fluid" src="{{ asset('images/loupe-white.svg') }}" alt="" title="">
                    </button>
                </form>
            </div>

            <div class="search-info d-flex align-items-center">
                <span class="results-number">935 Results</span>

                <span class="showing-results-text">Showing results 1-10</span>
            </div>

            <div class="search-result-main-content">

                <div class="buttons-parent d-flex align-items-center">
                    <button type="button" class="search-btn active" onclick="openTab(event, 'tab1')">All result</button>
                    <button type="button" class="search-btn" onclick="openTab(event, 'tab2')">Sponsor a Child</button>
                    <button type="button" class="search-btn" onclick="openTab(event, 'tab3')">Gift</button>
                    <button type="button" class="search-btn" onclick="openTab(event, 'tab4')">News & Events</button>
                </div>

                <div id="tab1" class="tabcontent search-result-block-main">
                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            ALL RESULT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            ALL RESULT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            ALL RESULT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            ALL RESULT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            ALL RESULT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            ALL RESULT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            ALL RESULT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            ALL RESULT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            ALL RESULT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            ALL RESULT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <nav class="pagination-wrap" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link-prev" href="#" aria-label="Previous">
                            <span aria-hidden="true">
                                <img class="img-fluid" src="http://admin.astudio.laravel/images/pagination-prev.jpg" alt="" title="">
                            </span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item page-item-active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link-next" href="#" aria-label="Next">
                            <span aria-hidden="true">
                                <img class="img-fluid" src="http://admin.astudio.laravel/images/pagination-next.jpg" alt="" title="">
                            </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div id="tab2" class="tabcontent search-result-block-main">
                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            SPONSOR A CHILD !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            SPONSOR A CHILD !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            SPONSOR A CHILD !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            SPONSOR A CHILD !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            SPONSOR A CHILD !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            SPONSOR A CHILD !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            SPONSOR A CHILD !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            SPONSOR A CHILD !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            SPONSOR A CHILD !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            SPONSOR A CHILD !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <nav class="pagination-wrap" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link-prev" href="#" aria-label="Previous">
                            <span aria-hidden="true">
                                <img class="img-fluid" src="http://admin.astudio.laravel/images/pagination-prev.jpg" alt="" title="">
                            </span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item page-item-active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link-next" href="#" aria-label="Next">
                            <span aria-hidden="true">
                                <img class="img-fluid" src="http://admin.astudio.laravel/images/pagination-next.jpg" alt="" title="">
                            </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div id="tab3" class="tabcontent search-result-block-main">
                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                           GIFT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                           GIFT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                           GIFT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                           GIFT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                           GIFT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                           GIFT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                           GIFT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                           GIFT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                           GIFT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                           GIFT !!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <nav class="pagination-wrap" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link-prev" href="#" aria-label="Previous">
                            <span aria-hidden="true">
                                <img class="img-fluid" src="http://admin.astudio.laravel/images/pagination-prev.jpg" alt="" title="">
                            </span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item page-item-active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link-next" href="#" aria-label="Next">
                            <span aria-hidden="true">
                                <img class="img-fluid" src="http://admin.astudio.laravel/images/pagination-next.jpg" alt="" title="">
                            </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div id="tab4" class="tabcontent search-result-block-main">
                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            News an events!!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            News an events!!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            News an events!!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            News an events!!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            News an events!!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            News an events!!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            News an events!!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            News an events!!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            News an events!!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <div class="search-result-block d-flex flex-column">
                        <span class="search-result-block-name">
                            News an events!!! Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </span>

                        <div class="search-result-description text-default">
                            Lorem Ipsum is simply dummy text of the printing and Donate industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the ...
                        </div>

                        <a class="search-result-link text-decoration-none">
                            http://www.Donate.oam/sh_how_donate.php
                        </a>
                    </div>

                    <nav class="pagination-wrap" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link-prev" href="#" aria-label="Previous">
                            <span aria-hidden="true">
                                <img class="img-fluid" src="http://admin.astudio.laravel/images/pagination-prev.jpg" alt="" title="">
                            </span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item page-item-active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link-next" href="#" aria-label="Next">
                            <span aria-hidden="true">
                                <img class="img-fluid" src="http://admin.astudio.laravel/images/pagination-next.jpg" alt="" title="">
                            </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
