<table class="table align-items-center table-flush" id="datatable-basic">
    <form action="{{route('admin.sponsors.search')}}" method="get">
        <div class="form-group">
            <input class="form-control" name="search" type="search" placeholder="Search" id="example-search-input">
        </div>
    </form>
    <thead class="thead-light">
    <tr>
        <th>{{ __('app.List.ID') }}</th>
        <th>{{ __('app.Form.Sponsor ID') }}</th>
        <th>{{ __('app.List.Name') }}</th>
        <th>{{ __('app.List.Email') }}</th>
        <th>{{ __('app.List.Registration date') }}</th>
        <th class="text-right">{{ __('app.Action') }}</th>
    </tr>
    </thead>
    <tbody class="list">
        @forelse ($items as $item)
            <tr data-id="{{ $item->id }}" class="item-row">
                <td class="item-title">{{ $item->id }}</td>
                <td class="item-title">{{ $item->options->sponsor_id ?? '' }}</td>
                <td class="item-title">{{ $item->name }}</td>
                <td class="item-title">{{ $item->email }}</td>
                <td class="item-title">{{ $item->created_at->format('d/m/Y') }}</td>
                <td class="text-right">
                    <a class="btn btn-sm btn-icon-only btn-outline-success item-restore"
                       href="javascript:void(0)"
                       title="{{ __('app.Restore') }}">
                        <i class="fas fa-redo"></i>
                    </a>

{{--                    <a class="btn btn-sm btn-icon-only btn-outline-danger delete"--}}
{{--                       href="javascript:void(0)"--}}
{{--                       title="{{ __('app.Destroy') }}"--}}
{{--                       data-toggle="modal"--}}
{{--                       data-target="#itemDeleteModal">--}}
{{--                        <i class="fas fa-times"></i>--}}
{{--                    </a>--}}
                </td>
            </tr>
        @empty
            @include('admin.components._empty')
        @endforelse
    </tbody>
</table>
