@push('js')
    @ckeditor
@endpush

<form action="{!! $edit ? route('admin.gifts.edit', ['id' => $item->id]) : route('admin.gifts.store') !!}" method="post" enctype="multipart/form-data">
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
                @bylang([
                'id' => 'form_title',
                'tp_classes' => 'little-p',
                'title' => __('app.Form.Title')])
                <input type="text"
                       name="title[{!! $iso !!}]"
                       class="form-control form-control-sm form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                       placeholder="{{ __('app.Form.Title') }}"
                       value="{{ old('title.'.$iso, tr($item, 'title', $iso)) }}">
                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                @endbylang
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Image') . $imageBigSize])@endformTitle
                <div class="card-body">
                    @file(['name'=>'imageBig'])@endfile
                    @if (!empty($item->imageBig))
                        <div class="border">
                            <img src="{{ $item->getImageUrl('thumbnail', $item->imageBig) }}" class="img-fluid img-center p-2">
                        </div>
                        <input type="hidden" name="old_imageBig" value="{{ $item->imageBig }}">
                        @imageDestroy([
                        'id' => $item->id,
                        'title' => __('app.Delete image'),
                        'action' => route('admin.gifts.deleteImage')
                        ])@endimageDestroy
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Url')])@endformTitle
                <div class="card-body">
                    <input type="text"
                           name="url"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('url') ? ' is-invalid' : '' }}"
                           id="form_url"
                           placeholder="{{ __('app.Form.Url') }}"
                           value="{{ old('url', $item->url ?? null) }}">
                    @if ($errors->has('url'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.List.Cost')])@endformTitle
                <div class="card-body">
                    <input type="text"
                           name="cost"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('cost') ? ' is-invalid' : '' }}"
                           id="cost"
                           placeholder="{{ __('app.List.Cost') }}"
                           value="{{ old('cost', $item->cost ?? null) }}">
                    @if ($errors->has('cost'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cost') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Image') . $imageSmallSize])@endformTitle
                <div class="card-body">
                    @file(['name'=>'imageSmall'])@endfile
                    @if (!empty($item->imageSmall))
                        <div class="border">
                            <img src="{{ $item->getImageUrl('thumbnail', $item->imageSmall) }}" class="img-fluid img-center p-2">
                        </div>
                        <input type="hidden" name="old_imageSmall" value="{{ $item->imageSmall }}">
                        @imageDestroy([
                        'id' => $item->id,
                        'title' => __('app.Delete image'),
                        'action' => route('admin.gifts.deleteImage')
                        ])@endimageDestroy
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
        </div>
        <div class="col-12">
            <div class="card">
                @bylang([
                'id' => 'form_short',
                'tp_classes' => 'little-p',
                'title' => 'Short Text'
                ])
                <textarea name="short[{!! $iso !!}]"
                          class="ckeditor form-control form-control-sm form-control-alternative{{ $errors->has('short') ? ' is-invalid' : '' }}"
                          rows="5"
                          placeholder="Short text">{{ old('short.'.$iso, tr($item, 'short', $iso)) }}</textarea>
                @if ($errors->has('short'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('short') }}</strong>
                    </span>
                @endif
                @endbylang
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                @bylang([
                'id' => 'form_content',
                'tp_classes' => 'little-p',
                'title' => __('app.Form.Content text')])
                <textarea name="content[{!! $iso !!}]"
                          class="ckeditor form-control form-control-sm form-control-alternative{{ $errors->has('content') ? ' is-invalid' : '' }}"
                          rows="5"
                          placeholder="{{ __('app.Form.Content text') }}">{{ old('content.'.$iso, tr($item, 'content', $iso)) }}</textarea>
                @if ($errors->has('content'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
                @endbylang
            </div>
        </div>
    </div>
    @seo(['item' => $item ?? null])@endseo

    @submit(['title' => null])@endsubmit
</form>
