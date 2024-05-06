@if(isset($item))
    @push('js')
        <script>
            {
                let width = 1;
                let elem = document.getElementsByClassName("myBar");
                let totalValue = document.getElementsByClassName('data-total');
                let reachedValue = document.getElementsByClassName('reached-value');

                for (let i = 0; i < elem.length; i++) {
                    let params = {
                        width: width,
                        elem: elem[i],
                        totalValue: totalValue[i].getAttribute('data-total'),
                        reachedValue: reachedValue[i].getAttribute('data-reached'),
                        interval: null,
                    };


                    params.width = params.reachedValue / params.totalValue * 100;
                    if (params.width > 100){
                        params.width = 99
                    }

                    params.interval = setInterval(frame, 50, params);
                }


                function frame(aParams) {
                    clearInterval(aParams.interval);
                    aParams.width++;
                    aParams.elem.style.backgroundColor = '#3B9DE2';
                    aParams.elem.style.width = aParams.width + '%';
                }
            }
        </script>
    @endpush

    <div class="progressbar-component">
        <span class="first-sponsor" style="color: #F86A04; font-size: 18px; font-weight: 700;">
            @if($donations ?? null)
             @foreach($donations as $key => $donation)
                 @if($donation->fundraiser_id == $item->id)
                        {{ucfirst($donation->fullname)}}
                 @break
                 @endif
            @endforeach
            @endif
        </span>
        <div class="d-flex justify-content-between align-items-center progressbar-top">
            <div class="reached-value" data-reached="{{ $item->collected }}">
            <span class="reached-value-span">
                {{ __('frontend.Fundraisers.reached') }}
            </span>
                {{ $item->collected }}
            </div>
            @if($item->cost - $item->collected < 0)
                <span style="font-size: 18px; font-weight: 700; color: limegreen;">{{__('frontend.Completed')}}</span>
            @else
                <div class="left-value" data-left="{{ $item->cost - $item->collected }}">
                    <span>{{ __('frontend.Fundraisers.left') }}</span>
                        <span class="left-value-inner">
                                {{ $item->cost - $item->collected }}
                        </span>
                </div>
            @endif

        </div>
        <div class="myProgress progressbar-middle">
            <div class="myBar">
                <div class="myBar-dots myBar-dots-left"></div>
                <div class="myBar-dots myBar-dots-right"></div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center progressbar-bottom">
            <div class="progress-bottom-text">
                {{ __('frontend.Fundraisers.goal') }}
            </div>
            <div class="progress-bottom-text data-total" data-total="{{ $item->cost }}">
                {{ $item->cost }}
            </div>
        </div>
    </div>
@endif
