<div class="col-12 col-md-6 mt-4 mt-sm-5 mt-md-0">
    <div class="auth-form-block login-block d-flex flex-column">
        <div class="auth-group d-flex align-items-center">
            <h2 class="title-usual">
                {{ __('frontend.Login') }}
            </h2>
            <a href="{{ url('register') }}" class="title-usual text-decoration-none register-link">
                {{ __('frontend.Registration') }}
            </a>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif
        @if (session('new_pass'))
            <div class="alert alert-success">
                {{ session('new_pass') }}
            </div>
        @endif
        <form id="login-form" class="auth-form w-100" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="auth-form-group">
                <input class="input-default"
                       type="email"
                       name="email"
                       required
                       value="{{ old('email') }}"
                       placeholder="{{ __('frontend.login.Email') }}">
                @if($errors->has('email'))
                    <span class="input-alert">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="auth-form-group position-relative d-flex justify-content-end align-items-center">
                <input class="input-default input-password"
                       type="password"
                       name="password"
                       required
                       placeholder="{{ __('frontend.login.Password') }}">
                <div class="input-password-img d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="{{ asset('images/show.svg') }}">
                </div>
                @if($errors->has('password'))
                    <span class="input-alert">{{ $errors->first('password') }}</span>
                @endif
            </div>
            @if($errors->has('global'))
                <p class="text-center input-alert mt-3">
                    {{ $errors->first('global') }}
                </p>
            @endif
            <a href="{{ route('password.request') }}" class="forgot-password-text text-default text-decoration-none">
                {{ __('frontend.login.Forgot your password?') }}
            </a>
            <button type="submit" class="button-orange">
                {{ __('frontend.Login') }}
            </button>
            <!--<div class="text-bottom d-flex align-items-center">-->
            <!--    <span>{{ __('frontend.login.or sign in with') }}</span>-->
            <!--</div>-->
            <!--<div class="row">-->
            <!--    <div class="col-6 auth-social-buttons-group">-->
            <!--        <a href="https://ru-ru.facebook.com/" target="_blank" class="button-orange d-flex justify-content-center align-items-center" style="text-decoration: none">-->
            <!--            <img class="img-fluid me-1 me-sm-2" src="{{ asset('images/facebook.svg') }}">-->
            <!--            {{ __('frontend.login.Facebook') }}-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="col-6 auth-social-buttons-group">-->
            <!--        <a href="https://www.google.com/intl/ru/gmail/about/" target="_blank" class="button-orange d-flex justify-content-center align-items-center" style="text-decoration: none">-->
            <!--            <img class="img-fluid me-1 me-sm-2" src="{{ asset('images/google.svg') }}">-->
            <!--            {{ __('frontend.login.Google') }}-->
            <!--        </a>-->
            <!--    </div>-->
            <!--</div>-->
        </form>
    </div>
</div>
