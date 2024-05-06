@if($items)
    <div class="how-to-help-links">
        <div class="row">
            @foreach($items as $item)
                @if($item->active)
                    @if($page->id != $item->id)
                        @include('site.pages.support_our_programs.card', ['item' => $item])
                    @endif
                @endif
            @endforeach
        </div>
    </div>
@endif
