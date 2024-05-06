@extends('admin.layouts.app')

@section('content')

    <div class="header bg-primary py-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12 text-right">
                        <a href="{{ route('admin.donations.exportExcel') }}" class="btn btn-sm btn-neutral">
                            {{ __('app.Export') }}
                        </a>
{{--                        <a href="{{ route('admin.donations.onlyTrashed') }}" class="btn btn-sm btn-neutral">--}}
{{--                            {{ __('app.Trash') }}--}}
{{--                        </a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="mb-0">{{ __('app.Donations') }}</h3>
                    </div>
                    <span class="text-danger m-4">
                        Օնլայն փոխանցումների մասին ինֆորմացիան կրում է ոչ պաշտոնական բնույթ։
                        Հաջող կամ անհաջող վճարումների մասին ինֆորմացիան տարբեր պատճառներով կարող է չհասնել կայքին։
                        Խնդրում ենք վճարումների մասին որպես պաշտոնական ինֆորմացիա ընդունել միայն գործընկեր կառույցի (բանկ, Idram, Telcell)
                        տրամադրած անձնական կաբինետի ինֆորմացիան։ 
                    </span>
                    <div class="col-lg-12 col-12 text-left">
                        @if($oldest)
                            <a href="javascript:void(0)"
                               class="btn btn-sm addYearToSession {{ \Session::get('year') == 0 ? 'btn-primary' : 'btn-neutral' }}"
                               data-year="0" data-gift="0" data-fundraiser="0" data-month="0" data-failed="0" data-child="0">
                                {{ __('app.List.All') }}
                            </a>
                            @for($date; $date >= $oldest; $date--)
                                <a href="javascript:void(0)"
                                   class="btn btn-sm addYearToSession {{ \Session::get('year') == $date ? 'btn-primary' : 'btn-neutral' }}"
                                   data-year="{{ $date }}">
                                    {{ $date }}
                                </a>
                            @endfor

                            <div class="col-lg-12 col-12 text-left pt-4">
                                <a href="javascript:void(0)"
                                   class="btn btn-sm addFailedToSession {{ \Session::get('failed') == $failed ? 'btn-primary' : 'btn-neutral' }}"
                                   data-fundraiser="0"
                                   data-failed="{{ $failed }}">
                                    {{ __('app.List.Failed Donations') }}
                                </a>
                                <a href="javascript:void(0)"
                                   class="btn btn-sm addChildToSession {{ \Session::get('child') == $child ? 'btn-primary' : 'btn-neutral' }}"
                                   data-fundraiser="0"
                                   data-child="{{ $child }}">
                                    Local sponsorship
                                </a>

                                <a href="javascript:void(0)"
                                   class="btn btn-sm addGiftToSession {{ \Session::get('gift') == $gift ? 'btn-primary' : 'btn-neutral' }}"
                                   data-fundraiser="0"
                                   data-gift="{{ $gift }}">
                                    Gifts catalogue
                                </a>

                                <a href="javascript:void(0)"
                                   class="btn btn-sm addFundraiserToSession {{ \Session::get('fundraiser') == $fundraiser ? 'btn-primary' : 'btn-neutral' }}"
                                   data-gift="0"
                                   data-fundraiser="{{ $fundraiser }}">
                                    Only Fundraisers
                                </a>

                                <a href="javascript:void(0)"
                                   class="btn btn-sm addMonthToSession {{ \Session::get('month') == $month ? 'btn-primary' : 'btn-neutral' }}"
                                   data-month="{{ $month }}">
                                    DONATЕ FOR MOST URGENT NEEDS
                                </a>
                            </div>
                        @endif


                    </div>

                    <div class="table-responsive p-4">
                        @include('admin.pages.donations._table', ['items' => $items ?? null])
                    </div>
                </div>
                @include('admin.components._modal', [
                    'id' => 'itemDeleteModal',
                    'centered' => true,
                    'loader' => true,
                    'saveBtn' => __('app.Delete'),
                    'saveBtnClass' => 'btn-danger',
                    'closeBtn' => __('app.Close'),
                    'slot' => [
                        'title' => __('app.Destroy'),
                        'input' => '<input type="hidden" id="pdf-item-id">',
                        'question' => '<p class="mb-0">' . __('app.Are you sure? The page will be deleted permanently!') . '</p>'],
                    'form' => [
                        'id'=>'itemDeleteForm',
                        'action'=>'javascript:void(0)']
                ])
            </div>
        </div>
    </div>
    @include('admin.layouts.footers.auth')
    @include('admin.pages.donations._script')
@endsection
