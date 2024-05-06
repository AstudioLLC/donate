<header class="header-main d-flex justify-content-center align-items-center">
    <div class="header-container d-flex justify-content-between align-items-center">
        @include('site.includes.logos.headerLogo')
        <div class="header-right d-flex align-items-center">
            @include('site.includes.icons.headerSearch')
            <div class="mobile-header-detail-modal-wrap">
                <div class="mobile-header-modal">
                    <div class="nav-wrap">
                        <nav class="header-nav">
                            @include('site.includes.icons.headerMenuClose')
                            @include('site.includes.headerMenu', ['items' => $topPages ?? null])
                        </nav>
                    </div>
                    <a href="{{ route('page', ['url' => $ourPrograms->url ?? null]) }}" class="button-orange text-decoration-none">{{ __('frontend.Donate') }}</a>
                    @include('site.includes.headerLanguages', ['items' => $languages ?? null])
                </div>
            </div>
            @include('site.includes.icons.headerUserIcon')
            @include('site.includes.icons.headerMenuIcon')
            @if(auth()->user())
                <div class="profile-detail-modal-wrap">
                    <div class="close-profile-detail-modal-wrap">
                        <div class="close-profile-detail-modal-click">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                <path d="M11.1,10l8.666-8.666a.781.781,0,0,0-1.1-1.1L10,8.9,1.333.23a.781.781,0,0,0-1.1,1.1L8.895,10,.229,18.667a.781.781,0,0,0,1.1,1.1L10,11.106l8.666,8.666a.781.781,0,0,0,1.1-1.1Z" transform="translate(0 -0.001)" fill="#0a0a0a"></path>
                            </svg>
                        </div>
                    </div>
                    @include('site.pages.cabinet.includes.left_panel')
                </div>
            @endif
        </div>
    </div>
    @include('site.includes.search')
</header>
