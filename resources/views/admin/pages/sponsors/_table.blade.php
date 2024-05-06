<h4>{{count($items) -1}}</h4>

<table class="table align-items-center table-flush dataTable">
    <thead class="thead-light">
    <tr>
        <th>{{ __('app.List.ID') }}</th>
        <th>{{ __('app.List.ID') }}</th>
        <th>{{ __('app.Form.Sponsor') }}</th>
{{--        <th>{{ __('app.List.Name') }}</th>--}}
{{--        <th>{{ __('app.List.Email') }}</th>--}}
        <th>Registered</th>
        <th>{{ __('app.List.Status') }}</th>
        <th>{{ __('app.List.Type') }}</th>
        <th>{{ __('app.Action') }}</th>
    </tr>
    </thead>
    <tbody class="list" data-action="{{--{{ route('admin.sponsors.sort') }}--}}">

    </tbody>
</table>
