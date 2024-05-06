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
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Donation.Order ID')])@endformTitle
                <div class="card-body">
                    {!!  $item->order_id ?? null !!}
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Donation.Fundraiser')])@endformTitle
                <div class="card-body">
                    {!!  $item->fundraiser->title ?? null !!}
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Donation.Sponsor')])@endformTitle
                <div class="card-body">
                    {!!  $item->sponsor->name ?? null !!}
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Donation.Child')])@endformTitle
                <div class="card-body">
                    {!!  $item->children->title ?? null !!}
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Donation.MDORDER')])@endformTitle
                <div class="card-body">
                    {!!  $item->mdorder ?? null !!}
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Donation.Gift')])@endformTitle
                <div class="card-body">
                    {!!  $item->gift->title ?? null !!}
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Donation.Anonymous')])@endformTitle
                <div class="card-body">
                    {!!  $item->anonymous ? 'Is Anonymously' : 'No' !!}
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Donation.Amount')])@endformTitle
                <div class="card-body">
                    {!!  $item->amount ?? null !!} AMD
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.List.Email')])@endformTitle
                <div class="card-body">
                    {!!  $item->email ?? null !!}
                </div>
            </div>
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.List.Name')])@endformTitle
                <div class="card-body">
                    {!!  $item->fullname ?? null !!}
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group border-bottom">
                @checkbox([
                'id' => 'is_binding',
                'label' => __('app.Donation.Binded'),
                'checked' => oldCheck('is_binding', (empty($item->is_binding)) ? false : true)
                ])@endcheckbox
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group border-bottom">
                @checkbox([
                'id' => 'status',
                'label' => __('app.List.Status'),
                'checked' => oldCheck('status', (empty($item->status)) ? false : true)
                ])@endcheckbox
            </div>
        </div>
        <div class="col-12">
            <div class="form-group border-bottom">
                @formTitle(['title' => __('app.Donation.Message')])@endformTitle
                <div class="card-body">
                    <textarea name="message"
                              class="ckeditor form-control form-control-sm form-control-alternative{{ $errors->has('message') ? ' is-invalid' : '' }}"
                              rows="5"
                              placeholder="{{ __('app.Donation.Message') }}">{{ old('message', $item->message) }}</textarea>
                    @if ($errors->has('message'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
{{--            <div class="form-group border-bottom">--}}
{{--                @formTitle(['title' => __('app.Donation.Admin message')])@endformTitle--}}
{{--                <div class="card-body">--}}
{{--                    <textarea name="message_admin"--}}
{{--                              class="ckeditor form-control form-control-sm form-control-alternative{{ $errors->has('message_admin') ? ' is-invalid' : '' }}"--}}
{{--                              rows="5"--}}
{{--                              placeholder="{{ __('app.Donation.Admin message') }}">{{ old('message_admin', $item->message_admin) }}</textarea>--}}
{{--                    @if ($errors->has('message_admin'))--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $errors->first('message_admin') }}</strong>--}}
{{--                    </span>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="form-group border-bottom">
                @formTitle(['title' => 'Sponsorship Type'])@endformTitle
                <div class="card-body">
                    <select name="whom_sp" id="whom_sp" class="form-control form-control-sm form-control-alternative">
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
            <div class="form-group d-flex align-items-center border-bottom">
                @formTitle(['title' => 'Phone'])@endformTitle
                <div class="card-body">
                    {!!  $item->phone ?? null !!}
                </div>
            </div>
            <div class="form-group d-flex align-items-center border-bottom">
                @formTitle(['title' => 'City'])@endformTitle
                <div class="card-body">
                    {!!  $item->city ?? null !!}
                </div>
            </div>
            <div class="form-group d-flex align-items-center border-bottom">
                @formTitle(['title' => 'Address'])@endformTitle
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
            <div class="form-group d-flex align-items-center border-bottom">
                @formTitle(['title' => 'Area'])@endformTitle
                <div class="card-body">
                    {!!  $item->region->title ?? null !!}
                </div>
            </div>
        </div>
    </div>

    @submit(['title' => null])@endsubmit
</form>
