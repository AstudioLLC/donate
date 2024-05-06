@if($items)
    @foreach($items->faq as $item)
        <div class="text-default">
            <h3 class="my-2">{{ $item->title ?? null }}</h3>
            <div class="editor">
                {!! $item->content ?? null !!}
            </div>
        </div>
    @endforeach
@endif
