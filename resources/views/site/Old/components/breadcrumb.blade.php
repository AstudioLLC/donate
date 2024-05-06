@if(!empty($breadcrumbs))
    <nav class="bg-gray-light sm:block hidden p-3 rounded  w-full">
        <ol class="list-reset flex text-grey-dark">
            <li>
                <a href="{{ url('/') }}">
                    {!! $homepage->title !!}
                </a>
            </li>
            @foreach($breadcrumbs as $breadcrumb)
                <li>
                    <span class="mx-2">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </li>
                @if(!empty($breadcrumb['url']))
                    <li>
                        <a href="{{ $breadcrumb['url'] }}">
                            {!! $breadcrumb['title'] !!}
                        </a>
                    </li>
                @else
                    <li>
                        {!! $breadcrumb['title'] !!}
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif
