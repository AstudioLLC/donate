<div class="col-12 col-lg-6">
    <div class="auth-form-block login-block d-flex flex-column">
        <div class="auth-group auth-group-register d-flex align-items-center">
            <a href="{{ url('login') }}" class="title-usual text-decoration-none">
                {{ __('frontend.Login') }}
            </a>
            <h2 class="title-usual register-link">
                {{ __('frontend.Registration') }}
            </h2>
        </div>
        <form id="register-form" class="auth-form w-100" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="auth-form-group">
                <input class="input-default"
                       type="text"
                       name="name"
                       required
                       value="{{ old('name') }}"
                       placeholder="{{ __('frontend.login.Name Register') }}">
                @if($errors->has('name'))
                    <span class="input-alert">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="row auth-form-group">
                <div class="col-4">
                    <input class="input-default p-2"
                           type="number"
                           name="day"
                           min="1"
                           max="31"
{{--                           onKeyPress="if(this.value.length>=2) return false;"--}}
                           maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                           value="{{ old('day', '01') }}" placeholder="{{ __('frontend.login.DD') }}">


{{--                    <input type="number" wire:model="inn" class="contact-input input-arrow-hide number_form" placeholder="ИНН" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">--}}
                </div>
                <div class="col-4">
                    <input class="input-default p-2"
                           type="number"
                           name="month"
                           min="1"
                           max="12"
{{--                           onKeyPress="if(this.value.length>=2) return false;"--}}
                           maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                           value="{{ old('month', '01') }}"
                           placeholder="{{ __('frontend.login.MM') }}">
                </div>
                <div class="col-4">
                    <input class="input-default p-2"
                           type="number"
                           name="year"
                           min="1000"
{{--                           onKeyPress="if(this.value.length>=4) return false;"--}}
                           maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                           value="{{ old('year') }}"
                           placeholder="{{ __('frontend.login.YYYY') }}">
                </div>
            </div>
            <div class="auth-form-group">
                <input class="input-default"
                       type="email"
                       name="email"
                       required
                       value="{{ old('email') }}"
                       placeholder="{{ __('frontend.login.Email Register') }}">
                @if($errors->has('email'))
                    <span class="input-alert">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="auth-form-group">
                <input class="input-default"
                       type="number"
                       name="phone"
                       value="{{ old('phone') }}"
                       placeholder="{{ __('frontend.login.Phone number') }}">
                @if($errors->has('phone'))
                    <span class="input-alert">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div class="auth-form-group position-relative justify-content-end align-items-center">
                <div class="position-relative d-flex  justify-content-end align-items-center">
                    <input class="input-default input-password"
                           type="password"
                           name="password"
                           required
                           placeholder="{{ __('frontend.login.Password') }}">
                    <div class="input-password-img d-flex justify-content-center align-items-center">
                        <img class="img-fluid" src="{{ asset('images/show.svg') }}" alt="{{ __('frontend.login.Password') }}" title="{{ __('frontend.login.Password') }}">
                    </div>
                </div>
                @if($errors->has('password'))
                    <span class="input-alert">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="auth-form-group position-relative d-flex justify-content-end align-items-center">
                <input class="input-default input-password-2"
                       type="password"
                       name="repeatPass"
                       required
                       placeholder="{{ __('frontend.login.Confirm Password') }}">
                <div class="input-password-img-2 d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="{{ asset('images/show.svg') }}" alt="{{ __('frontend.login.Confirm Password') }}" title="{{ __('frontend.login.Confirm Password') }}">
                </div>
                @if($errors->has('repeatPass'))
                    <span class="input-alert">{{ $errors->first('repeatPass') }}</span>
                @endif
            </div>
            @if($errors->has('global'))
                <p class="text-center input-alert mt-3">
                    {{ $errors->first('global') }}
                </p>
            @endif
            <span class="password-prompt">{{ __('frontend.login.5 to 20 characters') }}</span>
            <button type="submit" class="button-orange">
                {{ __('frontend.Register') }}
            </button>
            <!--<div class="text-bottom d-flex align-items-center">-->
            <!--    <span>{{ __('frontend.login.or sign in with') }}</span>-->
            <!--</div>-->
            <!--<div class="row">-->
            <!--    <div class="col-6 auth-social-buttons-group">-->
            <!--        <button class="button-orange d-flex justify-content-center align-items-center">-->
            <!--            <img class="img-fluid me-1 me-sm-2" src="{{ asset('images/facebook.svg') }}">-->
            <!--            {{ __('frontend.login.Facebook') }}-->
            <!--        </button>-->
            <!--    </div>-->
            <!--    <div class="col-6 auth-social-buttons-group">-->
            <!--        <div class="button-orange d-flex justify-content-center align-items-center">-->
            <!--            <img class="img-fluid me-1 me-sm-2" src="{{ asset('images/google.svg') }}">-->
            <!--            {{ __('frontend.login.Google') }}-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </form>
    </div>
</div>
