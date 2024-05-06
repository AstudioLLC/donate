@if($item)
    <div data-id="{{ $item->id }}" class="card form-group mb-5 item-row @if($item->deleted_at) border-danger @endif">
        @if($item->message_from == 0)
            <div class="card-header bg-transparent @if($item->deleted_at) border-danger @endif">
                {{ $item->children->title }} - {{ $item->children->child_id }}
            </div>
        @else
            <div class="card-header bg-transparent @if($item->deleted_at) border-danger @endif text-right">
                {{ $item->sponsor->name ?? null }}
                {{ isset($item->sponsor->options->sponsor_id) ? ' - ' . $item->sponsor->options->sponsor_id : null }}
            </div>
        @endif
        <div class="card-body px-5">
            <p class="card-text text-left">
                @if($item->file)
                    @if($item->checkFileType($item->file) == 'image')
                        <div>
                            <img src="{{ $item->getImageUrl('thumbnail', $item->file) }}" class="img-thumbnail">
                        </div>
                        <a href="{{ $item->getImageUrl('thumbnail', $item->file) }}" class="btn btn-sm btn-icon btn-info" target="_blank">
                                                    <span class="btn-inner--icon">
                                                        <i class="ni ni-cloud-download-95"></i></span>
                            <span class="btn-inner--text">{{ $item->file }}</span>
                        </a>
                    @else
                        <div>
                            <a href="{{ $item->getImageUrl('thumbnail', $item->file) }}" class="btn btn-sm btn-icon btn-info" download>
                                                    <span class="btn-inner--icon">
                                                        <i class="ni ni-cloud-download-95"></i></span>
                                <span class="btn-inner--text">{{ $item->file }}</span>
                            </a>
                        </div>
                    @endif
                @endif
                @if($item->message)
                    <div>
                        {!! $item->message !!}
                    </div>
                @endif
            </p>
        </div>
        <div class="card-footer text-right @if($item->deleted_at) border-danger @endif">
                                <span class="text-muted float-left">
                                    {{ $item->created_at }}
                                </span>
            @if($item->deleted_at)
                <a class="btn btn-sm btn-icon-only btn-outline-success item-restore"
                   href="javascript:void(0)"
                   title="{{ __('app.Restore') }}">
                    <i class="fas fa-redo"></i>
                </a>
            @endif
            <a class="btn btn-sm btn-icon-only btn-outline-danger delete"
               href="javascript:void(0)"
               title="Destroy"
               data-toggle="modal"
               data-target="#itemDeleteModal">
                <i class="fas fa-times"></i>
            </a>
        </div>
    </div>
@endif
