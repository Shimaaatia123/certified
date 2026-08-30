{{-- ==========================================================
     CERTIFIED — HOME
     FEATURES SECTION
     ==========================================================

     Purpose:
     ----------------------------------------------------------
     Presents the core platform features and communicates the
     main value propositions of Certified.

     Content:
     ----------------------------------------------------------
     - Section badge
     - Section title
     - Section subtitle
     - Three feature cards
     - Feature numbers
     - Feature icons
     - Feature descriptions
     - Premium section divider

     Data Source:
     ----------------------------------------------------------
     Static / Translation-based content.

     Localization:
     ----------------------------------------------------------
     All user-facing text is loaded through Laravel translation
     keys from the home-features translation group.

     Examples:
         {{ __('home-features.badge') }}
         {{ __('home-features.title') }}
         {{ __('home-features.subtitle') }}
         {{ __('home-features.fast_title') }}
         {{ __('home-features.fast_desc') }}

     Backend Integration:
     ----------------------------------------------------------
     NOT REQUIRED.

     The current feature cards represent fixed platform
     capabilities and do not depend on database records.

     JavaScript:
     ----------------------------------------------------------
     features.js provides:
     - Scroll reveal
     - Desktop mouse tilt
     - Mouse-follow card light

     CSS:
     ----------------------------------------------------------
     features.css provides:
     - Section layout
     - Feature cards
     - Icons
     - Glow effects
     - Shine effects
     - Animations
     - Responsive behavior
     - Premium divider

     Slider / Dynamic Content:
     ----------------------------------------------------------
     None.

     The three cards are intentionally static presentation
     content.

     Status:
     CLOSED
     ========================================================== --}}
<section class="features-section ">

    <div class="features-particles"></div>

    <div class="container">

        {{-- Header --}}
        <div class="text-center section-header mb-5">

            <span class="features-badge">
                <i class="fas fa-award badge-icon-left"></i>
                {{ __('home-features.badge') }}
                <i class="fas fa-shield-alt badge-icon-right"></i>
            </span>

            <h2 class="section-title">
                {{ __('home-features.title') }}
            </h2>

            <p class="section-subtitle">
                {{ __('home-features.subtitle') }} 
            </p>

        </div>
        {{-- Cards --}}
        <div class="row g-4">

            {{-- Card 1 --}}
            <div class="col-lg-4 col-md-6">

                <div class="feature-card">

                    <span class="card-number">01</span>

                    <div class="card-light"></div>

                    <div class="icon">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>

                    <h5>
                        {{ __('home-features.fast_title') }}
                    </h5>

                    <p>
                        {{ __('home-features.fast_desc') }}
                    </p>

                </div>

            </div>

            {{-- Card 2 --}}
            <div class="col-lg-4 col-md-6">

                <div class="feature-card active">

                    <span class="card-number">02</span>

                    <div class="card-light"></div>

                    <div class="icon">
                        <i class="bi bi-shield-lock-fill"></i>
                    </div>

                    <h5>
                        {{ __('home-features.secure_title') }}
                    </h5>

                    <p>
                        {{ __('home-features.secure_desc') }}
                    </p>

                </div>

            </div>

            {{-- Card 3 --}}
            <div class="col-lg-4 col-md-6">

                <div class="feature-card">

                    <span class="card-number">03</span>

                    <div class="card-light"></div>

                    <div class="icon">
                        <i class="bi bi-bullseye"></i>
                    </div>

                    <h5>
                        {{ __('home-features.accurate_title') }}
                    </h5>

                    <p>
                        {{ __('home-features.accurate_desc') }}
                    </p>

                </div>

            </div>

        </div>

    </div>

    <div class="features-divider"></div>

</section>
