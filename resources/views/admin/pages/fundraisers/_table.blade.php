<table class="table align-items-center table-flush" id="datatable-basic">
    <form action="{{route('admin.fundraisers.search')}}" method="get">
            <div class="form-group">
                <input class="form-control" name="search" type="search" placeholder="Search" id="example-search-input">
            </div>
    </form>
    <thead class="thead-light">
    <tr>
        <th>{{ __('app.List.ID') }}</th>
        <th>{{ __('app.List.Name') }}</th>
        <th>{{ __('app.List.Cost') }}</th>
        <th>{{ __('app.List.Collected') }}</th>
        <th>{{ __('app.List.Creation date') }}</th>
        <th>{{ __('app.List.Unlimit') }}</th>
        <th>{{ __('app.Active') }}</th>
        <th class="text-right">{{ __('app.Action') }}</th>
    </tr>
    </thead>
    <tbody class="list table-sortable" data-action="{{ route('admin.fundraisers.sort') }}">
    @forelse($items as $item)
        <tr data-id="{{ $item->id }}" class="item-row">
            <td class="item-title">{{ $item->id }}</td>
            <td class="item-title">{{ $item->title }}</td>
            <td>{{ $item->cost }}</td>
            <td>
                <div class="d-flex align-items-center">
                    <span class="mr-2">{{ $item->getCollectedPercent() }}%</span>
                    <div>
                        <div class="progress">
                            <div class="progress-bar bg-gradient-success"
                                 role="progressbar"
                                 aria-valuenow="{{ $item->collected }}"
                                 aria-valuemin="0"
                                 aria-valuemax="{{ $item->cost }}"
                                 style="width: {{ $item->getCollectedPercent() }}%;">
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>{{ $item->created_at->format('d-m-Y') }}</td>
            <td>
                <label class="custom-toggle unlimit-changer">
                    <input type="checkbox" value="{{ $item->unlimit }}" {{ $item->unlimit ? ' checked' : '' }}>
                    <span class="custom-toggle-slider rounded-circle"></span>
                </label>
            </td>
            <td>
                <label class="custom-toggle active-changer">
                    <input type="checkbox" value="{{ $item->active }}" {{ $item->active ? ' checked' : '' }}>
                    <span class="custom-toggle-slider rounded-circle"></span>
                </label>
            </td>
            <td class="text-right">
                <a class="btn btn-sm btn-icon-only btn-outline-primary"
                   href="{{ route('admin.fundraisers.edit', ['id' => $item->id]) }}"
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
