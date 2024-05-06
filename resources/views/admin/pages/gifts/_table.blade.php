<table class="table align-items-center table-flush" id="datatable-basic">
    <form action="{{route('admin.gifts.search')}}" method="get">
        <div class="form-group">
            <input class="form-control" name="search" type="search" placeholder="Search" id="example-search-input">
        </div>
    </form>
    <thead class="thead-light">
    <tr>
        <th>{{ __('app.List.Name') }}</th>
        <th>{{ __('app.List.Cost') }}</th>
        <th>{{ __('app.Active') }}</th>
        <th class="text-right">{{ __('app.Action') }}</th>
    </tr>
    </thead>
    <tbody class="list table-sortable" data-action="{{ route('admin.gifts.sort') }}">
    @forelse($items as $item)
        <tr data-id="{{ $item->id }}" class="item-row">
            <td class="item-title">{{ $item->title }}</td>
            <td class="item-title">{{ $item->cost }}</td>
            <td>
                <label class="custom-toggle page-active">
                    <input type="checkbox" value="{{ $item->active }}" {{ $item->active ? ' checked' : '' }}>
                    <span class="custom-toggle-slider rounded-circle"></span>
                </label>
            </td>
            <td class="text-right">
                <a class="btn btn-sm btn-icon-only btn-outline-primary"
                   href="{{ route('admin.gifts.edit', ['id' => $item->id]) }}"
                   title="{{ __('app.Edit') }}">
                    <i class="far fa-edit"></i>
                </a>

                <a class="btn btn-sm btn-icon-only btn-outline-danger delete"
                   href="javascript:void(0)"
                   title="{{ __('app.Destroy') }}"
                   data-toggle="modal"
                   data-target="#itemDeleteModal">
                    <i class="fas fa-times"></i>
                </a>
            </td>
        </tr>
    @empty
        @include('admin.components._empty')
    @endforelse
    </tbody>
</table>
