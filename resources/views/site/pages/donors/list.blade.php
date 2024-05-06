@if($items)
    @foreach($items as $item)
        @include('site.pages.donors.card', ['item' => $item])
    @endforeach
    {!! $items->links() !!}
@endif
