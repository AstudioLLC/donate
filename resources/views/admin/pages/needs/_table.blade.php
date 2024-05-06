<table class="table align-items-center table-flush" id="datatable-basic">
    <thead class="thead-light">
    <tr>
        <th>{{ __('app.List.Name') }}</th>
        <th>{{ __('app.Subcategories') }}</th>
        <th>{{ __('app.Active') }}</th>
        <th class="text-right">{{ __('app.Action') }}</th>
    </tr>
    </thead>
    <tbody class="list table-sortable" data-action="{{ route('admin.needs.sort') }}">
        @forelse($items as $item)
            <tr data-id="{{ $item->id }}" class="item-row">
                <td class="item-title">{{ $item->title }}</td>
                <td>
                    <a href="{{ route('admin.needs.index', ['parentId' => $item->id]) }}" class="text-muted text-decoration-none">
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
                    <a class="btn btn-sm btn-icon-only btn-outline-primary"
                       href="{{ route('admin.needs.edit', ['id' => $item->id]) }}"
                       title="{{ __('app.Edit') }}">
                        <i class="far fa-edit"></i>
                    </a>

                    @if(!$item->static && $item->children_count == 0)
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
