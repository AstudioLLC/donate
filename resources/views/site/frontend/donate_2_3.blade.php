@extends('site.layouts.app')

@push('js')
    <script src="{{ asset('js/frontend/auth.js') }}"></script>
@endpush


@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/auth.css') }}">
@endpush

{{--@push('js')--}}

{{--@endpush--}}

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small auth-content">
            <div class="row w-100">
                @include('site.components.guest-block')
                @include('site.components.login')
            </div>
        </div>
    </div>
@endsection
