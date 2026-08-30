<section class="how-section">

    <div class="container">

        {{-- Header --}}

        <div class="how-header text-center">

            <div class="section-heading">

                <div class="section-divider-top"></div>

                <span class="how-badge">
                    <i class="fa-solid fa-sparkles"></i>
                    {{ __('how.badge') }}
                </span>

                <div class="section-divider-top"></div>

            </div>

            <h2 class="how-title">
                {{ __('how.title') }}
            </h2>

            <p class="how-subtitle">
                {{ __('how.subtitle') }}
            </p>

        </div>

        {{-- Steps --}}

        <div class="how-steps-wrapper">

            <div class="steps-line"></div>

            <div class="row g-4 justify-content-center">

                {{-- Step 1 --}}
                <div class="col-lg-3 col-md-6">

                    <div class="how-card how-reveal-step">

                        <div class="timeline-node">
                            <span></span>
                        </div>

                        <div class="step-number">
                            01
                        </div>

                        <div class="step-icon">
                            <i class="fa-solid fa-upload"></i>
                        </div>

                        <h4>{{ __('how.steps.0.title') }}</h4>

                        <p>
                            {{ __('how.steps.0.description') }}
                        </p>

                    </div>

                </div>

                {{-- Step 2 --}}
                <div class="col-lg-3 col-md-6">

                    <div class="how-card reveal-step">

                        <div class="timeline-node">
                            <span></span>
                        </div>

                        <div class="step-number">
                            02
                        </div>

                        <div class="step-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <h4>{{ __('how.steps.1.title') }}</h4>
                        <p>
                            {{ __('how.steps.1.description') }}
                        </p>
                    </div>

                </div>

                {{-- Step 3 --}}
                <div class="col-lg-3 col-md-6">

                    <div class="how-card reveal-step">

                        <div class="timeline-node">
                            <span></span>
                        </div>

                        <div class="step-number">
                            03
                        </div>

                        <div class="step-icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>

                        <h4>{{ __('how.steps.2.title') }}</h4>
                        <p>
                            {{ __('how.steps.2.description') }}
                        </p>
                    </div>

                </div>

                {{-- Step 4 --}}
                <div class="col-lg-3 col-md-6">

                    <div class="how-card reveal-step">

                        <div class="timeline-node">
                            <span></span>
                        </div>

                        <div class="step-number">
                            04
                        </div>

                        <div class="step-icon">
                            <i class="fa-solid fa-share-nodes"></i>
                        </div>

                        <h4>{{ __('how.steps.3.title') }}</h4>
                        <p>
                            {{ __('how.steps.3.description') }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>



</section>
