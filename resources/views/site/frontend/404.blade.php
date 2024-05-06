@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/404.css') }}">
@endpush

@section('content')
    <div class="container-small page404 d-flex flex-column">
        <img class="img-fluid" src="{{ asset('images/404.png') }}" alt="" title="">

        <span class="title-usual">Page not found</span>
        <span class="description-usual">That page doesn't exist or is unavailable.</span>
        <a href="http://admin.astudio.laravel/" class="button-orange text-decoration-none">Back to hame</a>
    </div>
@endsection
