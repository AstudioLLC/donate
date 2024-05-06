@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/success-stories-main.css') }}">
@endpush

@section('content')
    @include('site.components.breadcrumb')

    <div class="page-wrap">
        <div class="container-small">
            <h2 class="title-usual">Հաջողության պատմություններ</h2>

            <div class="our-donors-description text-default">
                Մեր նվիրատուների շնորհիվ այս երեխաների կյանքը փոխվել է. ծանոթացեք նրանց պատմություններին:
            </div>

            <div class="mx-0 row block-mt">
                <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
                    <div class="stories-card">
                        <div class="stories-picture">
                            <img class="w-100" src="{{ asset('images/photo1.jpg') }}" alt="" title="">
                        </div>

                        <div class="stories-information d-flex flex-column">
                            <span class="stories-name">Միքայելի հաջողության պատմությունը</span>

                            <span class="stories-description">7-ամյա Միքայելը բնակվում է մայրիկի, եղբոր, տատիկի և պապիկի հետ Ստեփանավանում: Ընտանիքի ...</span>

                            <span class="read-more">Կարդալ ավելին</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
                    <div class="stories-card">
                        <div class="stories-picture">
                            <img class="w-100" src="{{ asset('images/photo2.jpg') }}" alt="" title="">
                        </div>

                        <div class="stories-information d-flex flex-column">
                            <span class="stories-name">Միքայելի հաջողության պատմությունը</span>

                            <span class="stories-description">7-ամյա Միքայելը բնակվում է մայրիկի, եղբոր, տատիկի և պապիկի հետ Ստեփանավանում: Ընտանիքի ...</span>

                            <span class="read-more">Կարդալ ավելին</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
                    <div class="stories-card">
                        <div class="stories-picture">
                            <img class="w-100" src="{{ asset('images/photo3.jpg') }}" alt="" title="">
                        </div>

                        <div class="stories-information d-flex flex-column">
                            <span class="stories-name">Միքայելի հաջողության պատմությունը</span>

                            <span class="stories-description">7-ամյա Միքայելը բնակվում է մայրիկի, եղբոր, տատիկի և պապիկի հետ Ստեփանավանում: Ընտանիքի ...</span>

                            <span class="read-more">Կարդալ ավելին</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
                    <div class="stories-card">
                        <div class="stories-picture">
                            <img class="w-100" src="{{ asset('images/photo4.jpg') }}" alt="" title="">
                        </div>

                        <div class="stories-information d-flex flex-column">
                            <span class="stories-name">Միքայելի հաջողության պատմությունը</span>

                            <span class="stories-description">7-ամյա Միքայելը բնակվում է մայրիկի, եղբոր, տատիկի և պապիկի հետ Ստեփանավանում: Ընտանիքի ...</span>

                            <span class="read-more">Կարդալ ավելին</span>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
                    <div class="stories-card">
                        <div class="stories-picture">
                            <img class="w-100" src="{{ asset('images/photo5.jpg') }}" alt="" title="">
                        </div>

                        <div class="stories-information d-flex flex-column">
                            <span class="stories-name">Միքայելի հաջողության պատմությունը</span>

                            <span class="stories-description">7-ամյա Միքայելը բնակվում է մայրիկի, եղբոր, տատիկի և պապիկի հետ Ստեփանավանում: Ընտանիքի ...</span>

                            <span class="read-more">Կարդալ ավելին</span>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
                    <div class="stories-card">
                        <div class="stories-picture">
                            <img class="w-100" src="{{ asset('images/photo6.jpg') }}" alt="" title="">
                        </div>

                        <div class="stories-information d-flex flex-column">
                            <span class="stories-name">Միքայելի հաջողության պատմությունը</span>

                            <span class="stories-description">7-ամյա Միքայելը բնակվում է մայրիկի, եղբոր, տատիկի և պապիկի հետ Ստեփանավանում: Ընտանիքի ...</span>

                            <span class="read-more">Կարդալ ավելին</span>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
                    <div class="stories-card">
                        <div class="stories-picture">
                            <img class="w-100" src="{{ asset('images/photo7.jpg') }}" alt="" title="">
                        </div>

                        <div class="stories-information d-flex flex-column">
                            <span class="stories-name">Միքայելի հաջողության պատմությունը</span>

                            <span class="stories-description">7-ամյա Միքայելը բնակվում է մայրիկի, եղբոր, տատիկի և պապիկի հետ Ստեփանավանում: Ընտանիքի ...</span>

                            <span class="read-more">Կարդալ ավելին</span>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
                    <div class="stories-card">
                        <div class="stories-picture">
                            <img class="w-100" src="{{ asset('images/photo9.jpg') }}" alt="" title="">
                        </div>

                        <div class="stories-information d-flex flex-column">
                            <span class="stories-name">Միքայելի հաջողության պատմությունը</span>

                            <span class="stories-description">7-ամյա Միքայելը բնակվում է մայրիկի, եղբոր, տատիկի և պապիկի հետ Ստեփանավանում: Ընտանիքի ...</span>

                            <span class="read-more">Կարդալ ավելին</span>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
                    <div class="stories-card">
                        <div class="stories-picture">
                            <img class="w-100" src="{{ asset('images/photo10.jpg') }}" alt="" title="">
                        </div>

                        <div class="stories-information d-flex flex-column">
                            <span class="stories-name">Միքայելի հաջողության պատմությունը</span>

                            <span class="stories-description">7-ամյա Միքայելը բնակվում է մայրիկի, եղբոր, տատիկի և պապիկի հետ Ստեփանավանում: Ընտանիքի ...</span>

                            <span class="read-more">Կարդալ ավելին</span>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
                    <div class="stories-card">
                        <div class="stories-picture">
                            <img class="w-100" src="{{ asset('images/photo11.jpg') }}" alt="" title="">
                        </div>

                        <div class="stories-information d-flex flex-column">
                            <span class="stories-name">Միքայելի հաջողության պատմությունը</span>

                            <span class="stories-description">7-ամյա Միքայելը բնակվում է մայրիկի, եղբոր, տատիկի և պապիկի հետ Ստեփանավանում: Ընտանիքի ...</span>

                            <span class="read-more">Կարդալ ավելին</span>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
                    <div class="stories-card">
                        <div class="stories-picture">
                            <img class="w-100" src="{{ asset('images/photo12.jpg') }}" alt="" title="">
                        </div>

                        <div class="stories-information d-flex flex-column">
                            <span class="stories-name">Միքայելի հաջողության պատմությունը</span>

                            <span class="stories-description">7-ամյա Միքայելը բնակվում է մայրիկի, եղբոր, տատիկի և պապիկի հետ Ստեփանավանում: Ընտանիքի ...</span>

                            <span class="read-more">Կարդալ ավելին</span>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6 p-md-3 stories-card-wrap">
                    <div class="stories-card">
                        <div class="stories-picture">
                            <img class="w-100" src="{{ asset('images/stories12.png') }}" alt="" title="">
                        </div>

                        <div class="stories-information d-flex flex-column">
                            <span class="stories-name">Միքայելի հաջողության պատմությունը</span>

                            <span class="stories-description">7-ամյա Միքայելը բնակվում է մայրիկի, եղբոր, տատիկի և պապիկի հետ Ստեփանավանում: Ընտանիքի ...</span>

                            <span class="read-more">Կարդալ ավելին</span>

                        </div>
                    </div>
                </div>
            </div>

            <nav class="pagination-wrap" aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link-prev" href="#" aria-label="Previous">
                            <span aria-hidden="true">
                                <img class="img-fluid" src="{{ asset('images/pagination-prev.jpg') }}" alt="" title="">
                            </span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item page-item-active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link-next" href="#" aria-label="Next">
                            <span aria-hidden="true">
                                <img class="img-fluid" src="{{ asset('images/pagination-next.jpg') }}" alt="" title="">
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    @include('site.components.donate_now')
@endsection
