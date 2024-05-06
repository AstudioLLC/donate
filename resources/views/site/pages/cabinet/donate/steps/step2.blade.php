@extends('site.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/step-pages.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.pages.cabinet.includes.left_panel', ['active' => $active])
            </div>
            <div class="profile-content-right">
                <div class="step-pages-construction d-flex flex-column">
                    <span class="title-usual">{{ __('frontend.cabinet.New Sponsorship') }}</span>
                    @include('site.includes.steps.breadcrumbs._step2')
                    <div class="step-white-block-wrap w-100 d-flex justify-content-center align-items-center">
                        <form class="w-100 step-white-block d-flex flex-column justify-content-center align-items-center"
                              id="sponsored-child-terms-and-conditions-form"
                              action="{{ route('cabinet.donate.create.step2') }}"
                              method="POST">
                            @csrf
                            <span class="step-group-names">{{ $terms->title ?? null }}</span>
                            <div class="step2-description text-default">
                                {!! $terms->content ?? null !!}
                            </div>
                            <div class="step-2-checkbox d-flex justify-content-center align-items-center">
                                <input type="checkbox" class="custom-checkbox" id="step-2-check" name="checkbox" required checked>
                                <label class="text-default" for="step-2-check">
                                    {{ __('frontend.Steps.I agree to the Terms and Conditions') }}
                                </label>
                            </div>
                            <div class="w-100 d-flex justify-content-center align-items-center step-2-next-btn">
                                <button type="submit" class="button-orange">
                                    {{ __('frontend.Steps.Next') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('site.components.donate_now')
@endsection
