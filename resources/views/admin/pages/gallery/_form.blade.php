<form action="{{ route('admin.gallery.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if($gallery)
        <input type="hidden" name="gallery" value="{{ $gallery }}">
    @endif
    @if($key)
        <input type="hidden" name="key" value="{{ $key }}">
    @endif
    <div class="row">
        <div class="col-12">
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Gallery form.Add images') ])@endformTitle
                <div class="card-body">
                    @file(['name' => 'images[]', 'multiple' => true, 'id' => 'uploadFile'])@endfile
                </div>
            </div>
        </div>
    </div>
    @submit(['title' => null])@endsubmit
</form>

        <div id="image_preview"  class="row"></div>


@push('js')
    <script type="text/javascript">
        $("#uploadFile").change(function(){
            $('#image_preview').html("");
            var total_file=document.getElementById("uploadFile").files.length;
            for(var i=0;i<total_file;i++)
            {
                $('#image_preview').append("<div class='col-6'><img style='width: 100%; padding: 40px' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
            }

        });

        $('form').ajaxForm(function()
        {
            alert("Uploaded SuccessFully");
        });
    </script>
@endpush
