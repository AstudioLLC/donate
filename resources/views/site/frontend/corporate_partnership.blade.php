@extends('site.layouts.app')

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small">
            <span class="title-usual">Corporate partnership</span>
            <div class="how-to-help-links">
                <div class="row">
                    <div class="col-6 col-lg-4 p-2 p-md-3">
                        <a href="#" class="d-flex justify-content-center flex-column align-items-center help-link text-decoration-none">
                            <span class="d-block help-picture">
                                <img class="img-fluid filter-image" src="{{ asset('images/sponsor-a-child.png')  }}" alt="" title="">
                            </span>
                            <span class="help-box-name">Day Care Centers</span>
                        </a>
                    </div>

                    <div class="col-6 col-lg-4 p-2 p-md-3">
                        <a href="#" class="d-flex justify-content-center flex-column align-items-center help-link text-decoration-none">
                            <span class="d-block help-picture">
                                <img class="img-fluid filter-image" src="{{ asset('images/gift-image.png')  }}" alt="" title="">
                            </span>
                            <span class="help-box-name">Current campaigns</span>
                        </a>
                    </div>

                    <div class="col-6 col-lg-4 p-2 p-md-3">
                        <a href="#" class="d-flex justify-content-center flex-column align-items-center help-link text-decoration-none">
                            <span class="d-block help-picture">
                                <img class="img-fluid filter-image" src="{{ asset('images/image3.png')  }}" alt="" title="">
                            </span>
                            <span class="help-box-name">Tailored project for your CSR</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('site.components.donate_now')
@endsection
