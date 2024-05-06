@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/profile-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/my-donations.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.pages.cabinet.includes.left_panel', ['active' => $active])
            </div>
            @if(count($donations))
                <div class="profile-content-right">
                    <div class="my-donations-page d-flex flex-column">
                        <div class="donations-page-top d-flex flex-column">
                            <span class="title-usual text-start">{{ __('frontend.cabinet.My donations') }}</span>
                            <div class="donation-history-block">
                                <span class="history-text">{{ __('frontend.cabinet.All donation history') }}</span>

{{--                                <form class="datepickers-form">--}}
{{--                                    <div class="datepickers-group">--}}
{{--                                        <input class="date-input" type="date">--}}
{{--                                        <span>-</span>--}}
{{--                                        <input class="date-input date-input2" type="date">--}}
{{--                                    </div>--}}

{{--                                    <button class="button-orange calendar-orange-button" type="submit">--}}
{{--                                        <img class="img-fluid" src="{{ asset('images/loupe22.svg') }}" alt="" title="">--}}
{{--                                    </button>--}}
{{--                                </form>--}}
                            </div>
                        </div>
                        <div class="donation-table-wrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="th-names">{{ __('frontend.cabinet.table.Order ID') }}</th>
                                        <th scope="col" class="th-names">{{ __('frontend.cabinet.table.Data') }}</th>
                                        <th scope="col" class="th-names">{{ __('frontend.cabinet.table.Type of donation')}}</th>
                                        <th scope="col" class="th-names">{{ __('frontend.Form.Payment System') }}</th>
                                        <th scope="col" class="th-names">{{ __('frontend.cabinet.table.Amount') }}</th>
                                   {{-- <th scope="col" class="th-names">{{ __('frontend.cabinet.table.Receipt') }}</th>--}}
                                    </tr>
                                </thead>
                                <tbody >
                                @foreach($donations as $item)
                                    <tr>
                                        <th scope="row">
                                            {{$item->order_id}}
                                        </th>
                                        <th scope="row">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i:s') }}
                                        </th>
                                        <th scope="row" class="table-short-text">
                                            @if ($item->project_type == null)
                                            @php($a = [
                                            $item->count !== 0 && $item->is_binding == 0 && $item->gift == null ? 'Child Sponsorship '. $item->count .' Month | Manual' : '' .
                                            Str::limit($item->fundraiser->title ?? null,20) .
                                            Str::limit($item->gift->title ?? null,20)
                                            ])
                                            @else
                                            @php($a = [
                                            Str::limit($item->fundraiser->title ?? null,20) .
                                            Str::limit($item->gift->title ?? null,20)
                                            . $item->project_type ?? null
                                            ])
                                            @endif
                                            @php($a = str_replace(',',' ',$a))

                                            {{$a[0]}}
                                        </th>
    <td>
        @if($item->card_type == 'arca')
            <img src="{{ asset('images/arca.jpg') }}" alt="">
        @else
            <img src="{{ asset('images/paymentimg5.png') }}" alt="">
        @endif
    </td>
    <td class="table-short-text">{{ number_format($item->amount) }} AMD</td>
        @if($item->status == 1)
            <td class="donation-status-green">
                {{ __('frontend.Form.Success') }}
            </td>
        @else
            <td class="donation-status-red">
                {{ __('frontend.Form.Failed') }}
            </td>
        @endif
</tr>
@endforeach
</tbody>
</table>
<div class="donation-table-mobile">
@foreach($donations as $item)
<div class="mobile-table-box">
    <div class="row">
        <div class="col-12 mobile-table-col">
            <div class="row">
                <div class="col-6">
                    <span class="th-names">{{ __('frontend.cabinet.table.Order ID') }}</span>
                </div>
                <div class="col-6">
                    <span class="th-val">
                         {{$item->order_id}}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 mobile-table-col">
            <div class="row">
                <div class="col-6">
                    <span class="th-names">{{ __('frontend.cabinet.table.Data') }}</span>
                </div>
                <div class="col-6">
                    <span class="th-val">{{ $item->created_at->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 mobile-table-col">
            <div class="row">
                <div class="col-6">
                    <span class="th-names">{{ __('frontend.cabinet.table.Type of donation')}}</span>
                </div>
                <div class="col-6">
                    <span class="th-val">
                        @if(isset($item->fundraiser_id))
                            Fundraiser
                        @elseif(isset($item->gift_id))
                            Gift
                        @elseif(!isset($item->fundraiser_id) && isset($item->is_binding))
                            Sponsorship
                        @else
                            Donation
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 mobile-table-col">
            <div class="row">
                <div class="col-6">
                    <span class="th-names">{{ __('frontend.cabinet.table.Payment System') }}</span>
                </div>
                <div class="col-6">
                    <span class="th-val">
                         @if($item->card_type == 'arca')
                            <img src="{{ asset('images/arca.jpg') }}" alt="">
                        @else
                            <img src="{{ asset('images/paymentimg5.png') }}" alt="">
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 mobile-table-col">
            <div class="row">
                <div class="col-6">
                    <span class="th-names">{{ __('frontend.cabinet.table.Amount') }}</span>
                </div>
                <div class="col-6">
                    <span class="th-val">{{ number_format($item->amount) }} AMD</span>
                </div>
            </div>
        </div>
        <div class="col-12 mobile-table-col">
            <div class="row">
                <div class="col-6">
                    <span class="th-names"></span>
                </div>
                <div class="col-6">
                    <span class="th-val donation-status-green">
                        @if($item->status == 1)
                            Successful
                    </span>
                    @else
                    <span class="th-val donation-status-red">
                        Failed
                    </span>
                    @endif

                </div>
            </div>
        </div>

    </div>
</div>
@endforeach
</div>
</div>
</div>
</div>
@endif
</div>
</div>
@include('site.components.donate_now')
@endsection
