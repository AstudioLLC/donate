@if($items)
    @foreach($items as $item)
        @include('site.pages.news.card', ['item' => $item])
    @endforeach
    {!! $items->links() !!}
@endif
