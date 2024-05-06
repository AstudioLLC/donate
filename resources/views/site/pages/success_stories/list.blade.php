@if($items)
    @foreach($items as $item)
        @include('site.pages.success_stories.card', ['item' => $item])
    @endforeach
    @if(count($items) > 12)
        {!! $items->links() !!}
    @endif
@endif
