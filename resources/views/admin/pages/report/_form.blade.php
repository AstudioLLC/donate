@push('js')
    @ckeditor
@endpush

@if(session()->get('success'))
    <span class=" mb-4 alert alert-success">Deleted Successfully</span>
@endif
<div class="row">
    <div class="col-4">
        @if($edit && $item->imageBig)
            <form action="{{route('admin.report.deleteImage',['id' => $item->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                Delete Big Image
                <button type="submit" class="btn btn-sm btn-icon-only btn-outline-danger delete" data-id="{{ $item->id }}">
                    <i class="fas fa-times"></i>
                </button>
            </form>
        @endif
    </div>
    <div class="col-4">
        @if($edit && $item->imageSmall)
            <form action="{{route('admin.report.deleteImageSmall',['id' => $item->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                Delete Small Image
                <button type="submit" class="btn btn-sm btn-icon-only btn-outline-danger delete" data-id="{{ $item->id }}">
                    <i class="fas fa-times"></i>
                </button>
            </form>
        @endif
    </div>
    <div class="col-4">
{{--        @if($edit && $item->name)--}}
{{--            <form action="{{route('admin.report.deleteFile',['id' => $item->id])}}" method="post" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                @method('post')--}}
{{--                Delete File--}}
{{--                <button type="submit" class="btn btn-sm btn-icon-only btn-outline-danger delete" data-id="{{ $item->id }}">--}}
{{--                    <i class="fas fa-times"></i>--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        @endif--}}
    </div>
</div>



<form action="{!! $edit ? route('admin.report.edit', ['file' => $file, 'key' => $key, 'id' => $item->id]) : route('admin.report.store', ['file' => $file, 'key' => $key]) !!}"
      method="post"
      enctype="multipart/form-data">
    @csrf
    @method($edit ? 'put' : 'post')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if($file)
        <input type="hidden" name="file" value="{{ $file }}">
    @endif
    @if($key)
        <input type="hidden" name="key" value="{{ $key }}">
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
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Select File')])@endformTitle
                <div class="card-body">
                    @file(['name'=>'name'])@endfile
                    @if (!empty($item->name))
                        <div class="my-2">
                            <a href="{{ $item->getImageUrl('thumbnail', $item->name) }}" class="btn btn-sm btn-icon btn-info" download>
                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                <span class="btn-inner--text">{{ __('app.Download') }}</span>
                            </a>
                            <a href="{{ $item->getImageUrl('thumbnail', $item->name) }}" class="btn btn-sm btn-icon btn-info" target="_blank">
                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                <span class="btn-inner--text">Show</span>
                            </a>
                        </div>
                        <input type="hidden" name="old_name" value="{{ $item->name }}">
                        @imageDestroy([
                        'id' => $item->id,
                        'title' => __('app.Delete image'),
                        'action' => route('admin.pages.deleteImage')
                        ])@endimageDestroy
                    @endif
                </div>
            </div>
            <div class="row" id="file_upload_name_preview"></div>
            <div class="row" id="file_upload_preview"></div>
        </div>
{{--        <div class="col-12 col-lg-6">--}}
{{--            <div class="form-group border-bottom">--}}
{{--                @formTitle(['title' => __('app.Form.Image') . $imageBigSize])@endformTitle--}}
{{--                <div class="card-body">--}}
{{--                    @file(['name'=>'imageBig'])@endfile--}}
{{--                    @if (!empty($item->imageBig))--}}
{{--                        <div class="border">--}}
{{--                            <img src="{{ $item->getImageUrl('thumbnail', $item->imageBig) }}" class="img-fluid img-center p-2">--}}
{{--                        </div>--}}
{{--                        <input type="hidden" name="old_imageBig" value="{{ $item->imageBig }}">--}}
{{--                        @imageDestroy([--}}
{{--                        'id' => $item->id,--}}
{{--                        'title' => __('app.Delete image'),--}}
{{--                        'action' => route('admin.pages.deleteImage')--}}
{{--                        ])@endimageDestroy--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-12 col-lg-6">--}}
{{--            <div class="form-group border-bottom">--}}
{{--                @formTitle(['title' => __('app.Form.Image') . $imageSmallSize])@endformTitle--}}
{{--                <div class="card-body">--}}
{{--                    @file(['name'=>'imageSmall'])@endfile--}}
{{--                    @if (!empty($item->imageSmall))--}}
{{--                        <div class="border">--}}
{{--                            <img src="{{ $item->getImageUrl('thumbnail', $item->imageSmall) }}" class="img-fluid img-center p-2">--}}
{{--                        </div>--}}
{{--                        <input type="hidden" name="old_imageSmall" value="{{ $item->imageSmall }}">--}}
{{--                        @imageDestroy([--}}
{{--                        'id' => $item->id,--}}
{{--                        'title' => __('app.Delete image'),--}}
{{--                        'action' => route('admin.pages.deleteImage')--}}
{{--                        ])@endimageDestroy--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    @submit(['title' => null])@endsubmit
</form>

@push('js')
    <script type="text/javascript">
        $("#name").change(function(){
            $('#file_upload_preview').html("");
            var total_file=document.getElementById("name").files.length;
            for(var i=0;i<total_file;i++)
            {
                $('#file_upload_preview').append("<div class='col-12'><iframe style='width: 100%; padding: 40px' src='"+URL.createObjectURL(event.target.files[i])+"'></iframe></div>");
            }

        });

        $('form').ajaxForm(function()
        {
            alert("Uploaded SuccessFully");
        });
    </script>
@endpush
