<table class="table align-items-center table-flush" id="datatable-basic">
    <thead class="thead-light">
    <tr>
        <th>{{ __('app.Donation.Sponsor') }}</th>
        <th>Project type</th>
        <th>Child id</th>
        <th>{{ __('app.Donation.Amount') }}</th>
        <th>Type</th>
        <th>{{ __('app.List.Status') }}</th>
        <th>{{ __('app.List.Date') }}</th>
        <th>Message Admin</th>
        <th class="text-right">{{ __('app.Action') }}</th>
    </tr>
    </thead>
    <tbody class="list">
        @forelse ($items as $item)
            <tr data-id="{{ $item->id }}" class="item-row">
                <td class="item-title">
                {{
                    $item->fullname ?? null.
                    $item->sponsor->email ?? null ? : $item->email ?? null
                }}
                </td>
                <td class="item-title">{{$item->project_type ?? null}}</td>
                <td class="item-title">{{ $item->children->title ?? null}}</td>
                <td class="item-title">{{ $item->amount ?? null}}</td>
                <td class="item-title">{{ $item->card_type ?? null}}</td>
                <td class="item-title">{{ $item->status ?? null}}</td>
                <td class="item-title">{{ $item->created_at->format('d-m-Y') ?? null}}</td>
                <td class="item-title">{{ $item->message ?? null}}</td>

                <td class="text-right">
                    <a class="btn btn-sm btn-icon-only btn-outline-success item-restore"
                       href="javascript:void(0)"
                       title="{{ __('app.Restore') }}">
                        <i class="fas fa-redo"></i>
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
