@if($items)
    <div class="language-dropdown-main-wrap d-flex flex-column">
        <span class="mobile-languages-text d-lg-none">{{ __('frontend.Language') }}</span>
        <div class="dropdown language-dropdown-wrap">
            <li class="header-language-button d-flex align-items-center"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="text-span"></span>
                <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="8" height="5" viewBox="0 0 8 5">
                    <g transform="translate(-0.001 -97.141)">
                        <path d="M4,102.141a.535.535,0,0,1-.4-.18L.165,98.189a.657.657,0,0,1,0-.869.526.526,0,0,1,.792,0L4,100.658,7.044,97.32a.526.526,0,0,1,.792,0,.657.657,0,0,1,0,.869L4.4,101.961A.535.535,0,0,1,4,102.141Z" transform="translate(0 0)"></path>
                    </g>
                </svg>
            </li>

            <ul class="dropdown-menu language-dropdown" aria-labelledby="dropdownMenuButton1">
                @foreach($items as $item)
                    <li class="">
                        <a class="dropdown-item @if(app()->getLocale() == $item->iso ?? 'hy') active @endif language-dropdown-item d-flex align-items-center" href="{{ app()->getLocale() !== $item->iso ? url(\LanguageManager::getUrlWithLocale($item->iso)) : 'javascript:void(0)' }}">
                                <span class="d-flex justify-content-center align-items-center language-circle d-lg-none">
                                    <span class="active-circle-background"></span>
                                </span>
                            {{ $item->title }}
                        </a>
                    </li>

                @endforeach
            </ul>
        </div>
    </div>
@endif
