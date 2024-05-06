

@push('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/gift-card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/demo-modals.css') }}">
@endpush


@if($item)

    <div class="sponsor-card-wrapper">
        <div class="sponsor-card">
            <div class="children-photo d-flex align-items-sm-start">
                @if($item->image)
                    <div class="children-photo-wrap">
                        <img class="img-fluid"
                             src="{{ $item->getImageUrl('thumbnail') }}"
                             alt="{{ $item->title }}"
                             title="{{ $item->title }}">
                    </div>
                @endif
            <div class="children-info d-flex flex-column d-md-none">
                <span class="text-default children-name">
                    {{ $item->title ?? null }}
                </span>
                    <span class="text-default children-age">
                    {{ $item->child_id ?? null }}
                </span>
                    <span class="text-default children-age">
                    {{ __('frontend.cabinet.Age') }} {{ $item->calculateAge() }}
                </span>
                </div>
            </div>
            <div class="card-details d-flex flex-column w-100">
                <div class="children-info-web d-none d-md-flex flex-column">
                <span class="text-default children-name">
                    {{ $item->title ?? null }}
                </span>
                <span class="text-default children-age">
                    Child ID:  {{ $item->child_id ?? null }}
                </span>
                    <span class="text-default children-age">
                    {{ __('frontend.cabinet.Age') }} {{ $item->calculateAge() }}
                </span>
                </div>
                <div class="row w-100 m-0 sponsor-card-links-group">
                    @if(count($item->videos))
                        <div class="col-12 col-sm-6 col-md-4 p-3 ps-0 p-md-0 col-lg-auto pb-md-2 pe-lg-2">
                            @if(auth()->user() && count($unread_videos))
                                @foreach($unread_videos as $unread)
                                    @if($unread->key == $item->id)
                                        <div class="online-1 position-absolute"></div>
                                    @endif
                                @endforeach
                            @endif
                            <a data-id='{!! $item->id !!}' class="post-video d-flex align-items-center sponsor-card-link text-decoration-none open-videos sponsor-card-click" data-bs-toggle="modal" data-bs-target="#videoModal{{$item->id}}">
                                <img class="img-fluid"
                                     src="{{ asset('images/play.svg') }}"
                                     alt="{{ $item->title }}"
                                     title="{{ $item->title }}">
                                <span class="sponsor-card-link-span text-decoration-none text-default">
                            {{ __('frontend.cabinet.Videos') }}
                        </span>
                            </a>
                        </div>

                    @endif
                    @if(count($item->gallery))

                        <div class="col-12 col-sm-6 col-md-4 p-3 ps-0 p-md-0 col-lg-auto pe-lg-2">
                            @if(auth()->user() && count($unread_photos))
                                @foreach($unread_photos as $unread)
                                    @if($unread->key == $item->id)
                                        <div class="online-1 position-absolute"></div>
                                    @endif
                                @endforeach
                            @endif
                            <a data-id='{!! $item->id !!}' class="post-photo d-flex align-items-center sponsor-card-link text-decoration-none open-photos sponsor-card-click"  data-bs-toggle="modal" data-bs-target="#galleryModal{{$item->id}}">
                                <img class="img-fluid"
                                     src="{{ asset('images/photos.svg') }}"
                                     alt="{{ $item->title }}"
                                     title="{{ $item->title }}">
                                <span class="sponsor-card-link-span text-decoration-none text-default">
                            {{ __('frontend.cabinet.Photos') }}
                        </span>
                            </a>
                        </div>
                    @endif
                    <div class="col-12 col-sm-6 col-md-4 p-3 ps-0 p-md-0 col-lg-auto pe-lg-2">
                        @if(auth()->user() && count($unread_messages))
                            @foreach($unread_messages as $unread)
                                @if($unread->children_id == $item->id)
                                    <div class="online-1 position-absolute"></div>
                                @endif
                            @endforeach
                        @endif
                        <a class="d-flex align-items-center sponsor-card-link text-decoration-none"
                           href="{{ route('cabinet.chat.index', ['childrenId' => $item->id, 'sponsorId' => $user->id]) }}">
                            <img class="img-fluid"
                                 src="{{ asset('images/letters.svg') }}"
                                 alt="{{ $item->title }}"
                                 title="{{ $item->title }}">

                            <span class="sponsor-card-link-span text-decoration-none text-default">
                                 {{ __('frontend.cabinet.Letters') }}
                            </span>
                        </a>
                    </div>
                    @if(count($item->reports))

                        <div class="col-12 col-sm-6 col-md-4 p-3 ps-0 p-md-0 col-lg-auto pe-lg-2">
                            @if(auth()->user() && count($unread_reports))
                                @foreach($unread_reports as $unread)
                                    @if($unread->key == $item->id)
                                        <div class="online-1 position-absolute"></div>
                                    @endif
                                @endforeach
                            @endif
                            <a data-id='{!! $item->id !!}' class="d-flex align-items-center sponsor-card-link text-decoration-none modal-reports-btn donate-modal-btn sponsor-card-click post-report" data-bs-toggle="modal" data-bs-target="#reportsModal{{$item->id}}">
                                <img class="img-fluid"
                                     src="{{ asset('images/reports.svg') }}"
                                     alt="{{ $item->title }}"
                                     title="{{ $item->title }}">
                                <span class="sponsor-card-link-span text-decoration-none text-default">
                            {{ __('frontend.cabinet.Reports') }}
                        </span>
                            </a>
                        </div>
                    @endif


                </div>
                <div class="row w-100 m-0 sponsor-card-buttons-group">
                    <div class="col-12 col-sm-4 p-2 ps-0">
                        <a href="{{route('cabinet.donate.create.step1',['id' => $item->id])}}" type="button"
                           class="button-orange text-decoration-none">
                            {{ __('frontend.cabinet.Donate') }}
                        </a>
                    </div>
                    <div class="col-12 col-sm-4 p-2 ps-0">
                        <a type="button" id="clickfordetails" data-id='{!! $item->id !!}'
                           class="button-orange button-orange-white text-decoration-none open-card-details">
                            {{ __('frontend.cabinet.Details') }}
                            @foreach($unread_socialStories as $unread_socialStory)
                                @if($unread_socialStory->key == $item->id)
                                    <div style="display: initial;" class="online-1 position-absolute"></div>
                                @endif
                            @endforeach
                        </a>

                    </div>
                    <div class="col-12 col-sm-4 p-2 ps-0">
                        <a type="button" class="button-orange button-orange-gift text-decoration-none">
                            {{ __('frontend.cabinet.Give a gift') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sponsor-card-bottom">
            @if(!empty($item->files))
                <div class="social-story-block d-flex flex-column">
                    <span class="title-usual profile-title">{{(__('frontend.cabinet.Social Story'))}}</span>
                    <div class="mx-0 row social-story-block">
                        @foreach($item->files as $file)
                            <div class="col-12 col-sm-6 p-1">
                                <div class="modal-report-box">
                                    <div class="modal-report-box-filename">
                                        <div class="modal-report-box-file-icon">
                                            <img class="w-100" src="{{asset('images/pdf.svg')}}" alt="" title="">
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="{{ $file->getImageUrl('thumbnail', $file->name) }}" class="text-decoration-none border-none" target="_blank">
                                                <span class="modal-report-box-filename-text">{{$file->title}}</span>
                                                <span class="box-date">{{ date('d-M-Y', strtotime($file->created_at)) }}</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="modal-report-box-download-icon">
                                        <a href="{{ $file->getImageUrl('thumbnail', $file->name) }}"  download>
{{--                                            <img class="w-100" src="{{asset('images/download.svg')}}" alt="" title="">--}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="give-gift-page d-flex flex-column">
                <span class="title-usual text-start title-small">{{__('frontend.cabinet.Give a gift')}}</span>
                <span class="gift-description">
                            {{__('frontend.cabinet.Give a gift text')}}
                        </span>

                <div class="mx-0 row gifts-row">
                    @foreach($gifts as $gift)
                        <div class="col-12 col-sm-6 p-2">
                            <a href="{{ route('gifts.detail', ['url' => $gift->url ?? null, 'id' => $item->id]) }}"
                               class="text-decoration-none gift-card d-flex flex-column h-100">
                                <div class="gift-card d-flex flex-column h-100">
                                    @if($gift->imageSmall)
                                        <div class="gift-card-image">
                                            <img class="w-100"
                                                 src="{{ $gift->getImageUrl('thumbnail', $gift->imageSmall) }}"
                                                 alt="{{ $gift->title }}"
                                                 title="{{ $gift->title }}">
                                        </div>
                                    @endif
                                    <div class="gift-card-details d-flex flex-column">
                                        <span class="gift-card-name">{{$gift->title ?? null}}</span>
                                        <span class="gift-card-description">
                                        {{Str::limit(strip_tags( $gift->content ?? null,310)) }}
                                        </span>

                                        <span
                                            class="gift-price">{{ __('frontend.Gifts.Price:') }} {{ $gift->cost }}  {{ __('frontend.Gifts.AMD') }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <a href="{{url('give-a-gift')}}" class="button-orange text-decoration-none pt-2">{{ __('frontend.Gifts.See more') }}</a>
            </div>
        </div>
    </div>
@endif


@if(count($childrens))
    @foreach($childrens as $key => $child)
        <!-- Modal reports-->
        <div class="modal fade" style="transform: translateY(20%);" id="reportsModal{{$child->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border:none; padding:60px 25px;border-radius: 14px;background: #fff">
                    <div class="modal-body">
                        <span class="title-usual text-center">{{__('frontend.cabinet.Reports')}}</span>
                        <div class="modal-reports-list d-flex flex-column">
                            @foreach($child->reports as $report)
                                <div class="modal-report-box">
                                    <div class="modal-report-box-filename">
                                        <div class="modal-report-box-file-icon">
                                            <img class="w-100" src="{{ asset('images/pdf.svg') }}" alt="" title="">
                                        </div>
                                        <a href="{{ $report->getImageUrl('thumbnail', $report->name) }}" class="text-decoration-none border-none" target="_blank">
                                        <span class="modal-report-box-filename-text">{{$report->title}}</span>
                                            <span class="text-end">{{$item->created_at}}</span>
                                        </a>
                                    </div>
                                    <div class="modal-report-box-download-icon">
                                        <a href="{{ $report->getImageUrl('thumbnail', $report->name) }}"  target="_blank"  download>
{{--                                            <img class="w-100" src="{{ asset('images/download.svg') }}" alt="" title="">--}}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="donate-modal-close reports-modal-close d-flex justify-content-center align-items-center">
                                <button class="button-orange btn-orange-close" data-bs-dismiss="modal">{{__('frontend.cabinet.Close')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            let url = "{!! route('report.seen', ['key' => ':slug']) !!}";

            $(".post-report").click(function(){
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
            let video_url = "{!! route('video.seen', ['key' => ':slug']) !!}";

            $(".post-video").click(function(){
                $.ajax({
                    url: video_url.replace(':slug', $(this).data('id')),
                    method: 'post',
                    dataType: 'json',
                    data: {
                        _method: 'post',
                        key: $(this).data('id'),
                        value: $(this).data('id'),
                    },
                });
            });
            let photo_url = "{!! route('photo.seen', ['key' => ':slug']) !!}";

            $(".post-photo").click(function(){
                $.ajax({
                    url: photo_url.replace(':slug', $(this).data('id')),
                    method: 'post',
                    dataType: 'json',
                    data: {
                        _method: 'post',
                        key: $(this).data('id'),
                        value: $(this).data('id'),
                    },
                }).then(function (){
                    console.log(photo_url)
                });
            });

            let socialStory_url = "{!! route('socialstory.seen', ['key' => ':slug']) !!}";

            $("#clickfordetails").click(function(){
                $.ajax({
                    url: socialStory_url.replace(':slug', $(this).data('id')),
                    method: 'post',
                    dataType: 'json',
                    data: {
                        _method: 'post',
                        key: $(this).data('id'),
                        value: $(this).data('id'),
                    },
                }).then(function (){
                    console.log(socialStory_url)
                });
            });
        })

    </script>

@endpush
