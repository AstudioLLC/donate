@extends('site.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection
@section('content')
    <div class="container flex lg:flex-no-wrap flex-wrap justify-between items-center">
        <div class="w-full ">
            @include('site.components.breadcrumb')
        </div>
    </div>
    <section>
        <div class="container">
            <div class="w-full ">
                @include('site.components.catalog-title', ['title' => 'Կատալոգ'])
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="w-full ">
                @include('site.components.catalog')
            </div>
        </div>
    </section>
@endsection
