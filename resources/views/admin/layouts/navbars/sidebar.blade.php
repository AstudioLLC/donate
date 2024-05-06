<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('admin.dashboard.index') }}{{--{!! route(env('CMS_HOMEPAGE_ROUTE')) !!}--}}">
            <img src="{{ asset('cms') }}/img/brand/logo2.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        {{--<img alt="Image placeholder" src="{{ asset('cms') }}/img/theme/team-1-800x800.jpg">--}}
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('app.Welcome!') }}</h6>
                    </div>
                    <a href="{{--{{ route('profile.edit') }}--}}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('app.My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('app.Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('app.Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('app.Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('app.Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('admin.dashboard.index') }}{{--{!! route(env('CMS_HOMEPAGE_ROUTE')) !!}--}}">
                            <img src="{{ asset('cms') }}/img/brand/logo.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('app.Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->

            @if(checkPermission(['superadmin']))
            @endif
            <ul class="navbar-nav">
{{--                @if(checkPermission(['superadmin']))--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('admin.database.index') }}">--}}
{{--                            <i class="ni ni-caps-small text-primary"></i> *Database Switcher*--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endif--}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard.index') }}{{--{!! route(env('CMS_HOMEPAGE_ROUTE')) !!}--}}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('app.Dashboard') }}
                    </a>
                </li>

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.languages.index') }}">
                            <i class="ni ni-caps-small text-primary"></i> {{ __('app.Languages') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['superadmin', 'moderator','accountant']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.donations.index') }}">
                            <i class="fas fa-coins text-primary"></i> {{ __('app.Donations') }}
                            @if(count($new_donations))
                                <span class="pulse"></span>
                                <span class="badge text-primary badge-pill float-right mr-2">{{count($new_donations)}}</span>
                            @endif
                        </a>
                    </li>
                @endif

                @if(checkPermission(['superadmin']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.bindings.index') }}">
                            <i class="fas fa-hand-holding-usd text-primary"></i> {{ __('app.Bindings') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.sliders.index') }}">
                            <i class="far fa-images text-primary"></i> {{ __('app.Sliders') }}
                        </a>
                    </li>
                @endif
                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.our_publications.index') }}">
                            <i class="far fa-images text-primary"></i> {{ __('app.Our publications') }}
                        </a>
                    </li>
                @endif
                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.tenders.index') }}">
                            <i class="far fa-images text-primary"></i> {{ __('app.Tenders') }}
                        </a>
                    </li>
                @endif
                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.achievements.index') }}">
                            <i class="far fa-images text-primary"></i> {{ __('app.Our achievements') }}
                        </a>
                    </li>
                @endif
                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.welcome_modals.index') }}">
                            <i class="far fa-images text-primary"></i> {{ __('app.Welcome Modal') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.pages.index') }}">
                            <i class="ni ni-bullet-list-67 text-primary"></i> {{ __('app.Pages') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.news.index') }}">
                            <i class="ni ni-bullet-list-67 text-primary"></i> {{ __('app.News') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.core_values.index') }}">
                            <i class="ni ni-bullet-list-67 text-primary"></i> {{ __('app.Our Core Values') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.corporate_donors.index') }}">
                            <i class="ni ni-bullet-list-67 text-primary"></i> {{ __('app.Corporate Donors') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.success_stories.index') }}">
                            <i class="ni ni-bullet-list-67 text-primary"></i> {{ __('app.Success Stories') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.blocks.index') }}">
                            <i class="ni ni-bullet-list-67 text-primary"></i> {{ __('app.Info Blocks') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home_blocks.index') }}">
                            <i class="ni ni-bullet-list-67 text-primary"></i> {{ __('app.Home Blocks') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.countries.index') }}">
                            <i class="fas fa-globe text-primary"></i> {{ __('app.Countries') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['superadmin']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.administrators.index') }}">
                            <i class="ni ni-single-02 text-primary"></i> {{ __('app.Administrators') }}
                        </a>
                    </li>
                @endif

{{--                @if(checkPermission(['content']))--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('admin.subscribers.index') }}">--}}
{{--                            <i class="fas fa-paper-plane text-primary"></i> {{ __('app.Subscribers') }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endif--}}

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.socials.index') }}">
                            <i class="fas fa-share-alt text-primary"></i> {{ __('app.Social networks') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.faqs.index') }}">
                            <i class="fas fa-question text-primary"></i> {{ __('app.FAQ') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.regions.index') }}">
                            <i class="fas fa-map-marker-alt text-primary"></i> {{ __('app.Regions') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.needs.index') }}">
                            <i class="ni ni-bullet-list-67 text-primary"></i> {{ __('app.Needs') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['admin']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.children.index') }}">
                            <i class="ni ni-single-02 text-primary"></i> {{ __('app.Children') }}
                            @if(count($unread_messages))
                                <span class="pulse"></span>
                                <span class="badge text-primary badge-pill float-right mr-2">{{count($unread_messages)}}</span>
                            @endif
                        </a>


                    </li>
                @endif

                @if(checkPermission(['admin']))
                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('admin.sponsors.index') }}">
                            <i class="ni ni-single-02 text-primary"></i> {{ __('app.Sponsors') }}
                            @if($new_users_count)
                                <span class="badge text-primary badge-pill float-right mr-2">{{ $new_users_count }}</span>
                            @endif
                        </a>
                    </li>
                @endif

                @if(checkPermission(['admin']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.gifts.index') }}">
                            <i class="fas fa-gift text-primary"></i> {{ __('app.Gifts') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['admin']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.fundraisers.index') }}">
                            <i class="ni ni-app text-primary"></i> {{ __('app.Fundraisers') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.volunteering.index') }}">
                            <i class="fas fa-hands-helping text-primary"></i> {{ __('app.Volunteering') }}
                            @if(count($seen))
                                <span class="pulse"></span>
                                <span class="badge text-primary badge-pill float-right mr-2">{{count($seen)}}</span>
                            @endif
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.information.edit', ['id' => 1]) }}">
                            <i class="fas fa-info-circle text-primary"></i> {{ __('app.Information') }}
                        </a>
                    </li>
                @endif

                @if(checkPermission(['content']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.messages.index') }}">
                            <i class="fas fa-envelope text-primary"></i> {{ __('app.Messages') }}
                            @if(count($message_unread))
                                <span class="pulse"></span>
                                <span class="badge text-primary badge-pill float-right mr-2">{{count($message_unread)}}</span>
                            @endif
                        </a>
                    </li>
                @endif


                {{--<li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Laravel Examples') }}*</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="--}}{{--{{ route('profile.edit') }}--}}{{--">
                                    {{ __('User profile') }}*
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="--}}{{--{{ route('user.index') }}--}}{{--">
                                    {{ __('User Management') }}*
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="--}}{{--{{ route('icons') }}--}}{{--">
                        <i class="ni ni-planet text-blue"></i> {{ __('Icons') }}*
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="--}}{{--{{ route('map') }}--}}{{--">
                        <i class="ni ni-pin-3 text-orange"></i> {{ __('Maps') }}*
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="--}}{{--{{ route('table') }}--}}{{--">
                        <i class="ni ni-bullet-list-67 text-default"></i>
                        <span class="nav-link-text">Tables</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-circle-08 text-pink"></i> {{ __('app.Register') }}
                    </a>
                </li>--}}
            </ul>
            {{--<!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul>--}}
        </div>
    </div>
</nav>
