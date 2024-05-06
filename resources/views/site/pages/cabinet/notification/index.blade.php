@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/profile-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/notification.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/notifications-accordion.js') }}"></script>
@endpush

@section('content')
    @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.pages.cabinet.includes.left_panel', ['active' => $active])
            </div>

            @if($sp_donations ?? null)
            <div class="profile-content-right">
                <div class="notification-block d-flex flex-column">
                    <div class="title-top">
                        <span class="title-usual text-start">{{__('frontend.cabinet.Notification')}}</span>
                        @if(count($my_unread_donations))
                        <form action="{{route('donation.all.seen')}}" method="post">
                            @csrf
                            <button type="submit" class="all-read">{{__('frontend.cabinet.Mark all as read')}}</button>
                        </form>
                        @endif
                    </div>

                    @foreach($sp_donations as $donation)
                    <div class="notification-content" data-id='{!! $donation->id !!}'>
                        <div class="donation-box d-flex justify-content-center flex-column position-relative">
                            <div class="donation-box-top">
                                <div class="d-flex flex-column">
                                    <span class="donation-text-bold">
                                       @if($donation->status)
                                        {{__('frontend.cabinet.Thank you for your donation!')}}
                                        @else
                                            {{__('frontend.Form.Failed Donation Title')}}

                                        @endif
                                    </span>
                                    <span class="now">{{$donation->created_at}}</span>
                                </div>

                                <div class="read-buttons-web">
                                    <span class="read read-more">{{__('frontend.cabinet.Read more')}}</span>
{{--                                    <span class="read read-less">Read Less</span>--}}
                                </div>
                            </div>
                            <div class="notification-content-accordion">
                                @if($donation->status)

                                <div class="donation-top-description">
                                    {{__('frontend.cabinet.Thank you for your donation desc one!')}}
                                            {{$donation->amount}}
                                    {{__('frontend.cabinet.Thank you for your donation desc two!')}}
                                    <a href="{{route('cabinet.donations.index')}}" class="link-orange text-decoration-none"> {{__('frontend.cabinet.Your Donation History Page')}}</a>
                                </div>

                                <div class="your-donation donation-text-bold">{{__('frontend.cabinet.Your Donation')}}
                                    {{$donation->amount}} {{__('frontend.Gifts.AMD')}} |
                                    @if(!$donation->is_binding)
                                    {{__('frontend.cabinet.table.One Time')}} | {{ $donation->fundraiser->title ?? null }}  {{ $donation->gift->title ?? null }}
                                    @elseif ($donation->count == 1)
                                        {{__('frontend.Form.1 month') . ' | ' . $donation->is_binding ? __('frontend.Form.Automatic') : __('frontend.Form.Manually')}}
                                    @elseif($donation->count == 3)
                                    {{__('frontend.Form.3 months') . ' | ' . $donation->is_binding ? __('frontend.Form.Automatic') : __('frontend.Form.Manually')}}
                                    @elseif ($donation->count == 12)
                                    {{__('frontend.Form.1 year') . ' | ' . $donation->is_binding ? __('frontend.Form.Automatic') : __('frontend.Form.Manually')}}
                                    @elseif ($donation->is_binding)
                                    {{__('frontend.Form.Automatic')}}
                                    @endif
                                </div>
                                @else
                                    <div class="donation-top-description">
                                        {{__('frontend.Form.Failed Donation')}}

                                    </div>

                                    @endif

                            </div>
{{--                            <div class="read-buttons-mobile">--}}
{{--                                <span class="read read-more">Read More</span>--}}
{{--                                <span class="read read-less">Read Less</span>--}}
{{--                            </div>--}}
                        </div>

{{--DELETE--}}

                    </div>
                    @endforeach
                </div>
            </div>
                @endif
        </div>
    </div>

    @include('site.components.donate_now')
@endsection



@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            let url = "{!! route('donation.seen', ['key' => ':slug']) !!}";

            $(".notification-content").click(function(){
                $.ajax({
                    url: url.replace(':slug', $(this).data('id')),
                    method: 'post',
                    dataType: 'json',
                    data: {
                        _method: 'post',
                        key: $(this).data('id'),
                        value: $(this).data('id'),
                    },
                });
            });

        })

    </script>

@endpush
