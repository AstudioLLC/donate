@extends('admin.layouts.app')

@section('content')
    <div class="header bg-primary py-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12 text-right">
                        @if(count($items) < 2)
                            <a href="{{ route('admin.home_blocks.create') }}" class="btn btn-sm btn-neutral">
                                {{ __('app.Create') }}
                            </a>
                        @endif
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
                        <h3 class="mb-0">{{ __('app.Home Blocks') }}</h3>
                    </div>
                    <div class="table-responsive p-4">
                        @include('admin.pages.home_blocks._table', ['items' => $items ?? null])
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
    @include('admin.pages.home_blocks._script')
@endsection
