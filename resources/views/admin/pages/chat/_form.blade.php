@push('css')
    <style>
        .chat {
            height: 70vh;
            overflow-x: hidden;
            overflow-y: auto;
        }
        textarea {
            resize: none;
        }
    </style>
@endpush

<form action="{{ route('admin.chat.store', ['childrenId' => $childrenId, 'sponsorId' => $sponsorId]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if($childrenId)
        <input type="hidden" name="children_id" value="{{ $childrenId }}">
    @endif
    @if($sponsorId)
        <input type="hidden" name="sponsor_id" value="{{ $sponsorId }}">
    @endif
    <input type="hidden" name="message_from" value="0">
    <input type="hidden" name="is_read" value="0">
    <input type="hidden" name="admin_is_read" value="1">
    <div class="row">
        <div class="col-12">
            @if(count($items))
                <div class="chat col-12 mx-auto border-bottom mb-5 shadow">
                    @foreach($items as $item)
                        @include('admin.pages.chat._chat', ['item' => $item ?? null])
                    @endforeach
                </div>
            @endif
            <div class="form-group border-bottom mt-2">
                @formTitle(['title' => __('app.Form.Message')])@endformTitle
                <div class="card-body">
                    <textarea name="message"
                              class="form-control form-control-sm form-control-alternative{{ $errors->has('message') ? ' is-invalid' : '' }}"
                              rows="5"
                              placeholder="{{ __('app.Form.Message') }}">{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Form.Select File')])@endformTitle
                <div class="card-body">
                    @file(['name' => 'file'])@endfile
                </div>
            </div>
        </div>
    </div>
    @submit(['title' => null])@endsubmit
</form>
