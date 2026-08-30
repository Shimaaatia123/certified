<section class="services-section">

    <div class="container">

        {{-- Header --}}
        <div class="services-header text-center">

            <h2 class="services-title">
                {{ __('services.title') }}
            </h2>

            <p class="services-subtitle">
                {{ __('services.subtitle') }}
            </p>

        </div>

        {{-- Cards --}}
        <div class="row g-4">

            {{-- Card 1 --}}
            <div class="col-lg-4 col-md-6">

                <div class="services-card services-reveal-card">

                    <div class="services-icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>

                    <h4>{{ __('services.verification.title') }}</h4>

                    <p>{{ __('services.verification.description') }}</p>

                    <a href="{{ route('about') }}" class="services-link">
                        {{ __('services.learn_more') }}
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

            </div>

            {{-- Card 2 --}}
            <div class="col-lg-4 col-md-6">

                <div class="services-card services-reveal-card">

                    <div class="services-icon">
                        <i class="fa-solid fa-certificate"></i>
                    </div>

                    <h4>{{ __('services.certificate.title') }}</h4>

                    <p>{{ __('services.certificate.description') }}</p>

                    <a href="{{ route('about') }}" class="services-link">
                        {{ __('services.learn_more') }}
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

            </div>

            {{-- Card 3 --}}
            <div class="col-lg-4 col-md-6">

                <div class="services-card services-reveal-card">

                    <div class="services-icon">
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <h4>{{ __('services.authentication.title') }}</h4>

                    <p>{{ __('services.authentication.description') }}</p>

                    <a href="{{ route('about') }}" class="services-link">
                        {{ __('services.learn_more') }}
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

            </div>

            {{-- Card 4 --}}
            <div class="col-lg-4 col-md-6">

                <div class="services-card services-reveal-card">

                    <div class="services-icon">
                        <i class="fa-solid fa-cloud"></i>
                    </div>

                    <h4>{{ __('services.storage.title') }}</h4>

                    <p>{{ __('services.storage.description') }}</p>

                    <a href="{{ route('about') }}" class="services-link">
                        {{ __('services.learn_more') }}
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

            </div>

            {{-- Card 5 --}}
            <div class="col-lg-4 col-md-6">

                <div class="services-card services-reveal-card">

                    <div class="services-icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>

                    <h4>{{ __('services.analytics.title') }}</h4>

                    <p>{{ __('services.analytics.description') }}</p>

                    <a href="{{ route('about') }}" class="services-link">
                        {{ __('services.learn_more') }}
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

            </div>

            {{-- Card 6 --}}
            <div class="col-lg-4 col-md-6">

                <div class="services-card services-reveal-card">

                    <div class="services-icon">
                        <i class="fa-solid fa-headset"></i>
                    </div>

                    <h4>{{ __('services.support.title') }}</h4>

                    <p>{{ __('services.support.description') }}</p>

                    <a href="{{ route('about') }}" class="services-link">
                        {{ __('services.learn_more') }}
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>
