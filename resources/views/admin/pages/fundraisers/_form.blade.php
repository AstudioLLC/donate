@push('js')
    @ckeditor
    <script src="{{ asset('cms/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endpush

<form action="{!! $edit ? route('admin.fundraisers.edit', ['id' => $item->id]) : route('admin.fundraisers.store') !!}" method="post" enctype="multipart/form-data">
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
                           value="{{ old('cost', $item->cost ?? 0) }}">
                    @if ($errors->has('cost'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cost') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.List.Collected')])@endformTitle
                <div class="card-body">
                    <input type="text"
                           name="collected"
                           class="form-control form-control-sm form-control-alternative{{ $errors->has('collected') ? ' is-invalid' : '' }}"
                           id="collected"
                           placeholder="{{ __('app.List.Collected') }}"
                           value="{{ old('collected', $item->collected ?? 0) }}">
                    @if ($errors->has('collected'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('collected') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Children')])@endformTitle
                <div class="card-body">
                    <select name="child_id" id="child_id" class="form-control form-control-sm form-control-alternative">
                        <option value="">-- {{ __('app.Form.Not selected') }} --</option>
                        @itemsAllList(['items' => $children, 'parentId' => $item->child_id ?? null, 'item' => $item, 'delimiter' => '-'])@enditemsAllList
                    </select>
                    @if ($errors->has('child_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('child_id') }}</strong>
                        </span>
                    @endif
                </div>
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
                        'action' => route('admin.fundraisers.deleteImage')
                        ])@endimageDestroy
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
                        'action' => route('admin.fundraisers.deleteImage')
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
            <div class="form-group border-bottom">
                @checkbox([
                'id' => 'unlimit',
                'label' => __('app.List.Unlimit'),
                'checked' => oldCheck('unlimit', ($edit && empty($item->unlimit)) ? false : true)
                ])@endcheckbox
            </div>
            <div class="form-group border-bottom">
                @checkbox([
                'id' => 'private',
                'label' => __('app.List.Private'),
                'checked' => oldCheck('private', ($edit && empty($item->private)) ? false : true)
                ])@endcheckbox
            </div>
            <div class="form-group border-bottom">
                @checkbox([
                'id' => 'campaign',
                'label' => __('app.List.Campaign'),
                'checked' => oldCheck('campaign', ($edit && empty($item->campaign)) ? false : true)
                ])@endcheckbox
            </div>
        </div>
        <div class="col-12">
            <div class="form-group border-bottom">
                <div class="input-daterange datepicker row align-items-center">
                    <div class="col">
                        <div class="form-group">
                            @formTitle(['title' => __('app.Form.Start date')])@endformTitle
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="ni ni-calendar-grid-58"></i>
                                    </span>
                                </div>
                                <input type="text"
                                       name="start_date"
                                       class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}"
                                       id="start_date"
                                       placeholder="{{ __('app.Form.Start date') }}"
                                       @if($edit)
                                        value="{{ old('start_date', \Carbon\Carbon::parse($item->start_date)->format('d-m-Y H:m:s') ?? null) }}">
                                       @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            @formTitle(['title' => __('app.Form.End date')])@endformTitle
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="ni ni-calendar-grid-58"></i>
                                    </span>
                                </div>
                                <input type="text"
                                       name="end_date"
                                       class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}"
                                       id="end_date"
                                       placeholder="{{ __('app.Form.End date') }}"
                                       @if($edit)
                                        value="{{ old('end_date', \Carbon\Carbon::parse($item->end_date)->format('d-m-Y H:m:s') ?? null) }}">
                                       @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                @bylang([
                'id' => 'form_short_content',
                'tp_classes' => 'little-p',
                'title' => __('app.Form.Content short text')])
                <textarea name="short[{!! $iso !!}]"
                          class="ckeditor form-control form-control-sm form-control-alternative{{ $errors->has('short') ? ' is-invalid' : '' }}"
                          rows="5"
                          placeholder="{{ __('app.Form.Content short text') }}">{{ old('short.'.$iso, tr($item, 'short', $iso)) }}</textarea>
                @if ($errors->has('short'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('short') }}</strong>
                    </span>
                @endif
                @endbylang

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
