<table class="table align-items-center table-flush" id="datatable-basic">
    <thead class="thead-light">
    <tr>
        <th>{{ __('app.Children') }}</th>
        <th>{{ __('app.Form.Sponsor') }}</th>
        <th>Date</th>

        <th class="text-right">{{ __('app.Action') }}</th>
    </tr>
    </thead>
    <tbody class="list">
    @forelse($items as $item)
        <tr class="item-row">
            <td class="item-title">
                {{ $item->first()->children->title }} - {{ $item->first()->children->child_id }}
            </td>
            <td class="item-title">
{{--                @dd( $item->first()->sponsor->name)--}}
                {{ $item->first()->sponsor->name ?? null}}
                {{ isset($item->first()->sponsor->options->sponsor_id) ? ' - ' . $item->first()->sponsor->options->sponsor_id : null }}
            </td>
            <td class="item-title">
                {{$item->first()->created_at}}
            </td>
            <td class="text-right">
                <a class="btn btn-sm btn-icon-only btn-outline-primary"
                   href="{{ route('admin.chat.edit', ['childrenId' => $item->first()->children_id, 'sponsorId' => $item->first()->sponsor_id]) }}"
                   title="{{ __('app.Edit') }}">
                    <i class="far fa-edit"></i>
                </a>

                {{--<a class="btn btn-sm btn-icon-only btn-outline-danger delete"
                   href="javascript:void(0)"
                   title="{{ __('app.Destroy') }}"
                   data-toggle="modal"
                   data-target="#itemDeleteModal">
                    <i class="fas fa-times"></i>
                </a>--}}
            </td>
        </tr>
    @empty
        @include('admin.components._empty')
    @endforelse
    </tbody>
</table>
