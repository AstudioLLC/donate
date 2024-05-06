<div class="step-white-block-wrap w-100 d-flex justify-content-center align-items-center">
    <form class="w-100 step-white-block d-flex flex-column justify-content-center align-items-center"
          id="sponsored-child-terms-and-conditions-form"
          action="{{ $route }}"
          method="POST">
        @csrf
        <span class="step-group-names">{{ $terms->title ?? null }}</span>
        <div class="step2-description text-default">
            {!! $terms->content ?? null !!}
        </div>
        <div class="step-2-checkbox d-flex justify-content-center align-items-center">
            <input type="checkbox" class="custom-checkbox" id="step-2-check" name="checkbox" required checked>
            <label class="text-default" for="step-2-check">
                {{ __('frontend.Steps.I agree to the Terms and Conditions') }}
            </label>
        </div>
        <div class="w-100 d-flex justify-content-center align-items-center step-2-next-btn">
            <button type="submit" class="button-orange">
                {{ __('frontend.Steps.Next') }}
            </button>
        </div>
    </form>
</div>
