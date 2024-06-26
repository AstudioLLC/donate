@extends('admin.layouts.app')

@section('content')
    <div class="header bg-primary py-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">

                    <div class="col-lg-12 col-12 text-left">
                            <a href="javascript:void(0)"
                               class="btn btn-sm addUnreadSession {{ \Session::get('unread') == 0 ? 'btn-primary' : 'btn-neutral' }}"
                               data-ts="0" data-ls="0">
                                {{ __('app.List.All') }}
                            </a>
{{--                        <span>{{$count}}</span>--}}
                        @if(count($unread_messages))
                            <a href="javascript:void(0)"
                               class="btn btn-sm addUnreadSession {{ \Session::get('unread') == $unread ? 'btn-primary' : 'btn-neutral' }}"
                               data-unread="{{ $unread }}">
                                Unread Messages
                            </a>
                            <span class="text-white">{{count($unread_messages)}}</span>
                        @endif
                    </div>
                    <div class="col-lg-12 col-12 text-right">
                        <a href="{{ route('admin.children.exportExcel') }}" class="btn btn-sm btn-neutral">
                            {{ __('app.Export') }}
                        </a>
                        <a href="{{ route('admin.children.onlyTrashed') }}" class="btn btn-sm btn-neutral">
                            {{ __('app.Trash') }}
                        </a>
                        <a href="{{ route('admin.children.create') }}" class="btn btn-sm btn-neutral">
                            {{ __('app.Create') }}
                        </a>
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
                        <h3 class="mb-0">{{ __('app.Children') }}</h3>
                    </div>
                    <div class="table-responsive p-4">
                        @include('admin.pages.children._table', ['items' => $items ?? null])
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
    @include('admin.pages.children._script')
@endsection
