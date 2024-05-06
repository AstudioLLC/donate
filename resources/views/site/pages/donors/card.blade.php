@if($item)
    <div class="col-12 col-md-6 p-md-3 our-donor-card-wrap">
        <div class="our-donor-card">
            <div class="partner-logo">
                <img class="w-100"
                     src="{{ $item->getImageUrl('thumbnail') }}"
                     alt="{{ $item->title }}"
                     title="{{ $item->title }}">
            </div>
            <div class="partner-information d-flex flex-column">
                <span class="partner-name">{{ $item->title ?? null }}</span>
                <span class="events-number">{!! $item->content ?? null !!}</span>
               {{--<span class="cooperate-date">Համագործակցում ենք սկսած <span class="font-bold date">2018</span></span>

                <span class="events-number">Արշավների թիվը` <span class="font-bold event">Secret Santa 2018,<span> <span class="font-bold event">Secret Santa 2018</span></span></span></span>--}}
            </div>
        </div>
    </div>
@endif
