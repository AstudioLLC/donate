@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/background-gray.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/faq.css') }}">
@endpush

@section('content')

    <div class="background-gray">
        <div class="container-small">
            @include('site.components.breadcrumb')

            <span class="title-usual">FAQ</span>

            <span class="gray-description privacy-policy text-default">
                Can't find the answer you're looking for? We've shared some of our most frequently asked questions to help you out!
            </span>
        </div>
    </div>

    <div class="container-small faq-content">
        <div class="left-panel-wrap">
            @include('site.components.panel-left-faq')
        </div>

        <div class="editor text-default">
            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
