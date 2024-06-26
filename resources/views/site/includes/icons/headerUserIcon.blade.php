<div class="header-icon  user-icon position-relative" >
    <a class="cabinet-link" @if(!auth()->user()) href="{{url('login')}}" @else id="mobile-icon-for-menu" @endif>
        <svg class="user-icon-svg" xmlns="http://www.w3.org/2000/svg" width="23" height="24" viewBox="0 0 23 24">
            <g transform="translate(-17.44)">
                <g transform="translate(17.44 13.518)">
                    <path
                        d="M28.94,288.389c-7.416,0-11.5,3.411-11.5,9.606a.889.889,0,0,0,.9.876h21.2a.889.889,0,0,0,.9-.876C40.44,291.8,36.356,288.389,28.94,288.389Zm-9.666,8.73c.354-4.632,3.6-6.978,9.666-6.978s9.311,2.347,9.666,6.978Z"
                        transform="translate(-17.44 -288.389)"/>
                </g>
                <g transform="translate(23.13)">
                    <g transform="translate(0)">
                        <path
                            d="M137.859,0a5.741,5.741,0,0,0-5.81,5.927,5.83,5.83,0,1,0,11.62,0A5.741,5.741,0,0,0,137.859,0Zm0,10.482A4.333,4.333,0,0,1,133.8,5.927a3.983,3.983,0,0,1,4.058-4.175,4.027,4.027,0,0,1,4.058,4.175A4.333,4.333,0,0,1,137.859,10.482Z"
                            transform="translate(-132.049)"/>
                    </g>
                </g>
            </g>
        </svg>
        @if(auth()->user() && auth()->user()->role !== 0)
        @if(!empty($my_unread_donations) && count($my_unread_donations)
            || (!empty($unread_photos) && count($unread_photos))
            || (!empty($unread_videos) && count($unread_videos))
            || (!empty($unread_reports) && count($unread_reports))
            || (!empty($unread_messages) && count($unread_messages))
            || (!empty($unread_socialStories) && count($unread_socialStories))
            )
        <div class="online position-absolute"></div>
        @endif
        @endif
    </a>
    @if(auth()->user())
        @include('site.includes.headerCabinetPanel')
    @endif
</div>

@push('js')
    <script>
        if ($(window).width() <= 1025) {
            $("#mobile-icon-for-menu").click(function () {
                $("#menu-mobile-hover").toggleClass("user-icon-hover-menu-web");
                $("#menu-mobile-hover").toggleClass("user-icon-hover-menu-web-opened");
            });
        }else{
            let url = "{!! route('cabinet.home.index') !!}"
             $('.cabinet-link').attr('href', url);

        }
    </script>
@endpush
