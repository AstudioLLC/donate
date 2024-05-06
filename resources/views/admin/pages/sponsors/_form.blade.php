@push('js')
    @ckeditor
@endpush

<form action="{!! $edit ? route('admin.sponsors.edit', ['id' => $item->id]) : route('admin.sponsors.store') !!}" method="post" enctype="multipart/form-data">
    @csrf
    @method($edit ? 'put' : 'post')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if($role)
        <input type="hidden" name="role" value="{{ $role }}">
    @endif
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Username')])@endformTitle
                <div class="card-body">
                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('app.Form.Username') }}"
                           value="{{ old('name', $item->name ?? null) }}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Date of birth')])@endformTitle
                <div class="card-body">
                    <input type="date"
                           name="date_of_birth"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}"
                           id="date_of_birth"
                           placeholder="{{ __('app.Form.Date of birth') }}"
                           value="{{ old('date_of_birth', $item->options->date_of_birth ?? null) }}">
                    @if ($errors->has('date_of_birth'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Email')])@endformTitle
                <div class="card-body">
                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('app.Form.Email') }}"
                           value="{{ old('email', $item->email ?? null) }}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Phone')])@endformTitle
                <div class="card-body">
                    <input type="text"
                           name="phone"
                           id="phone"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('app.Form.Phone') }}"
                           value="{{ old('phone', $item->phone ?? null) }}">
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
{{--            <div class="form-group border-bottom">--}}
{{--                @formTitle(['title' => __('app.Form.Gender')])@endformTitle--}}
{{--                <div class="card-body">--}}
{{--                    <select name="children_gender" id="children_gender" class="form-control form-control-sm form-control-alternative">--}}
{{--                        <option value="">-- {{ __('app.Form.Not selected') }} --</option>--}}
{{--                        <option value="0" @if($item && isset($item->options) && $item->options->children_gender == 0) selected @endif>- {{ __('app.Gender.0') }} -</option>--}}
{{--                        <option value="1" @if($item && isset($item->options) && $item->options->children_gender == 1) selected @endif>- {{ __('app.Gender.1') }} -</option>--}}
{{--                    </select>--}}
{{--                    @if ($errors->has('children_gender'))--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $errors->first('children_gender') }}</strong>--}}
{{--                        </span>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="form-group border-bottom">--}}
{{--                @formTitle(['title' => 'Sponsorship Type'])@endformTitle--}}
{{--                <div class="card-body">--}}
{{--                    <select name="whom_sp" id="whom_sp" class="form-control form-control-sm form-control-alternative">--}}
{{--                        <option value="">-- {{ __('app.Form.Not selected') }} --</option>--}}
{{--                        <option value="Child education and development" @if($item  && $item->whom_sp == 'Child education and development') selected @endif>- Child education and development -</option>--}}
{{--                        <option value="Poverty reduction and resilience" @if($item  && $item->whom_sp == 'Poverty reduction and resilience') selected @endif>- Poverty reduction and resilience -</option>--}}
{{--                    </select>--}}
{{--                    @if ($errors->has('whom_sp'))--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $errors->first('whom_sp') }}</strong>--}}
{{--                        </span>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}

            {{--            <div class="form-group border-bottom">--}}
{{--                @formTitle(['title' => __('app.Form.Between age')])@endformTitle--}}
{{--                <div class="card-body">--}}
{{--                    <input type="text"--}}
{{--                           name="children_age_beetwen"--}}
{{--                           id="children_age_beetwen"--}}
{{--                           class="form-control form-control-sm form-control-alternative{{ $errors->has('children_age_beetwen') ? ' is-invalid' : '' }}"--}}
{{--                           placeholder="{{ __('app.Form.Between age') }}"--}}
{{--                           value="{{ old('children_age_beetwen', $item->options->children_age_beetwen ?? null) }}">--}}
{{--                    @if ($errors->has('children_age_beetwen'))--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $errors->first('children_age_beetwen') }}</strong>--}}
{{--                    </span>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="form-group border-bottom">--}}
{{--                @formTitle(['title' => __('app.Form.Region')])@endformTitle--}}
{{--                <div class="card-body">--}}
{{--                    <select name="children_region" id="children_region" class="form-control form-control-sm form-control-alternative">--}}
{{--                        <option value="">-- {{ __('app.Form.Not selected') }} --</option>--}}
{{--                        @itemsAllList(['items' => $regions, 'parentId' => $item->options->children_region ?? null, 'item' => $item, 'delimiter' => '-'])@enditemsAllList--}}
{{--                    </select>--}}
{{--                    @if ($errors->has('children_region'))--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $errors->first('children_region') }}</strong>--}}
{{--                        </span>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="col-12 col-lg-6">
            @if(!$item)
                <div class="form-group border-bottom">
                    @formTitle(['title' => __('app.Form.Password')])@endformTitle
                    <div class="card-body">
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control form-control-sm form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('app.Form.Password') }}">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group border-bottom">
                    @formTitle(['title' => __('app.Form.Password repeat')])@endformTitle
                    <div class="card-body">
                        <input type="password"
                               name="password_repeat"
                               id="password_repeat"
                               class="form-control form-control-sm form-control-alternative{{ $errors->has('password_repeat') ? ' is-invalid' : '' }}"
                               placeholder="{{ __('app.Form.Password repeat') }}"
                               value="{{ old('password_repeat', $item->password_repeat ?? null) }}">
                        @if ($errors->has('password_repeat'))
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password_repeat') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
            @endif
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Sponsor ID')])@endformTitle
                <div class="card-body">
                    <input type="text"
                           name="sponsor_id"
                           id="sponsor_id"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('sponsor_id') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('app.Form.Sponsor ID') }}"
                           value="{{ old('sponsor_id', $item->options->sponsor_id ?? null) }}">
                    @if ($errors->has('sponsor_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sponsor_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Country')])@endformTitle
                <div class="card-body">
                    <select name="country_id" id="country_id" class="form-control form-control-sm form-control-alternative">
                        <option value="">-- {{ __('app.Form.Not selected') }} --</option>
                        @itemsAllList(['items' => $countries, 'parentId' => $item->options->country_id ?? null, 'item' => $item, 'delimiter' => '-'])@enditemsAllList
                    </select>
                    @if ($errors->has('country_id'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('country_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                @checkbox([
                'id' => 'active',
                'label' => __('app.Active'),
                'checked' => oldCheck('active', ($edit && empty($item->active)) ? false : true)
                ])@endcheckbox
            </div>
{{--            <div class="form-group border-bottom">--}}
{{--                @checkbox([--}}
{{--                'id' => 'donor_type',--}}
{{--                'label' => __('app.Donor type Corporate/Not corporate'),--}}
{{--                'checked' => oldCheck('donor_type', ($edit && empty($item->options->donor_type)) ? false : true)--}}
{{--                ])@endcheckbox--}}
{{--            </div>--}}
{{--            <div class="form-group border-bottom">--}}
{{--                @checkbox([--}}
{{--                'id' => 'recurring_payment',--}}
{{--                'label' => __('app.Recurring payment'),--}}
{{--                'checked' => oldCheck('recurring_payment', ($edit && empty($item->options->recurring_payment)) ? false : true)--}}
{{--                ])@endcheckbox--}}
{{--            </div>--}}
{{--            <div class="form-group border-bottom">--}}
{{--                @checkbox([--}}
{{--                'id' => 'is_send_email',--}}
{{--                'label' => __('app.Send Email'),--}}
{{--                'checked' => oldCheck('is_send_email', ($edit && empty($item->options->is_send_email)) ? false : true)--}}
{{--                ])@endcheckbox--}}
{{--            </div>--}}
{{--            <div class="form-group border-bottom">--}}
{{--                @checkbox([--}}
{{--                'id' => 'want_recive_letters',--}}
{{--                'label' => __('app.To receive letters'),--}}
{{--                'checked' => oldCheck('want_recive_letters', ($edit && empty($item->options->want_recive_letters)) ? false : true)--}}
{{--                ])@endcheckbox--}}
{{--            </div>--}}
        </div>
    </div>

    @submit(['title' => null])@endsubmit
</form>
