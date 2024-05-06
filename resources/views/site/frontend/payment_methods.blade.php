@extends('site.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ ('css/frontend/background-gray.css') }}">
@endpush

@section('content')
    <div class="background-gray">
        <div class="container-small">
            @include('site.components.breadcrumb')

            <span class="title-usual">Payment methods</span>

        </div>
    </div>

    <div class="container-small background-gray-page-editor text-default">
        Personal information includes any information that can be used to distinguish, identify or contact a specific individual, such as name, surname, email address, telephone numbers, credit card or bank account information for donation purposes. Personal information gathered by World Vision Armenia is kept in confidence.

        World Vision Armenia will use your personal information in order to process your donation and provide you with relevant communications and marketing materials. We would also like to send you information about World Vision Armenia’s other activities or initiatives that we think might be of interest to you.

        In case you choose to opt-out of these communications, please email us at worldvision_armenia@wvi.org

        World Vision Armenia will not share your personal information with any third party.

        Please contact us if you have questions or concerns related to this Privacy Policy.
    </div>

    @include('site.components.donate_now')
@endsection
