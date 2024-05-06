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
                <h3 class="mb-0">{{ __('app.Chat') }}</h3>
            </div>
            <div class="card-body border-0">
                @include('admin.pages.chat._form', ['items' => $items ?? null])
            </div>
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
    {{--@include('admin.layouts.footers.auth')--}}
    @include('admin.pages.chat._script')
@endsection
