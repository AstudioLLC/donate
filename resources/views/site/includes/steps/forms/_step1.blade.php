<style>
    .new_style_select{
        width: 100%;
        height: 50px;
        border-radius: 50px;
        cursor: pointer;
        border: 1px solid #e4e4e9;
        font-family: lato-regular;
        font-weight: 400;
        font-style: normal;
        font-size: 18px;
        color: #0a0a0a;
        outline: none;
        padding: 0 35px 0 5px;
    }
    .nwsl1{
        width: 100% !important;
        float: right !important;
    }
    option{
        top: 48px;
        left: 0;
        cursor: pointer;
        width: 100%;
        z-index: 2;
        background: #fff;
        user-select: none;
        -webkit-box-shadow: 0 5px 5px 0 rgb(0 0 0 / 15%);
        -moz-box-shadow: 0 5px 5px 0 rgba(0,0,0,.15);
        box-shadow: 0 5px 5px 0 rgb(0 0 0 / 15%);
        border-bottom-left-radius: 24px;
        border-bottom-right-radius: 24px;
        overflow: hidden;
    }
    .new_style_select select {
        -moz-appearance:none; /* Firefox */
        -webkit-appearance:none; /* Safari and Chrome */
        appearance:none;
    }
    .new_style_select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1em;
        font-weight: bold;
    }
