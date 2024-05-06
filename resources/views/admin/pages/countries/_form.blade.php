@push('js')
    @ckeditor
@endpush

<form action="{!! $edit ? route('admin.countries.edit', ['id' => $item->id]) : route('admin.countries.store') !!}" method="post" enctype="multipart/form-data">
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
        </div>
        <div class="col-12 col-lg-6">
            {{--<div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Image') . $imageSize])@endformTitle
                <div class="card-body">
                    @file(['name' => 'image'])@endfile
                    @if (!empty($item->image))
                        <div class="border">
                            <img src="{{ $item->getImageUrl('thumbnail') }}" class="img-fluid img-center p-2">
                        </div>
                        <input type="hidden" name="old_image" value="{{ $item->image }}">
                        @imageDestroy([
                        'id' => $item->id,
                        'title' => __('app.Delete image'),
                        'action' => route('admin.countries.deleteImage')
                        ])@endimageDestroy
                    @endif
                </div>
            </div>--}}
        </div>
    </div>

    @submit(['title' => null])@endsubmit
</form>
