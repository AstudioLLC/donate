<footer class="footer">
    <div class="container-small">
        <div class="row">
            @include('site.includes.footer.footerMenu', ['items' => $footerPages ?? null])
            <div class="col-12 col-sm-6 col-lg-3">
{{--                @include('site.includes.footer.subscribe')--}}
                @include('site.includes.footer.socials', ['items' => $socials ?? null])
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-content d-flex justify-content-between align-items-center">
                <span class="bottom-text">© {{ date('Y') }} {{ __('frontend.footer.copyright') }} </span> 
                <span class="bottom-text">
                    @php

                        if (app()->getLocale() == 'en'){
                            $astudioUrl = 'https://astudio.am/en';
                        }elseif (app()->getLocale() == 'ru'){
                            $astudioUrl = 'https://astudio.am/ru';
                        }else{
                            $astudioUrl = 'https://astudio.am/';
                        }
                    @endphp
                    <a href="{{$astudioUrl}}" class="text-sm text-decoration-none" target="_blank" rel="noreferrer noopener" style="color:#000; font-size:20px;">
                        {{ __('frontend.footer.powered by') }}</a>
                                        <p style="color:#000; text-align: right; margin: 0"> Designed by <span style="font-size:12px;">WEDO</span>  </p>

                </span>
            </div>
        </div>
    </div>
    @include('site.includes.buttons.toTop')
</footer>
