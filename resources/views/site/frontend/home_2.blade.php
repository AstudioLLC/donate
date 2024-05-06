@dd(123)
@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/profile-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/step-pages.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/messages.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/profile.js') }}"></script>
@endpush

{{--@push('js')--}}

{{--@endpush--}}
{{--profile-fundraiser-card--}}
@section('content')
    {{--@include('site.components.breadcrumb')--}}

    <div class="page-wrap">
        <div class="container-small profile-content">
            <div class="left-panel-wrap d-none d-lg-flex">
                @include('site.components.panel-left-profile')
            </div>

            <div class="profile-content-right fundraiser-page d-flex justify-content-start flex-column">
                <div class="messages-block-wrap d-flex flex-column">
                    <a class="messages-back d-flex align-items-center text-decoration-none">
                        <img class="w-100 back-messages" src="{{ asset('images/messages-back.svg') }}" alt="" title="">
                        <span>Back</span>
                    </a>

                    <span class="title-usual text-start">Messages</span>

                    <div class="messages-block-main">
                        <div class="message-author-top">
                            <div class="message-author-photo">
                                <img class="w-100" src="{{ asset('images/message-author-photo.png') }}" alt="" title="">
                            </div>

                            <span class="message-author-name">Armine Simonyan</span>
                        </div>

                        <div class="chat-block">
                            <div class="chat-user chat-user-1 d-flex">
                                <div class="user1-photo">
                                    <img class="w-100" src="{{ asset('images/message-author-photo.png') }}" alt="" title="">
                                </div>

                                <div class="user-1-chats d-flex flex-column">
                                    <div class="message user1-message d-flex flex-column">
                                        <div class="message-details d-flex justify-content-between align-items-start">
                                            <div class="message-text-wrap">
                                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.
                                            </div>

                                            <div class="message-file">
                                                <img class="w-100" src="{{ asset('images/pdf.png') }}" alt="" title="">
                                            </div>
                                        </div>

                                        <div class="message-date text-end">02.11.2020 | 16:44</div>
                                    </div>

                                    <div class="message user1-message d-flex flex-column">
                                        <div class="message-details d-flex justify-content-between align-items-start">
                                            <div class="message-text-wrap">
                                                Contrary to popular belief, Lorem Ipsum is not simply random text.
                                            </div>
                                        </div>

                                        <div class="message-date text-end">02.11.2020 | 16:44</div>
                                    </div>
                                </div>
                            </div>

                            <div class="chat-user chat-user-2 d-flex">
                                <div class="user-2-chats d-flex flex-column">
                                    <div class="message user2-message d-flex flex-column">
                                        <div class="message-details d-flex justify-content-between align-items-start">
{{--                                            <div class="message-file">--}}
{{--                                                <img class="w-100" src="http://admin.astudio.laravel/images/pdf.png" alt="" title="">--}}
{{--                                            </div>--}}
                                            <div class="message-text-wrap">
                                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.
                                            </div>
                                        </div>

                                        <div class="message-date text-end">02.11.2020 | 16:44</div>
                                    </div>
                                </div>
                                <div class="user1-photo user2-photo">
                                    <img class="w-100" src="{{ asset('images/user25.svg') }}" alt="" title="">
                                </div>
                            </div>
                        </div>

                        <div class="chat-bottom">
                            <div class="chat-bottom-details">
                                <div class="chat-bottom-details-wrap">
                                    <img class="img-fluid attach" src="{{ asset('images/attach.svg') }}" alt="" title="">
                                </div>

                                <div class="chat-bottom-details-wrap">
                                    <img class="img-fluid smile" src="{{ asset('images/smile.svg') }}" alt="" title="">
                                </div>
                            </div>

                            <div class="message-form">
                                <form id="send-message-form" class="message-form-class" method="POST" action="/">
                                    <input class="send-message-input" name="text" type="text" placeholder="Type your message here">
                                    <button class="button-orange send-button-orange" type="submit" form="send-message-form">
                                        <img class="img-fluid attach" src="{{ asset('images/send.svg') }}" alt="" title="">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
