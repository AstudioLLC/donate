@extends('site.layouts.app')

@push('js')
    <script src="{{ asset('js/frontend/myselect.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/volunteering.css') }}">
    <link rel="stylesheet" href="{{ ('css/frontend/myselect.css') }}">
@endpush

@section('content')
    <div class="page-with-background-wrap">
        @include('site.components.breadcrumb')
        <div class="page-with-background-relative position-relative">
            <img class="img-fluid d-none d-md-block" src="{{ asset('images/volunteering.png') }}" alt="" title="">

            <img class="img-fluid d-md-none" src="{{ asset('images/volunteering-2.png') }}" alt="" title="">


            <div class="page-background-content container-small">
                <div class="white-right-block">
                    <span class="title-usual white-block-name">Volunteering</span>

                    <span class="text-default white-block-description">
                        We can succeed with the people who voluntarily donate their time.
                        Join us today to bring in your  talents and acquire new skills.
                    </span>

                    <a class="white-block-sponsor-button text-decoration-none button-orange" href="#">Apply now</a>

                    @include('site.components.share')
                </div>
            </div>
        </div>
    </div>

    <div class="container-small my-margin background-page-content">
        <span class="title-usual">Apply for Volunteering</span>
        <div class="description-usual">
            Please fill in the details and we will contact you.
        </div>

        <div class="volunteering-form-block">
            <form class="volunteering-form w-100">
                <div class="row">
                    <div class="col-12 col-sm-6 default-form-group">
                        <input name="name" type="text" class="input-default" placeholder="Full Name">
                    </div>

                    <div class="col-12 col-sm-6 default-form-group">
                        <input name="email" type="email" class="input-default" placeholder="Email address">
                    </div>

                    <div class="col-12 col-sm-6 default-form-group">
                        <input name="surname" type="text" class="input-default" placeholder="Surname">
                    </div>

                    <div class="col-12 col-sm-6 default-form-group">
                        <div class="select-group">
                            <select class="select" name="language">
                                <option disabled>Age group*</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 default-form-group">
                        <input name="surname" type="number" class="input-default" placeholder="Phone number">
                    </div>

                    <div class="col-12 default-form-group upload-group">
                        <div class="upload-default">
                            <input name="file" type="file" id="input__file" onchange="showFile(this)">
                            <label for="input__file">
                                <span class="upload-file-name">Upload your Resume/CV*/label</span>
                                <img class="img-fluid" src="{{ asset('images/upload-img.svg') }}" alt="" title="">
                            </label>
                        </div>
                    </div>

                    <div class="col-12 default-form-group">
                        <textarea name="volunteering-message" placeholder="Cover letter" class="input-default textarea-default"></textarea>
                    </div>

                    <div class="col-12 default-form-group d-flex justify-content-center align-items-center">
                        <button type="submit" href="#" class="button-orange sponsor-button text-decoration-none">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('site.components.frequently-asked-questions')
    @include('site.components.donate_now')
@endsection
