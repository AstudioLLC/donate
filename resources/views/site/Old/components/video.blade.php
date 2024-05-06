@if(count($video))
    @foreach($video as $item)
        <div class="relative w-100">
            <div class="container relative h-full z-10">
                <div class="my-5">
                    @if($item->link)
                        <iframe width="100%" height="500"
                            src="{{ $item->link }}?autoplay=1&mute=1">
                        </iframe>
                    @elseif($item->name)
                        <video controls autoplay muted loop width="1440" >
                            <source src="{{ asset('u/video/' . $item->name) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                    {{--@if($item->url)
                        <div class="md:py-5 py-2 flex">
                            @if($item->url_text)
                                <div class="relative mr-1">
                                    <i class="fa fa-caret-left absolute text-xl text-white top-50 translate-rotate-50 right--7"
                                       aria-hidden="true">
                                    </i>
                                    <button type="button" class="w-full md:text-sm text-xss py-0 md:py-3 md:h-10 h-5 md:px-3 px-1 bg-white rounded flex text-black items-center justify-center">
                                        {{ $item->url_text }}
                                    </button>
                                </div>
                            @endif
                            <div class="rounded w-auto px-2 ml-2 md:h-10 h-5 flex items-center justify-center border border-black-lighter bg-black-lighter">
                                <a href="{{ $item->url }}"
                                   title="{{ $item->top_text }}"
                                   class="text-gray-dark md:text-sm text-xs items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.051" height="16.908" viewBox="0 0 24.051 16.908">
                                        <path d="M16.2,4.93a.853.853,0,0,0-1.212,1.2l6.145,6.145H.86A.854.854,0,0,0,0,13.123a.864.864,0,0,0,.861.861H21.138l-6.145,6.134a.87.87,0,0,0,0,1.212.849.849,0,0,0,1.212,0l7.6-7.6a.855.855,0,0,0,0-1.2Z" transform="translate(0.001 -4.676)" fill="#fff"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endif--}}
                </div>
            </div>
        </div>
    @endforeach
@endif
