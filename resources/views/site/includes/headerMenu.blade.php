@if($items)
    <ul class="mb-0 d-flex align-items-center header-nav-ul">
        @foreach($items as $item)
            <li class="header-nav-ul-li position-relative">
                @if($item->id !== 34 && $item->id !== 4)
                <a href="{{ route('page', ['url' => $item->url] )}}" class="nav_link text-decoration-none" {{ !count($item->childrenForHeader) ? 'href='. route('page', ['url' => $item->url]) .'' : null }}>
                    {{ $item->title }}
                    <span class="arrow-mobile d-lg-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8">
                            <path d="M7,105.141a.976.976,0,0,1-.693-.288L.288,98.818a.982.982,0,1,1,1.386-1.39L7,102.768l5.326-5.34a.982.982,0,0,1,1.386,1.39l-6.02,6.035A.976.976,0,0,1,7,105.141Z" transform="translate(-0.001 -97.141)" fill="#0a0a0a"/>
                        </svg>
                    </span>
                </a>
                @elseif($item->id == 34)
                    <a href="{{ route('page', ['url' => 'our-mission-and-vision'] )}}" class="nav_link text-decoration-none" {{ !count($item->childrenForHeader) ? 'href='. route('page', ['url' => 'our-mission-and-vision']) .'' : null }}>
                        {{ $item->title }}
                        <span class="arrow-mobile d-lg-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8">
                            <path d="M7,105.141a.976.976,0,0,1-.693-.288L.288,98.818a.982.982,0,1,1,1.386-1.39L7,102.768l5.326-5.34a.982.982,0,0,1,1.386,1.39l-6.02,6.035A.976.976,0,0,1,7,105.141Z" transform="translate(-0.001 -97.141)" fill="#0a0a0a"/>
                        </svg>
                    </span>
                    </a>
                @elseif($item->id == 4)
                    <a href="{{ route('page', ['url' => 'about-sponsorship'] )}}" class="nav_link text-decoration-none" {{ !count($item->childrenForHeader) ? 'href='. route('page', ['url' => 'about-sponsorship']) .'' : null }}>
                        {{ $item->title }}
                        <span class="arrow-mobile d-lg-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8">
                            <path d="M7,105.141a.976.976,0,0,1-.693-.288L.288,98.818a.982.982,0,1,1,1.386-1.39L7,102.768l5.326-5.34a.982.982,0,0,1,1.386,1.39l-6.02,6.035A.976.976,0,0,1,7,105.141Z" transform="translate(-0.001 -97.141)" fill="#0a0a0a"/>
                        </svg>
                    </span>
                    </a>
                @endif

                @if(count($item->childrenForHeader))
                    <span class="d-block header-dropdown-list-wrap">
                        <span class="header-dropdown-list d-flex flex-column position-relative">
                            @foreach($item->childrenForHeader as $children)
                                @if($children->id !== 23)
                                <a href="{{ route('page', ['url' => $children->url]) }}" class="header-dropdown-list-link text-decoration-none">
                                    {{ $children->title }}
                                </a>

                                @endif
                            @endforeach
                        </span>
                    </span>
                @endif
            </li>
        @endforeach
    </ul>
@endif
