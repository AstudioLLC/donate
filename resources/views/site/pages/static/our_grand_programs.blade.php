@extends('site.layouts.app')

@section('content')

    <main id="app">
        @include('site.components.breadcrumb', ['items' => $breadcrumbs ?? null])

        <div class="page-wrap">
            <div class="container-small">
                <div class="col-12 p-0">
                    <img src="{{$page->getImageUrl('thumbnail')}}" alt="" class="w-100">
                </div>
                <div class="col-12 pt-3 pt-lg-5 px-0">
                    <div class="editor">
                        {!! $page->content !!}
                    </div>
                </div>

                @if(count($achievements))
                    <h2 class="title-usual mt-4 mt-lg-5 mb-4" style="text-align: left; color: #f86a04;"> {{__('frontend.Key Achievements')}} </h2>
                    <div class="main-achievement-section">
                        <div class="main-achievement-slide swiper">
                            <div class="swiper-wrapper">
                                @foreach($achievements as $achievement)
                                    <div class="main-achievement-slide__item swiper-slide">
                                        <h4 class="main-achievement-slide__title mb-3 mb-md-4 mb-lg-5">{{$achievement->title}}</h4>
                                        <p class="main-achievement-slide__text">{!! $achievement->content !!}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="main-achievement-slide-btns">
                                <div class="main-achievement-slide__next swiper-button-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16">
                                        <g id="right-arrow" transform="translate(-7 -131)">
                                            <g id="Group_5191" data-name="Group 5191" transform="translate(-4 131)">
                                                <path id="Path_5715" data-name="Path 5715"
                                                      d="M28.668,138.2h0l-6.92-6.871a1.131,1.131,0,0,0-1.6,1.6l4.975,4.942H8.132a1.129,1.129,0,1,0,0,2.258H25.124l-4.975,4.942a1.131,1.131,0,0,0,1.6,1.6l6.92-6.871h0A1.128,1.128,0,0,0,28.668,138.2Z"
                                                      transform="translate(4 -131)" fill="#cf4a00"/>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="main-achievement-slide__prev swiper-button-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16">
                                        <g id="Group_5191" data-name="Group 5191" transform="translate(0)">
                                            <path id="Path_5715" data-name="Path 5715"
                                                  d="M7.332,138.2h0l6.92-6.871a1.131,1.131,0,0,1,1.6,1.6l-4.975,4.942H27.868a1.129,1.129,0,1,1,0,2.258H10.876l4.975,4.942a1.131,1.131,0,0,1-1.6,1.6L7.333,139.8h0A1.128,1.128,0,0,1,7.332,138.2Z"
                                                  transform="translate(-7 -131)" fill="#cf4a00"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="main-achievement-slide__pagin swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="editor py-3 py-lg-5">
                    {!! $page->sec_content !!}
                </div>
                @if(count($page->gallery))
                    <h2 class="title-usual mt-0 mt-md-3 mb-4"> {{__('frontend.Photo Gallery')}} </h2>
                    <div class="main-achievement-section">
                        <div class="main-achievement-gallery-slide swiper">
                            <div class="swiper-wrapper">
                                @foreach($page->gallery as $gallery)
                                    <div class="main-achievement-gallery-slide__item swiper-slide">
                                        <img src="{{ $gallery->getImageUrl('thumbnail', $gallery->image) }}" alt=""
                                             class="w-100">
                                    </div>
                                @endforeach
                            </div>
                            <div class="main-achievement-gallery-slide-btns">
                                <div class="main-achievement-gallery-slide__next swiper-button-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16">
                                        <g id="right-arrow" transform="translate(-7 -131)">
                                            <g id="Group_5191" data-name="Group 5191" transform="translate(-4 131)">
                                                <path id="Path_5715" data-name="Path 5715"
                                                      d="M28.668,138.2h0l-6.92-6.871a1.131,1.131,0,0,0-1.6,1.6l4.975,4.942H8.132a1.129,1.129,0,1,0,0,2.258H25.124l-4.975,4.942a1.131,1.131,0,0,0,1.6,1.6l6.92-6.871h0A1.128,1.128,0,0,0,28.668,138.2Z"
                                                      transform="translate(4 -131)" fill="#cf4a00"/>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="main-achievement-gallery-slide__prev swiper-button-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16">
                                        <g id="Group_5191" data-name="Group 5191" transform="translate(0)">
                                            <path id="Path_5715" data-name="Path 5715"
                                                  d="M7.332,138.2h0l6.92-6.871a1.131,1.131,0,0,1,1.6,1.6l-4.975,4.942H27.868a1.129,1.129,0,1,1,0,2.258H10.876l4.975,4.942a1.131,1.131,0,0,1-1.6,1.6L7.333,139.8h0A1.128,1.128,0,0,1,7.332,138.2Z"
                                                  transform="translate(-7 -131)" fill="#cf4a00"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="main-achievement-slide__pagin swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(count($page->videos))

                    <h2 class="title-usual mt-4 mt-md-3 mb-4"> {{__('frontend.Related Videos')}} </h2>
                    <div class="main-achievement-section">
                        <div class="main-achievement-video-slide swiper">
                            <div class="swiper-wrapper">
                                @foreach($page->videos as $video)
                                    <div class="main-achievement-video-slide__item swiper-slide">
                                        <iframe width="100%" height="100%"
                                                src="//www.youtube.com/embed/{{$video->link}}?enablejsapi=1"
                                                title="Main Points on Women&#39;s Achievement in History | Homework Joy"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin"
                                                allowfullscreen></iframe>
                                    </div>
                                @endforeach
                            </div>
                            <div class="main-achievement-video-slide-btns">
                                <div class="main-achievement-video-slide__next swiper-button-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16">
                                        <g id="right-arrow" transform="translate(-7 -131)">
                                            <g id="Group_5191" data-name="Group 5191" transform="translate(-4 131)">
                                                <path id="Path_5715" data-name="Path 5715"
                                                      d="M28.668,138.2h0l-6.92-6.871a1.131,1.131,0,0,0-1.6,1.6l4.975,4.942H8.132a1.129,1.129,0,1,0,0,2.258H25.124l-4.975,4.942a1.131,1.131,0,0,0,1.6,1.6l6.92-6.871h0A1.128,1.128,0,0,0,28.668,138.2Z"
                                                      transform="translate(4 -131)" fill="#cf4a00"/>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="main-achievement-video-slide__prev swiper-button-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16">
                                        <g id="Group_5191" data-name="Group 5191" transform="translate(0)">
                                            <path id="Path_5715" data-name="Path 5715"
                                                  d="M7.332,138.2h0l6.92-6.871a1.131,1.131,0,0,1,1.6,1.6l-4.975,4.942H27.868a1.129,1.129,0,1,1,0,2.258H10.876l4.975,4.942a1.131,1.131,0,0,1-1.6,1.6L7.333,139.8h0A1.128,1.128,0,0,1,7.332,138.2Z"
                                                  transform="translate(-7 -131)" fill="#cf4a00"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="main-achievement-slide__pagin swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(count($page->success_stories))
                    <h2 class="title-usual mt-4 mt-lg-5 mb-4" style="text-align: left; color: #f86a04;">{{__('frontend.Related Stories')}}</h2>
                    <div class="main-achievement-section">
                        <div class="main-achievement-history-slide swiper">
                            <div class="swiper-wrapper">
                                @foreach($page->success_stories as $story)
                                <div class="main-achievement-history-slide__item swiper-slide">
                                    <img src="{{$story->getImageUrl('thumbnail', $story->imageSmall)}}" class="w-100" alt="">
                                    <div class="main-achievement-history-slide__info">
                                        <h4 class="main-achievement-history-slide__title mb-3 mb-md-4">{{$story->title}}</h4>
                                        <a href="{{route('success_stories.detail',$story->url)}}" class="main-achievement-history-slide__link">{{__('frontend.Read more')}}</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="main-achievement-history-slide-btns">
                                <div class="main-achievement-history-slide__next swiper-button-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16">
                                        <g id="right-arrow" transform="translate(-7 -131)">
                                            <g id="Group_5191" data-name="Group 5191" transform="translate(-4 131)">
                                                <path id="Path_5715" data-name="Path 5715"
                                                      d="M28.668,138.2h0l-6.92-6.871a1.131,1.131,0,0,0-1.6,1.6l4.975,4.942H8.132a1.129,1.129,0,1,0,0,2.258H25.124l-4.975,4.942a1.131,1.131,0,0,0,1.6,1.6l6.92-6.871h0A1.128,1.128,0,0,0,28.668,138.2Z"
                                                      transform="translate(4 -131)" fill="#cf4a00"/>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="main-achievement-history-slide__prev swiper-button-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16">
                                        <g id="Group_5191" data-name="Group 5191" transform="translate(0)">
                                            <path id="Path_5715" data-name="Path 5715"
                                                  d="M7.332,138.2h0l6.92-6.871a1.131,1.131,0,0,1,1.6,1.6l-4.975,4.942H27.868a1.129,1.129,0,1,1,0,2.258H10.876l4.975,4.942a1.131,1.131,0,0,1-1.6,1.6L7.333,139.8h0A1.128,1.128,0,0,1,7.332,138.2Z"
                                                  transform="translate(-7 -131)" fill="#cf4a00"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="main-achievement-slide__pagin swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(count($page->newses))
                    <h2 class="title-usual mt-4 mt-lg-5 mb-4" style="text-align: left; color: #f86a04;">{{__('frontend.Search.News & Events')}}</h2>
                    <div class="main-achievement-section">
                        <div class="main-achievement-history-slide swiper">
                            <div class="swiper-wrapper">
                                @foreach($page->newses as $news)
                                    <div class="main-achievement-history-slide__item swiper-slide">
                                        <img src="{{$news->getImageUrl('thumbnail', $news->imageSmall)}}" class="w-100" alt="">
                                        <div class="main-achievement-history-slide__info">
                                            <h4 class="main-achievement-history-slide__title mb-3 mb-md-4">{{$news->title}}</h4>
                                            <a href="{{route('news.detail',$news->url)}}" class="main-achievement-history-slide__link">{{__('frontend.Read more')}}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="main-achievement-history-slide-btns">
                                <div class="main-achievement-history-slide__next swiper-button-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16">
                                        <g id="right-arrow" transform="translate(-7 -131)">
                                            <g id="Group_5191" data-name="Group 5191" transform="translate(-4 131)">
                                                <path id="Path_5715" data-name="Path 5715"
                                                      d="M28.668,138.2h0l-6.92-6.871a1.131,1.131,0,0,0-1.6,1.6l4.975,4.942H8.132a1.129,1.129,0,1,0,0,2.258H25.124l-4.975,4.942a1.131,1.131,0,0,0,1.6,1.6l6.92-6.871h0A1.128,1.128,0,0,0,28.668,138.2Z"
                                                      transform="translate(4 -131)" fill="#cf4a00"/>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="main-achievement-history-slide__prev swiper-button-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16">
                                        <g id="Group_5191" data-name="Group 5191" transform="translate(0)">
                                            <path id="Path_5715" data-name="Path 5715"
                                                  d="M7.332,138.2h0l6.92-6.871a1.131,1.131,0,0,1,1.6,1.6l-4.975,4.942H27.868a1.129,1.129,0,1,1,0,2.258H10.876l4.975,4.942a1.131,1.131,0,0,1-1.6,1.6L7.333,139.8h0A1.128,1.128,0,0,1,7.332,138.2Z"
                                                  transform="translate(-7 -131)" fill="#cf4a00"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="main-achievement-slide__pagin swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
