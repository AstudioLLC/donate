@extends('admin.layouts.app')

@section('content')
    <div class="header bg-primary py-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12 text-right">
                        <a href="{{ route('admin.bindings.exportExcel') }}" class="btn btn-sm btn-neutral">
                            {{ __('app.Export') }}
                        </a>
                        <div class="col-12 text-left">
                            <a href="{{route('admin.bindings.index')}}" class="btn btn-sm btn-neutral">Back</a>
                        </div>
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
                        <h3 class="mb-0">{{ __('app.Bindings') }}</h3>
                    </div>
                    <div class="table-responsive p-4">
                        @include('admin.pages.bindings._table', ['items' => $items ?? null])
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.footers.auth')
    @include('admin.pages.bindings._script')
@endsection
