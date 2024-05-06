<table class="table align-items-center table-flush" id="datatable-basic">
    <thead class="thead-light">
    <tr>
        <th>{{ __('app.List.Name') }}</th>
        <th>{{ __('app.Subcategories') }}</th>
        <th>{{ __('app.Active') }}</th>
        <th class="text-right">{{ __('app.Action') }}</th>
    </tr>
    </thead>
    <tbody class="list table-sortable" data-action="{{ route('admin.pages.sort') }}">
    @forelse($items as $item)
        <tr data-id="{{ $item->id }}" class="item-row">
            <td class="item-title">{{ $item->title }}</td>
            <td>
                <a href="{{ route('admin.pages.index', ['parentId' => $item->id]) }}"
                   class="text-muted text-decoration-none">
                    {{ __('app.Subcategories') . ' (' . $item->children_count . ')' }}
                </a>
            </td>
            <td>
                <label class="custom-toggle page-active">
                    <input type="checkbox" value="{{ $item->active }}" {{ $item->active ? ' checked' : '' }}>
                    <span class="custom-toggle-slider rounded-circle"></span>
                </label>
            </td>
            <td class="text-right">
                <a class="btn btn-sm btn-icon-only btn-outline-default"
                   href="{{ route('admin.gallery.index', ['gallery' => 'pages', 'key' => $item->id]) }}"
                   title="{{ __('app.Gallery') }} ({{ $item->gallery_count }})">
                    <i class="far fa-images"></i>
                </a>
                @if($item->static == 'our_grand_programs' || $item->parent_id == 41)
                    <a class="btn btn-sm btn-icon-only btn-outline-default"
                       href="{{ route('admin.videos.index', ['video' => 'page', 'key' => $item->id]) }}"
                       title="{{ __('app.Video gallery') }} ({{ $item->gallery_count }})">
                        <i class="fab fa-youtube"></i>
                    </a>
                @endif

                                    <a class="btn btn-sm btn-icon-only btn-outline-default"
                                       href="{{ route('admin.file.index', ['file' => 'pages', 'key' => $item->id]) }}"
                                       title="{{ __('app.Files') }} ({{ $item->files_count }})">
                                        <i class="far fa-copy"></i>
                                    </a>

                {{--@if(isset($video_gallery_pages) && array_key_exists($item->static, $video_gallery_pages))
                    <a class="btn btn-sm btn-icon-only text-light"
                       href="{{ $file_pages[$item->static] }}"
                       title="{{ __('app.Video gallery') }}">
                        <i class="far fa-file-video"></i>
                    </a>
                @endif--}}

                <a class="btn btn-sm btn-icon-only btn-outline-primary"
                   href="{{ route('admin.pages.edit', ['id' => $item->id]) }}"
                   title="{{ __('app.Edit') }}">
                    <i class="far fa-edit"></i>
                </a>

                @if(!$item->static && $item->children_count == 0 && $item->children_with_trashed_count == 0)
                    <a class="btn btn-sm btn-icon-only btn-outline-danger delete"
                       href="javascript:void(0)"
                       title="{{ __('app.Destroy') }}"
                       data-toggle="modal"
                       data-target="#itemDeleteModal">
                        <i class="fas fa-times"></i>
                    </a>
                @endif
            </td>
        </tr>
    @empty
        @include('admin.components._empty')
    @endforelse
    </tbody>
</table>
