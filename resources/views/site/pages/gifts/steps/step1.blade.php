@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/step-pages.css') }}">
@endpush

@push('js')
    <script>
        var input = $('.counter-input');
        var count = parseInt(input.val());
        var cost = parseInt($('.gift-amount').html());
        var total = count * cost;
        $('.total-cost').html(total);

        $('.counter-minus').click(function () {
            count = checkCountIsNumeric(count);
            if(count > 1) {
                count--;
                total = count * cost;
            }
            input.val(count);
            $('.total-cost').html(total);
        });

        $('.counter-plus').click(function () {
            count = checkCountIsNumeric(count);
            count++;
            total = count * cost;
            input.val(count);
            $('.total-cost').html(total);
        });

        input.keyup(function () {
            count = parseInt($(this).val());
            count = checkCountIsNumeric(count);
            total = count * cost;
            input.val(count);
            $('.total-cost').html(total);
        })

        function checkCountIsNumeric(count) {
            if (!$.isNumeric(count)) {
                count = 1;
            }
            return count;
        }
    </script>
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small">
            <div class="step-pages-construction d-flex flex-column">
                <span class="title-usual">{{ $item->title ?? null }}</span>
                @include('site.includes.steps.breadcrumbs._step1')
                <div class="step-white-block-wrap w-100 d-flex justify-content-center align-items-center">
                    <div class="step-white-block step-white-block-donate">
                        <form class="row w-100"
                              id="sponsored-child-general-info-form"
                              action="{{ route('gifts.create.step1', ['url' => $item->url ?? null]) }}"
                              method="POST">
                            @csrf
                            <input type="hidden" name="cost" value="{{ $item->cost }}">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <div class="col-12 col-left white-group-main">
                                <div class="white-group-main w-100 d-flex flex-column">
                                    <span class="step-group-names text-center">{{ __('frontend.Steps.Gift Amount') }}</span>
                                    <div class="mt-1 donate-step-buttons row d-flex justify-content-center">
                                        <div class="p-2 col-6 col-md-4">
                                            <div class="step-button">
                                                <span class="gift-amount" data-cost="{{ $item->cost }}">
                                                    {{ $item->cost }}
                                                </span>
                                                <span>&nbsp;{{ __('frontend.Gifts.AMD') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="white-group-main w-100 d-flex flex-column justify-content-center align-items-center">
                                    <span class="step-group-names text-center w-100 d-block">
                                        {{ __('frontend.Steps.Number of gifts') }}
                                    </span>
                                    <div class="donate-counter">
                                        <button type="button" class="counter-btn counter-minus">
                                            <img class="img-fluid" src="{{ asset('images/minus.svg') }}" alt="" title="">
                                        </button>
                                        <input class="counter-input"
                                               min="1"
                                               type="number"
                                               name="count"
                                               required
                                               value="{{ old('count') ?? 1 }}">
                                        <button type="button" class="counter-btn counter-plus">
                                            <img class="img-fluid" src="{{ asset('images/plus.svg') }}" alt="" title="">
                                        </button>
                                    </div>
                                    @if($errors->has('count'))
                                        <span class="input-alert">{{ $errors->first('count') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-center align-items-center">
                                <div class="total">
                                    {{ __('frontend.Steps.Total:') }}
                                    &nbsp;<span class="total-cost"></span>
                                    &nbsp;{{ __('frontend.Gifts.AMD') }}
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center align-items-center mt-4">
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
