@extends('site.layouts.app')

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small">
            <span class="title-usual">Ողջույն, մենք Donate.am-ն ենք։</span>
            @include('site.components.donate_block')
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
