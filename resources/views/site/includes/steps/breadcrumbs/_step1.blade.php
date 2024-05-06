<div class="steps-breadcrumb-wrap d-flex align-items-center justify-content-center">
    <div class="steps-breadcrumb d-flex align-items-center">
        <div class="circle-wrap active-step d-flex flex-column align-items-start">
            <div class="circle">
                <span class="circle-number">1</span>
            </div>
            <span class="circle-bottom-text d-none d-sm-block">
                                {{ __('frontend.Steps.General info') }}
                            </span>
        </div>
        <div class="steps-band"></div>
        <div class="circle-wrap d-flex flex-column align-items-center">
            <div class="circle circle-two">
                <span class="circle-number">2</span>
            </div>
            <span class="circle-bottom-text d-none d-sm-block">{{ __('frontend.Steps.Terms & Co') }}</span>
            <span class="circle-bottom-text active-step-name d-sm-none">{{ __('frontend.Steps.General info') }}</span>
        </div>
        <div class="steps-band"></div>
        <div class="circle-wrap d-flex flex-column align-items-end">
            <div class="circle circle-two">
                <span class="circle-number">3</span>
            </div>
            <span class="circle-bottom-text d-none d-sm-block">{{ __('frontend.Steps.Billing Info') }}</span>
        </div>
    </div>
</div>
