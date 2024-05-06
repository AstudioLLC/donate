@extends('site.layouts.app')

@push('js')
    <script src="{{ asset('js/frontend/myselect.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/volunteering.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/myselect.css') }}">
@endpush

@section('content')
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])
        <div class="page-with-background-relative position-relative">
            @if($page->image)
                <img class="img-fluid d-none d-md-block"
                     src="{{ $page->getImageUrl('thumbnail') }}"
                     alt="{{ $page->title }}"
                     title="{{ $page->title }}">
                <img class="img-fluid d-md-none"
                     src="{{ $page->getImageUrl('thumbnail') }}"
                     alt="{{ $page->title }}"
                     title="{{ $page->title }}">
                <div class="page-background-content container-small">
                    <div class="white-right-block">
                        <span class="title-usual white-block-name">{{ $page->title ?? null }}</span>
                        <span class="text-default white-block-description">
                            {!! $page->content ?? null !!}
                        </span>
                        <a class="white-block-sponsor-button text-decoration-none button-orange" href="#apply_volunteering">
                            {{ __('frontend.Apply now') }}
                        </a>
                        @include('site.components.share')
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="container-small my-margin background-page-content" id="apply_volunteering">
        <h2 class="title-usual">{!! $page->title_content ?? null !!}</h2>
        <div class="description-usual">
            {!! __('frontend.Apply volunteering description') !!}
        </div>
        <div class="volunteering-form-block">
            <form class="volunteering-form w-100"
                  method="POST"
                  id="volunteering"
                  action="{{ route('volunteering.send_message') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-6 default-form-group">
                        <input class="input-default"
                               type="text"
                               name="name"
                               required

                               placeholder="{{ __('frontend.Volunteering.Name*') }}">
                        @if($errors->has('name'))
                            <span class="input-alert">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-12 col-sm-6 default-form-group">
                        <input class="input-default"
                               type="email"
                               name="email"
                               required
                               placeholder="{{ __('frontend.Volunteering.Email address*') }}">
                        @if($errors->has('email'))
                            <span class="input-alert">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col-12 col-sm-6 default-form-group">
                        <input class="input-default"
                               type="text"
                               name="surname"
                               required
                               placeholder="{{ __('frontend.Volunteering.Surname*') }}">
                        @if($errors->has('surname'))
                            <span class="input-alert">{{ $errors->first('surname') }}</span>
                        @endif
                    </div>
                    <div class="col-12 col-sm-6 default-form-group">
                        <div class="select-group">
                            <select class="select" name="age_group" required>
                                <option disabled value="">{{ __('frontend.Volunteering.Age group*') }}</option>
                                <option value="14-17" selected>14-17*</option>
                                <option value="18-25">18-25</option>
                                <option value="{{ __('frontend.Volunteering.26 and above') }}">{{ __('frontend.Volunteering.26 and above') }}</option>
                            </select>
                        </div>
                        @if($errors->has('age_group'))
                            <span class="input-alert">{{ $errors->first('age_group') }}</span>
                        @endif
                    </div>

                    <div class="col-12 col-sm-6 default-form-group">
                        <input class="input-default"
                               type="text"
                               name="phone"
                               required
                               placeholder="{{ __('frontend.Volunteering.Phone number*') }}">
                        @if($errors->has('phone'))
                            <span class="input-alert">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="col-12 default-form-group upload-group">
                        <div class="upload-default">
                            <input id="input__file"
                                   type="file"
                                   name="file"
                                   required
                                   onchange="showFile(this)">
                            <label for="input__file">
                                <span class="upload-file-name">{{ __('frontend.Volunteering.Upload your Resume/CV*') }}</span>
                                <img class="img-fluid"
                                     src="{{ asset('images/upload-img.svg') }}"
                                     alt="{{ __('frontend.Volunteering.Upload your Resume/CV*') }}"
                                     title="{{ __('frontend.Volunteering.Upload your Resume/CV*') }}">
                            </label>
                        </div>
                        @if($errors->has('file'))
                            <span class="input-alert">{{ $errors->first('file') }}</span>
                        @endif
                    </div>
                    <div class="col-12 default-form-group">
                        <textarea class="input-default textarea-default" name="message" placeholder="{{ __('frontend.Volunteering.Cover letter') }}"></textarea>
                        @if($errors->has('message'))
                            <span class="input-alert">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    <div class="col-12 default-form-group d-flex justify-content-center align-items-center">
                        <button type="submit" class="button-orange sponsor-button">
                            {{ __('frontend.login.Submit') }}
                        </button>
                    </div>
                    <div class="col-12 default-form-group d-flex align-items-center">
                        <p style="margin: 15px 0 0; text-align: left" class="description-usual" ><span style="font-weight: 900">* </span> {{ __('frontend.Volunteering.Info about age') }}</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Start Modal Thank you for Volunteering -->
    <div class="donate-modal justify-content-center align-items-center thank-you" id="myModal">
        <div class="donate-modal-white donate-modal-white-thank-you d-flex align-items-center position-relative">
            <div class="modal-image">
                <img class="w-100" src="{{ asset('images/thank-you.png') }}" alt="" title="">
            </div>

            <div class="donate-modal-content d-flex flex-column align-items-center thank-you-modal-content">
                <span class="title-usual">{{__('frontend.Payment.Thank you')}}</span>
                <span class="description-usual">
                    {{ __('frontend.Volunteering Thank you desc') }}
                </span>

            </div>

            <div class="donate-modal-close d-flex justify-content-center align-items-center position-absolute">
                <img class="w-100" src="{{ asset('images/close.svg') }}" alt="" title="">
            </div>
        </div>
    </div>
    <!--End Modal Thank you for Volunteering -->



    @include('site.components.frequently_asked_questions')
    @if(count($page->gallery))
        @include('site.components.gallery', ['items' => $page->gallery ?? null])
    @endif
    @include('site.components.donate_now')
@endsection




@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/demo-modals.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/demo-modals.js') }}"></script>
@endpush

@push('js')
    <script>
        $("form").on('submit', function(){
            $('#myModal').addClass("donate-modal-opened");
        });
    </script>
@endpush
