@push('js')
    @ckeditor
@endpush

<form action="{!! $edit ? route('admin.volunteering.edit', ['id' => $item->id]) : route('admin.volunteering.store') !!}" method="post" enctype="multipart/form-data">
    @csrf
    @method($edit ? 'put' : 'post')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="form-group border-bottom">
                <div class="has-title">{{ __('app.Form.Email') }}</div>
                <div class="card-body">
                    <input disabled type="text"
                           name="email"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('app.Form.Email') }}"
                           required
                           value="{{ old('email', $item->email ?? null) }}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                <div class="has-title">{{ __('app.List.Name') }}</div>
                <div class="card-body">
                    <input disabled type="text"
                           name="name"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('app.List.Name') }}"
                           required
                           value="{{ old('name', $item->name ?? null) }}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                <div class="has-title">{{ __('app.Form.Surname') }}</div>
                <div class="card-body">
                    <input disabled type="text"
                           name="surname"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('surname') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('app.Form.Surname') }}"
                           required
                           value="{{ old('surname', $item->surname ?? null) }}">
                    @if ($errors->has('surname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Download File')])@endformTitle
                <div class="card-body">
{{--                    @file(['name' => 'file'])@endfile--}}
                    @if (!empty($item->file))
                        <div class="my-2">
                            <a href="{{ $item->getImageUrl('thumbnail', $item->file) }}" class="btn btn-sm btn-icon btn-info" download>
                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                <span class="btn-inner--text">{{ __('app.Download') }}</span>
                            </a>
                        </div>

                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                <div class="has-title">{{ __('app.Form.Phone') }}</div>
                <div class="card-body">
                    <input disabled type="text"
                           name="phone"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('app.Form.Phone') }}"
                           required
                           value="{{ old('phone', $item->phone ?? null) }}">
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                <div class="has-title">{{ __('app.Form.Between age') }}</div>
                <div class="card-body">
                    <input disabled type="text"
                           name="age_group"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('age_group') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('app.Form.Between age') }}"
                           required
                           value="{{ old('age_group', $item->age_group ?? null) }}">
                    @if ($errors->has('age_group'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('age_group') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group border-bottom">
                <div class="has-title">{{ __('app.Form.Message') }}</div>
                <div class="card-body">
                    <textarea name="message"
                              disabled
                              class=" form-control form-control-sm form-control-alternative{{ $errors->has('message') ? ' is-invalid' : '' }}"
                              rows="5"
                              placeholder="{{ __('app.Form.Message') }}">{{ old('message', $item->message ?? null) }}</textarea>
                    @if ($errors->has('message'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @submit(['title' => null])@endsubmit
</form>