</style>
<div class="step-white-block-wrap w-100 d-flex justify-content-center align-items-center">
    <div class="step-white-block">
        <form class="row w-100"
              id="sponsored-child-general-info-form-page-1"
              action="{{ $route }}"
              method="POST">
            @csrf


            @if($errors->any())
                <h1>{{$errors}}</h1>
            @endif
            <div class="col-12 col-md-6 col-left">
                <div class="white-group-main w-100 d-flex flex-column">
                    <div class="form-group">
{{--                        <span class="step-group-names">{{ __('frontend.Form.Whom Sponsor') }}</span>--}}
                        <div class="form-group">
                            <select name="whom_sp" class="new_style_select" required>
                                <option value="" disabled selected>{{ __('frontend.Form.Sponsorship type') }}</option>
{{--                                <option value="Child education and development" >{{ __('frontend.Form.Whom Sponsor dp-1') }}</option>--}}
                                <option value="Poverty reduction and resilience" selected>{{ __('frontend.Form.Whom Sponsor dp-2') }}</option>
                            </select>
                            @if ($errors->has('whom_sp'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('whom_sp') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
{{--                <div class="white-group-main w-100 d-flex flex-column">--}}
{{--                    <div class="form-group">--}}
{{--                        <span class="step-group-names">{{ __('frontend.Form.Between age') }}</span>--}}
{{--                        <div class="select-group">--}}
{{--                            <input class="input-default"--}}
{{--                                   type="text"--}}
{{--                                   name="children_age_beetwen"--}}
{{--                                   required--}}
{{--                                   value="{{ old('children_age_beetwen', $user->options->children_age_beetwen ?? null) }}"--}}
{{--                                   placeholder="{{ __('frontend.Form.Between age') }}">--}}
{{--                            @if($errors->has('children_age_beetwen'))--}}
{{--                                <span class="input-alert">{{ $errors->first('children_age_beetwen') }}</span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                @if($regions)
                    <div class="white-group-main w-100 d-flex flex-column">
                        <div class="form-group">
{{--                            <span class="step-group-names">{{ __('frontend.Form.Area') }}</span>--}}
                            <select class="new_style_select nwsl1" name="children_region" required>
                                <option value="" disabled selected>{{ __('frontend.Form.Area') }}</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" @if($user && isset($user->options) && $user->options->children_region == $region->id) selected @endif>
                                        {{ $region->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                <div class="white-group-main w-100 d-flex flex-column">
                    <span class="step-group-names">{{ __('frontend.Form.Monthly Donation Amount') }}</span>
                    <div class="step-button">{{ $monthlyDonationAmount ?? 8000 }} {{ __('frontend.Gifts.AMD') }}</div>
                </div>
                <div class="white-group-main w-100 d-flex flex-column">
                    <span class="step-group-names">{{ __('frontend.Form.Frequency') }}</span>
                    <div class="step-group">
                        <label class="text-default custom-radio mb-2">
                            <input name="frequency" type="radio" value="1" id="frequency_auto_one" required checked>
                            <span>{{ __('frontend.Form.1 month') }}  {{ $monthlyDonationAmount ?? 8000  }} {{ __('frontend.Gifts.AMD') }}</span>
                        </label>
                        <label class="text-default custom-radio">
                            <input name="frequency" type="radio" class="frequency_manually" value="12" required>
                            <span>{{ __('frontend.Form.1 year') }} {{ $monthlyDonationAmount ? 12 * $monthlyDonationAmount : 8000  }} {{ __('frontend.Gifts.AMD') }}</span>
                        </label>
                        <label class="text-default custom-radio">
                            <input name="frequency" type="radio" class="frequency_manually" value="3" required>
                            <span>{{ __('frontend.Form.3 months') }} {{ $monthlyDonationAmount ? 3 * $monthlyDonationAmount : 8000 }} {{ __('frontend.Gifts.AMD') }}</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-right">
                <div class="white-group-main w-100 d-flex flex-column">
                    <span class="step-group-names d-flex align-items-center">
                        {{ __('frontend.Form.Recurring payment') }}
{{--                        <img class="img-fluid information"--}}
{{--                             src="{{ asset('images/information.svg') }}"--}}
{{--                             alt="{{ __('frontend.Form.Recurring payment') }}"--}}
{{--                             title="{!! __('frontend.Form.Recurring payment info text') !!}">--}}
                    </span>
                    <div class="step-group step-group-right">
                        <label class="text-default custom-radio" id="auto_check" >
                            <input name="recurring_payment" type="radio" id="auto_check_input" value="1" required checked>
                            <span>{{ __('frontend.Form.Automatic') }}</span>
                        </label>
                        <label class="text-default custom-radio">
                            <input name="recurring_payment"  id="manually_check" type="radio" value="0" required>
                            <span>{{ __('frontend.Form.Manually') }}</span>
                        </label>
                    </div>
                    <span style="font-size: 11px" class="text-danger" id="binding_info">{!! __('frontend.Form.Recurring payment info text') !!}</span>
                </div>
                <div class="white-group-main w-100 d-flex flex-column">
                    <span class="step-group-names d-flex align-items-center">
                        {{ __('frontend.Form.Do you want to receive letters from sponsored child?') }}
                    </span>
                    <div class="step-group step-group-right">
                        <label class="text-default custom-radio">
                            <input name="want_recive_letters" type="radio" value="1" required checked>
                            <span>{{ __('frontend.Fundraisers.Yes') }}</span>
                        </label>
                        <label class="text-default custom-radio">
                            <input name="want_recive_letters" type="radio" value="0" required>
                            <span>{{ __('frontend.Fundraisers.No') }}</span>
                        </label>
                    </div>
                </div>
                <div class="white-group-main w-100 d-flex flex-column">
                    <textarea name="message" placeholder="{{ __('frontend.cabinet.Type your message here') }}" class="input-default textarea-default">{{ old('message') }}</textarea>
                    @if($errors->has('message'))
                        <span class="input-alert">{{ $errors->first('message') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                <button type="submit" class="button-orange">
                    {{ __('frontend.Steps.Next') }}
                </button>
            </div>
        </form>
    </div>
</div>
@push('js')
    <script>
        $(function() {
            $(".frequency_manually").click(function() {
                $('#auto_check').addClass("d-none");
                $('#auto_check_input').prop('checked',false)
                $('#manually_check').prop('checked',true)
                $('#binding_info').addClass('d-none');
            });
        });

        $('#frequency_auto_one').click(function() {
            if($('#frequency_auto_one').is(':checked'))
            {
                $('#auto_check').removeClass("d-none");
                $('#auto_check_input').prop('checked',true)
                $('#manually_check').prop('checked',false)
            }
        });


        $('#manually_check').click(function () {
            $('#binding_info').addClass('d-none');
        });
        $('#auto_check').click(function () {
            $('#binding_info').removeClass('d-none');
        });
    </script>
@endpush
