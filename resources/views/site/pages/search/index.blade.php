@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/search-results.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/search-results.js') }}"></script>
@endpush

@section('content')
    @include('.site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-mini">
            <span class="title-usual">{{ __('frontend.Search.Search') }}</span>
            <div class="search-results-form-wrap">
                <form id="search-result-form" class="search-result-form d-flex align-items-center justify-content-between" method="get" action="{{ route('search') }}">
                    <div class="input-default input-default-parent d-flex justify-content-between align-items-center">
                        <input type="text"
                               name="searchQuery"
                               required
                               class="result-inp"
                               placeholder="{{ __('frontend.What can we help you find?') }}"
                               value="{{ $searchQuery }}"
                               onchange="change()">
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
                <span class="results-number">{{ count($result) }} {{ __('frontend.Search.Results') }}</span>
                {{--<span class="showing-results-text">{{ __('frontend.Search.Showing results') }} 1-10</span>--}}
            </div>
            <div class="search-result-main-content">
                <div class="buttons-parent d-flex align-items-center">
                    <button type="button" class="search-btn active" onclick="openTab(event, 'tab1')">{{ __('frontend.Search.All result') }}</button>
                    <button type="button" class="search-btn" onclick="openTab(event, 'tab2')">{{ __('frontend.Search.Sponsor a Child') }}</button>
                    <button type="button" class="search-btn" onclick="openTab(event, 'tab3')">{{ __('frontend.Search.Gift') }}</button>
                    <button type="button" class="search-btn" onclick="openTab(event, 'tab4')">{{ __('frontend.Search.News & Events') }}</button>
                </div>
                <div id="tab1" class="tabcontent search-result-block-main">
                    @if(count($result))
                        @foreach($result as $item)
                            <div class="search-result-block d-flex flex-column">
                                <div class="search-result-block-name">
                                    {{ $item->title ?? null }}
                                </div>
                                <div class="search-result-description text-default">
                                    {!! $item->content ?? null !!}
                                </div>
                                @if($item->getTable() == 'pages')
                                    @php($route = route('page', ['url' => $item->url ?? null]))
                                @else
                                    @php($route = route($item->getTable() . '.detail', ['url' => $item->url ?? null]))
                                @endif
                                <a class="search-result-link text-decoration-none" href="{{ $route }}">
                                    {{ $route }}
                                </a>
                            </div>
                        @endforeach
                        {{--{!! $result->links() !!}--}}
                    @endif
                </div>
                <div id="tab2" class="tabcontent search-result-block-main">
                    @if(count($result))
                        @foreach($result as $item)
                            @if($item->getTable() == 'pages')
                                <div class="search-result-block d-flex flex-column">
                                    <div class="search-result-block-name">
                                        {{ $item->title ?? null }}
                                    </div>
                                    <div class="search-result-description text-default">
                                        {!! $item->content ?? null !!}
                                    </div>
                                    @if($item->getTable() == 'pages')
                                        @php($route = route('page', ['url' => $item->url ?? null]))
                                    @else
                                        @php($route = route($item->getTable() . '.detail', ['url' => $item->url ?? null]))
                                    @endif
                                    <a class="search-result-link text-decoration-none" href="{{ $route }}">
                                        {{ $route }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                        {{--{!! $result->links() !!}--}}
                    @endif
                    {{--<div class="search-result-block d-flex flex-column">
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
                    </div>--}}
                </div>
                <div id="tab3" class="tabcontent search-result-block-main">
                    @if(count($result))
                        @foreach($result as $item)
                            @if($item->getTable() == 'gifts')
                                <div class="search-result-block d-flex flex-column">
                                    <div class="search-result-block-name">
                                        {{ $item->title ?? null }}
                                    </div>
                                    <div class="search-result-description text-default">
                                        {!! $item->content ?? null !!}
                                    </div>
                                    @if($item->getTable() == 'pages')
                                        @php($route = route('page', ['url' => $item->url ?? null]))
                                    @else
                                        @php($route = route($item->getTable() . '.detail', ['url' => $item->url ?? null]))
                                    @endif
                                    <a class="search-result-link text-decoration-none" href="{{ $route }}">
                                        {{ $route }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                        {{--{!! $result->links() !!}--}}
                    @endif
                </div>
                <div id="tab4" class="tabcontent search-result-block-main">
                    @if(count($result))
                        @foreach($result as $item)
                            @if($item->getTable() == 'news')
                                <div class="search-result-block d-flex flex-column">
                                    <div class="search-result-block-name">
                                        {{ $item->title ?? null }}
                                    </div>
                                    <div class="search-result-description text-default">
                                        {!! $item->content ?? null !!}
                                    </div>
                                    @if($item->getTable() == 'pages')
                                        @php($route = route('page', ['url' => $item->url ?? null]))
                                    @else
                                        @php($route = route($item->getTable() . '.detail', ['url' => $item->url ?? null]))
                                    @endif
                                    <a class="search-result-link text-decoration-none" href="{{ $route }}">
                                        {{ $route }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                        {{--{!! $result->links() !!}--}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('site.components.donate_now')
@endsection
