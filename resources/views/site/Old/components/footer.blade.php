<footer>
   <div class="w-full bg-gray-custom h-full bg-headerBg pb-5">
        <div class="container flex flex-wrap lg:flex-no-wrap justify-between mx-auto sm:py-10 py-2">
            <div class="flex hidden lg:block flex-col pr-5 m-2 lg:mt-0">
                <div>
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </div>
                @if($infos->socials)
                    <div class="flex my-5 flex-row">
                        @foreach($infos->socials as $social)
                            @if($social->icon)
                                <a href="{{ $social->url ?? 'javascript:void(0)' }}" class="text-black-lighter mr-2"{{ $social->url ? ' target="_blank"' : '' }}>
                                    <img src="{{ asset('u/banners/' . $social->icon) }}" alt="{{ $social->title ?? null }}" width="25" height="25">
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex flex-col lg:px-5 md:pr-5 m-2 lg:mt-0">
                @php($bottomPages = $pages->where('to_footer', true)->values())
                @if(count($bottomPages))
                    <div>
                        <p class="text-black-lighter font-bold mb-3">{{ t('Page footer.information') }}</p>
                    </div>
                    <div class="flex flex-col">
                        @foreach($bottomPages as $page)
                            <a href="{{ route('page', ['url' => $page->static == $homepage->static ? null : $page->url]) }}" class="text-black-lighter mb-2">
                                {{ $page->title }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex flex-col lg:px-5 md:pl-5 m-2 lg:mt-0">
                <div>
                    <p class="text-black-lighter font-bold mb-3">{{ t('Page footer.catalog') }}</p>
                </div>
                <div class="flex flex-col">
                    @if(count($footer_categories))
                        @foreach($footer_categories as $row => $category)
                            @if($row < 6)
                                <a href="{{ route('products.list', ['category' => $category->alias]) }}" class="text-black-lighter mb-2">
                                    {{ $category->name }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="flex flex-col lg:px-5 md:pr-10 m-2 lg:mt-0">
                <div>
                    <p class="text-black-lighter font-bold mb-3 opacity-0">{{ t('Page footer.catalog') }}</p>
                </div>
                <div class="flex flex-col">
                    @if(count($footer_categories))
                        @foreach($footer_categories as $row => $category)
                            @if($row >= 6)
                                <a href="{{ route('products.list', ['category' => $category->alias]) }}" class="text-black-lighter mb-2">
                                    {{ $category->name }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="flex flex-col lg:pl-5 m-2 lg:mt-0">
                <div>
                    <p class="text-black-lighter font-bold mb-3">{{ t('Page footer.feedback') }}</p>
                </div>
                <div class="flex flex-col">
                    <a href="" class="text-black-lighter flex gap-2 mb-2">
                        <img src="{{ asset('images/location.svg') }}">
                        {{ $infos->contacts[0]->address }}
                    </a>
                    <a href="tel:{{ $infos->contacts[0]->phone }}" class="text-black-lighter flex gap-2 mb-2">
                        <img src="{{ asset('images/phone-black.svg') }}" alt="">
                        {{ $infos->contacts[0]->phone }}
                    </a>
                    {{--<a href="" class="text-black-lighter flex gap-2 mb-2">
                        <img src="{{ asset('images/fax-black.svg') }}" alt="">
                        Ֆաքս: +374 (10) 26 72 42
                    </a>--}}
                    <a href="mailto:{{ $infos->contacts[0]->email }}" class="text-black-lighter flex gap-2 mb-2">
                        <img src="{{ asset('images/mail.svg') }}" alt="">
                        {{ $infos->contacts[0]->email }}
                    </a>
                </div>
                @if($infos->socials)
                    <div class="flex my-5 block lg:hidden flex-row">
                        @foreach($infos->socials as $social)
                            @if($social->icon)
                                <a href="{{ $social->url ?? 'javascript:void(0)' }}" class="text-black-lighter mr-2"{{ $social->url ? ' target="_blank"' : '' }}>
                                    <img src="{{ asset('u/banners/' . $social->icon) }}" alt="{{ $social->title ?? null }}" width="25" height="25">
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
                {{--<div class="flex  my-5 flex-row">
                    <a href="" class="mr-2">
                        <img class="rounded" src="{{ asset('images/arca.jpg') }}" alt="">
                    </a>
                    <a href="" class="mx-2">
                        <img class="rounded" src="{{ asset('images/maestro.jpg') }}" alt="">
                    </a>
                    <a href="" class="mx-2">
                        <img class="rounded" src="{{ asset('images/maestro.jpg') }}" alt="">
                    </a>
                    <a href="" class="mx-2">
                        <img class="rounded" src="{{ asset('images/visa.jpg') }}" alt="">
                    </a>
                </div>--}}
            </div>
        </div>
        <div class="container mx-auto flex justify-between flex-col lg:flex-row md:pb-0 pb-10">
            <p class="text-black-lighter md:text-sm text-xs">© R & V COMFORT 2020. Բոլոր իրավունքները պաշտպանված են</p>
            <p class="text-black-lighter md:text-sm text-xs">
                <a href="https://astudio.am/" class="text-headerBg text-sm" target="_blank" rel="noreferrer noopener">կայքերի պատրաստում </a> - ԱՍՏՈՒԴԻՈ ՍՊԸ
            </p>
        </div>
   </div>
</footer>
