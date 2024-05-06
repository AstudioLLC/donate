@if($items)
    <div class="row gift-row">
        @foreach($items as $item)
            @include('site.pages.gifts.card', ['item' => $item])
        @endforeach
    </div>
@endif
