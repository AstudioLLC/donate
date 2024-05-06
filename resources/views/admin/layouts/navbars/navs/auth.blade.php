<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        {{--<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{!! route(env('CMS_HOMEPAGE_ROUTE')) !!}">
            {{ __('app.Dashboard') }}
        </a>--}}
        <!-- Form -->
        <button class="navbar-toggler-icon close" style="cursor: pointer">
        </button>
        <button class="navbar-toggler-icon open d-none" style="cursor: pointer">
        </button>

        <style>
            .opacity-left-nav{
                opacity: 0;
            }
            .open{
                padding: 0;
                border: 0;
                background-color: transparent;
                -webkit-appearance: none;
                transition: all .15s ease;
                font-size: 1.5rem;
                font-weight: 600;
                line-height: 1;
                float: right;
                opacity: .5;
                text-shadow: none;
            }
        </style>
            @push('js')
                <script>
                        $(".close").click(function () {
                            $(".navbar").removeClass("fixed-left");
                            $(".navbar").addClass("sidebar-fixed aside-menu-fixed pace-done");
                            $("#sidenav-collapse-main").addClass("opacity-left-nav");
                            $(".close").addClass("d-none");
                            $(".open").removeClass("d-none");
                        });

                        $(".open").click(function () {
                            $(".navbar").addClass("fixed-left");
                            $(".navbar").removeClass("aside-menu-fixed pace-done");
                            $("#sidenav-collapse-main").removeClass("opacity-left-nav");
                            $(".open").addClass("d-none");
                            $(".close").removeClass("d-none");
                        });

                </script>
            @endpush


        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" style="opacity: 0; cursor:default;">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                </div>
            </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        {{--<span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('cms') }}/img/theme/team-4-800x800.jpg">
                        </span>--}}
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
{{--                    <div class=" dropdown-header noti-title">--}}
{{--                        <h6 class="text-overflow m-0">{{ __('app.Welcome!') }}</h6>--}}
{{--                    </div>--}}
{{--                    <a href="--}}{{--{{ route('profile.edit') }}--}}{{--" class="dropdown-item">--}}
{{--                        <i class="ni ni-single-02"></i>--}}
{{--                        <span>{{ __('app.My profile') }}</span>--}}
{{--                    </a>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="ni ni-settings-gear-65"></i>--}}
{{--                        <span>{{ __('app.Settings') }}</span>--}}
{{--                    </a>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="ni ni-calendar-grid-58"></i>--}}
{{--                        <span>{{ __('app.Activity') }}</span>--}}
{{--                    </a>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="ni ni-support-16"></i>--}}
{{--                        <span>{{ __('app.Support') }}</span>--}}
{{--                    </a>--}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('app.Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
