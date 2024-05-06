@extends('site.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/step-pages.css') }}">
    <style>
        /*input[name=radio_amount] {*/
        /*    display: none;*/
        /*}*/
    </style>
@endpush
@push('js')
    <script>
        $(".step-button").click(function(){
            $(".step-button").removeClass("step-button-selected")
            $(this).addClass("step-button-selected");
        })

    </script>
@endpush
@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
        @include('site.pages.donate.steps.step1',['prices' => $prices ?? null])
    @include('site.components.donate_now')
@endsection
