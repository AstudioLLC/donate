@extends('site.layouts.app')

{{--popups--}}

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/demo-modals.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/frontend/demo-modals.js') }}"></script>
@endpush

@section('content')

    <button type="button" class="modal-thank-you-btn donate-modal-btn">click open thank you</button>
    <button type="button" class="modal-fundraiser-btn donate-modal-btn">click open fundraiser modal</button>
    <button type="button" class="modal-fundraiser-button-2 donate-modal-btn">click open fundraiser modal2</button>
    <button type="button" class="modal-corporate-btn donate-modal-btn">click open corporate partnership donate modal</button>
    <button type="button" class="modal-reports-btn donate-modal-btn">click open reports modal</button>

    <div class="donate-modal justify-content-center align-items-center thank-you">
        <div class="donate-modal-white donate-modal-white-thank-you d-flex align-items-center position-relative">
            <div class="modal-image">
                <img class="w-100" src="{{ asset('images/thank-you.png') }}" alt="" title="">
            </div>

            <div class="donate-modal-content d-flex flex-column align-items-center thank-you-modal-content">
                <span class="title-usual">Thank you</span>
                <span class="description-usual">
                    Each donation brings us closer to our goal. Thank you for making a difference through your compassion and generosity.
                </span>

                @include('site.components.share')
            </div>

            <div class="donate-modal-close d-flex justify-content-center align-items-center position-absolute">
                <img class="w-100" src="{{ asset('images/close.svg') }}" alt="" title="">
            </div>
        </div>
    </div>

    <div class="donate-modal justify-content-center align-items-center fundraiser">

        <div class="donate-modal-white donate-modal-white-fundraiser d-flex align-items-center position-relative">
            <div class="donate-modal-content d-flex flex-column align-items-center">
                <span class="title-usual text-center">Create fundraiser</span>

                <span class="description-usual">
                    You can start your own fundraising campaign on your birthday or for any other occasion or when you just want to have your participation in reaching one of our goals and help changing one child’s life.

                    You may choose the cause of the fundraising campaign from the suggested options, set the goal and share the fundraising in your social media, spreading the word with your friends. After the goal is reached or the fundraising is over, the donated amount will be spent for accomplishing the goal set im advance.

                    After this you will receive an individual report showing the results of the fundraising and the changes in the child’s life. You may see all this information in your personal page.

                    Thank you for helping us make life better.
                </span>

                <div class="fundraiser-btn-group">
                    <a class="button-orange text-decoration-none">Create</a>
                    <a class="button-orange text-decoration-none ms-1 ms-md-3 fundraiser-button-2">Close</a>
                </div>

            </div>

            <div class="donate-modal-close d-flex justify-content-center align-items-center position-absolute">
                <img class="w-100" src="{{ asset('images/close.svg') }}" alt="" title="">
            </div>

        </div>
    </div>

    <div class="donate-modal justify-content-center align-items-center fundraiser2">

        <div class="donate-modal-white donate-modal-white-fundraiser d-flex align-items-center position-relative">
            <div class="donate-modal-content d-flex flex-column align-items-center">
                <span class="title-usual text-center">Create fundraiser 2</span>

                <span class="description-usual">
                    You can start your own fundraising campaign on your birthday or for any other occasion or when you just want to have your participation in reaching one of our goals and help changing one child’s life.

                    You may choose the cause of the fundraising campaign from the suggested options, set the goal and share the fundraising in your social media, spreading the word with your friends. After the goal is reached or the fundraising is over, the donated amount will be spent for accomplishing the goal set im advance.

                    After this you will receive an individual report showing the results of the fundraising and the changes in the child’s life. You may see all this information in your personal page.

                    Thank you for helping us make life better.
                </span>

                <div class="fundraiser-btn-group fundraiser-btn-group-2 align-items-center">
                    <a class="button-orange text-decoration-none mb-3">Create</a>
                    <a class="button-orange text-decoration-none fundraiser-button-2">Close</a>
                </div>

            </div>

            <div class="donate-modal-close d-flex justify-content-center align-items-center position-absolute">
                <img class="w-100" src="{{ asset('images/close.svg') }}" alt="" title="">
            </div>
        </div>
    </div>

    <div class="donate-modal justify-content-center align-items-center corporate-partnership-donate">

        <div class="donate-modal-white donate-modal-white-corporate d-flex flex-column align-items-center position-relative">
            <div class="donate-modal-content w-100 d-flex flex-column align-items-center">
                <span class="title-usual text-center">Lorem Ipsum</span>
                <span class="description-usual text-center">
                    Choose your way to help
                </span>
            </div>

            <div class="row w-100 mt-3">
                <div class="col-12 col-sm-6 p-2 p-md-3">
                    <a href="#" class="d-flex justify-content-center flex-column align-items-center help-link text-decoration-none">
                <span class="d-block help-picture">
                    <img class="img-fluid" src="http://admin.astudio.laravel/images/sponsor-a-child.png" alt="" title="">
                </span>
                        <span class="help-box-name">Դառնալ հովանավոր</span>
                    </a>
                </div>

                <div class="col-12 col-sm-6 p-2 p-md-3">
                    <a href="#" class="d-flex justify-content-center flex-column align-items-center help-link text-decoration-none">
                            <span class="d-block help-picture">
                                <img class="img-fluid" src="http://admin.astudio.laravel/images/image6.png" alt="" title="">
                            </span>
                        <span class="help-box-name">Նվիրաբերել գումար</span>
                    </a>
                </div>
            </div>

            <div class="donate-modal-close d-flex justify-content-center align-items-center position-absolute">
                <img class="w-100" src="{{ asset('images/close.svg') }}" alt="" title="">
            </div>
        </div>
    </div>

    <div class="donate-modal justify-content-center align-items-center reports-modal">
        <div class="donate-modal-white d-flex align-items-center position-relative">
            <div class="donate-modal-content d-flex flex-column align-items-center">
                <span class="title-usual text-center">Reports</span>
                <div class="modal-reports-list d-flex flex-column">
                    <div class="modal-report-box">
                        <div class="modal-report-box-filename">
                            <div class="modal-report-box-file-icon">
                                <img class="w-100" src="{{ asset('images/pdf.svg') }}" alt="" title="">
                            </div>

                            <span class="modal-report-box-filename-text">loremilsumdigvhu789.pdf</span>
                        </div>

                        <div class="modal-report-box-download-icon">
                            <img class="w-100" src="{{ asset('images/download.svg') }}" alt="" title="">
                        </div>
                    </div>

                    <div class="modal-report-box">
                        <div class="modal-report-box-filename">
                            <div class="modal-report-box-file-icon">
                                <img class="w-100" src="{{ asset('images/pdf.svg') }}" alt="" title="">
                            </div>

                            <span class="modal-report-box-filename-text">loremilsumdigvhu789.pdf</span>
                        </div>

                        <div class="modal-report-box-download-icon">
                            <img class="w-100" src="{{ asset('images/download.svg') }}" alt="" title="">
                        </div>
                    </div>

                    <div class="modal-report-box">
                        <div class="modal-report-box-filename">
                            <div class="modal-report-box-file-icon">
                                <img class="w-100" src="{{ asset('images/pdf.svg') }}" alt="" title="">
                            </div>

                            <span class="modal-report-box-filename-text">loremilsumdigvhu789.pdf</span>
                        </div>

                        <div class="modal-report-box-download-icon">
                            <img class="w-100" src="{{ asset('images/download.svg') }}" alt="" title="">
                        </div>
                    </div>

                    <div class="modal-report-box">
                        <div class="modal-report-box-filename">
                            <div class="modal-report-box-file-icon">
                                <img class="w-100" src="{{ asset('images/pdf.svg') }}" alt="" title="">
                            </div>

                            <span class="modal-report-box-filename-text">loremilsumdigvhu789.pdf</span>
                        </div>

                        <div class="modal-report-box-download-icon">
                            <img class="w-100" src="{{ asset('images/download.svg') }}" alt="" title="">
                        </div>
                    </div>

                    <div class="modal-report-box">
                        <div class="modal-report-box-filename">
                            <div class="modal-report-box-file-icon">
                                <img class="w-100" src="{{ asset('images/pdf.svg') }}" alt="" title="">
                            </div>

                            <span class="modal-report-box-filename-text">loremilsumdigvhu789.pdf</span>
                        </div>

                        <div class="modal-report-box-download-icon">
                            <img class="w-100" src="{{ asset('images/download.svg') }}" alt="" title="">
                        </div>
                    </div>
                </div>

                <div class="donate-modal-close reports-modal-close d-flex justify-content-center align-items-center">
                    <button class="button-orange">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
