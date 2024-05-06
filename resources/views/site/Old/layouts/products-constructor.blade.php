@if(count($items))
    @foreach($items as $item)
        <div class="w-1/2 xs:w-1/2 md:w-1/2 lg:w-1/4 xl:1/4 px-2 pb-2 flex h-auto">
            @include('site.components.item-card')
        </div>
    @endforeach
    <div class="w-full pagination-wrapper px-2">
        {!! $items->links() !!}
    </div>

@else
    <div class="w-full">
        <h2 class="text-center my-2">{{ t('Page items.no results') }}</h2>
    </div>
@endif
