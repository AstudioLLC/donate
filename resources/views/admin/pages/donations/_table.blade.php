@push('css')
<style>
    .sorting_1{
        white-space: break-spaces !important;
    }
    .real-time-save{
        background: #F3723B;
        border: none;
        width: 100%;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        cursor: pointer;
    }
    .real-time-save:hover {
        background: limegreen;
    }
    }
    /*td{*/
    /*    white-space: break-spaces !important;*/
    /*}*/
</style>
@endpush



<table class="table align-items-center table-flush dataTable" >
    <thead class="thead-light">
    <tr>
{{--        <th>{{ __('app.Donation.ID') }}</th>--}}
        <th>{{ __('app.Donation.Sponsor') }}</th>
{{--        <th>{{ __('app.Donation.Fundraiser') }}</th>--}}
{{--        <th>{{ __('app.Donation.Gift') }}</th>--}}
        <th>Project type</th>
{{--        <th>{{ __('app.Donation.Binded') }}</th>--}}
        <th>Child id</th>
        <th>{{ __('app.Donation.Amount') }}</th>
        <th>Type</th>
{{--        <th>{{ __('app.List.Name') }}</th>--}}
        {{--<th>{{ __('app.Donation.Message') }}</th>
        <th>{{ __('app.Donation.Admin message') }}</th>--}}
        <th>{{ __('app.List.Status') }}</th>
        <th>{{ __('app.List.Date') }}</th>
{{--        <th>Message</th>--}}
        <th>Message Admin</th>

        <th>{{ __('app.Action') }}</th>
    </tr>
    </thead>
    <tbody class="list table-sortable" data-action="{{ route('admin.donations.sort') }}">

    </tbody>
</table>

