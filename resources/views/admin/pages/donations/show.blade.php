@extends('admin.layouts.app')

@section('content')
    <div class="header bg-primary py-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12 text-left">
                        <a href="{!! $backUrl !!}" class="btn btn-sm btn-neutral">
                            {{ __('app.Back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="mb-0">{{ __('app.Donations') }}</h3>
            </div>
            <div class="card-body border-0">
                @push('js')
                    @ckeditor
                @endpush

                <form action="{!! route('admin.donations.edit', ['id' => $item->id]) !!}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => __('app.Donation.Order ID')])@endformTitle
                                <div class="card-body">
                                    {!!  $item->order_id ?? null !!}
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => 'Area'])@endformTitle
                                <div class="card-body">
                                    {!!  $item->region->title ?? null !!}
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => 'Anonymous'])@endformTitle
                                <div class="card-body">
                                    {!!  $item->anonymous ? 'Is Anonymously' : 'No' !!}
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => 'City'])@endformTitle
                                <div class="card-body">
                                    {!!  $item->city ?? null !!}
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => 'Adress'])@endformTitle
                                <div class="card-body">
                                    {!!  $item->address ?? null !!}
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => 'Country'])@endformTitle
                                <div class="card-body">
                                    {!!  $item->country->title ?? null !!}
                                </div>
                            </div>
                            @if($item->fundraiser->title ?? null)
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => __('app.Donation.Fundraiser')])@endformTitle
                                <div class="card-body">
                                    {!!  $item->fundraiser->title ?? null !!}
                                </div>
                            </div>
                            @endif
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => __('app.Donation.Sponsor')])@endformTitle
                                <div class="card-body">
                                    {!!  $item->sponsor->name ?? null !!}
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => __('app.Donation.Child')])@endformTitle
                                <div class="card-body">
                                    {!!  $item->children->title ?? null !!} {!!  $item->children->child_id ?? null !!}
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => 'Want Receive Letters'])@endformTitle
                                <div class="card-body">
                                    {!!  $item->sponsor->options->want_recive_letters ? 'Yes' : 'No' !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            @if($item->mdorder ?? null)
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => __('app.Donation.MDORDER')])@endformTitle
                                <div class="card-body">
                                    {!!  $item->mdorder ?? null !!}
                                </div>
                            </div>
                            @endif
                                @if($item->gift->title ?? null)
                                <div class="form-group d-flex align-items-center border-bottom">
                                    @formTitle(['title' => __('app.Donation.Gift')])@endformTitle
                                    <div class="card-body">
                                        {!!  $item->gift->title ?? null !!}
                                    </div>
                                </div>
                                @endif

                                    <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => __('app.Donation.Amount')])@endformTitle
                                <div class="card-body">
                                    {!!  $item->amount ?? null !!} AMD
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => __('app.Form.Sponsor ID')])@endformTitle
                                <div class="card-body">
                                    {!!  $item->sponsor->options->sponsor_id ?? null !!}
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => __('app.List.Email')])@endformTitle
                                <div class="card-body">
                                    {!!  $item->email ?? null !!}
                                </div>
                            </div>

                                <div class="form-group d-flex align-items-center border-bottom">
                                    @formTitle(['title' => 'Phone'])@endformTitle
                                    <div class="card-body">
                                        {!!  $item->phone ?? null !!}
                                    </div>
                                </div>


{{--                            <div class="form-group d-flex align-items-center border-bottom">--}}
{{--                                @formTitle(['title' => __('app.List.Name')])@endformTitle--}}
{{--                                <div class="card-body">--}}
{{--                                    {!!  $item->fullname ?? null !!}--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => 'Status'])@endformTitle
                                <div class="card-body">
                                    {!!  $item->status ? ' Yes' : 'No' !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            @if($item->message ?? null)
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => __('app.Donation.Message')])@endformTitle
                                <div class="card-body">
                    <textarea disabled name="message"
                              class=" form-control form-control-sm form-control-alternative{{ $errors->has('message') ? ' is-invalid' : '' }}"
                              rows="5"
                              placeholder="{{ __('app.Donation.Message') }}">{{ old('message', $item->message) }}</textarea>
                                    @if ($errors->has('message'))
                                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                                    @endif
                                </div>
                            </div>
                            @endif
                                @if($item->message_admin ?? null)
                            <div class="form-group d-flex align-items-center border-bottom">
                                @formTitle(['title' => __('app.Donation.Admin message')])@endformTitle
                                <div class="card-body">
                            <textarea disabled name="message_admin"
                              class=" form-control form-control-sm form-control-alternative{{ $errors->has('message_admin') ? ' is-invalid' : '' }}"
                              rows="5"
                              placeholder="{{ __('app.Donation.Admin message') }}">{{ old('message_admin', $item->message_admin) }}</textarea>
                                    @if ($errors->has('message_admin'))
                                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('message_admin') }}</strong>
                    </span>
                                    @endif
                                </div>
                            </div>
                                    @endif
                        </div>
                        <div class="form-group d-flex align-items-center border-bottom">
                            @formTitle(['title' => 'Sponsorship Type'])@endformTitle
                            <div class="card-body">
                                <select disabled name="whom_sp" id="whom_sp" class="form-control form-control-sm form-control-alternative">
                                    <option value="">-- {{ __('app.Form.Not selected') }} --</option>
                                    <option value="Child education and development" @if($item  && $item->whom_sp == 'Child education and development') selected @endif>- Child education and development -</option>
                                    <option value="Poverty reduction and resilience" @if($item  && $item->whom_sp == 'Poverty reduction and resilience') selected @endif>- Poverty reduction and resilience -</option>
                                </select>
                                @if ($errors->has('whom_sp'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('whom_sp') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>

{{--                    @submit(['title' => null])@endsubmit--}}
                </form>

            </div>
        </div>
    </div>
    @include('admin.layouts.footers.auth')
    @include('admin.pages.donations._script')
@endsection
