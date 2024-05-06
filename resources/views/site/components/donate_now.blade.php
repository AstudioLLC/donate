<div class="donate-now-wrap my-margin">
    <div class="container-small donate-now-block d-flex justify-content-center align-items-center">
        <span class="donate-now-text">
            {{ __('frontend.Any donation is valuable') }}
        </span>
        <a href="{{ route('page', ['url' => $ourPrograms->url ?? null]) }}" class="button-orange text-decoration-none">
            {{ __('frontend.Donate NOW') }}
        </a>
    </div>
</div>
