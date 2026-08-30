{{-- ==========================================================
     CERTIFIED — HOME
     ABOUT SECTION
     ==========================================================

     Purpose:
     ----------------------------------------------------------
     Introduces the Certified learning platform and presents
     its main educational benefits.

     Content:
     ----------------------------------------------------------
     - Section badge
     - About title
     - Platform description
     - Three key features
     - About visual
     - Course statistic
     - Student statistic

     Data Source:
     ----------------------------------------------------------
     Static presentation content.

     Localization:
     ----------------------------------------------------------
     All user-facing text is loaded through Laravel
     translation keys using the home-about translation group.

     Example:
         {{ __('home-about.badge') }}
         {{ __('home-about.title') }}
         {{ __('home-about.description') }}

     Backend Integration:
     ----------------------------------------------------------
     NOT REQUIRED.

     The current statistics and feature descriptions are
     marketing content and are not derived from transactional
     database records.

     Assets:
     ----------------------------------------------------------
     About image:
         public/images/about/about.png

     Frontend Behavior:
     ----------------------------------------------------------
     JavaScript provides:
     - Scroll reveal
     - Staggered feature reveal
     - Mouse-based image parallax

     CSS provides:
     - Floating cards
     - Decorative orbs
     - Image shine
     - Image floating animation
     - Premium section divider
     - Responsive behavior

     Maintenance:
     ----------------------------------------------------------
     Floating cards and their duplicated visual statistics
     should remain frontend-only unless these values are
     intentionally connected to real platform statistics.

     Status:
     CLOSED
     ========================================================== --}}
<section class="about-section ">
    <div class="container py-5">
        <div class="row align-items-center">

            <!-- Left Content -->
            <div class="col-md-6">
                <span class="section-badge ">

                    <i class="fas fa-graduation-cap"></i>

                    {{ __('home-about.badge') }} 

                </span>

                <h2 class="section-title">
                    {{ __('home-about.title') }}
                </h2>

                <p class="section-description">
                    {{ __('home-about.description') }}
                </p>

                <div class="about-features">

                    <div class="feature-item">

                        <i class="fas fa-check-circle"></i>

                        <span>{{ __('home-about.feature_1') }}</span>

                    </div>

                    <div class="feature-item">

                        <i class="fas fa-check-circle"></i>

                        <span>{{ __('home-about.feature_2') }}</span>

                    </div>

                    <div class="feature-item">

                        <i class="fas fa-check-circle"></i>

                        <span>{{ __('home-about.feature_3') }}</span>

                    </div>

                </div>
            </div>

            <!-- Right Image -->
            <div class="col-lg-6 text-center">

                <div class="about-image-wrapper">

                    <span class="about-orb orb-1"></span>
                    <span class="about-orb orb-2"></span>

                    <!-- Floating Card 1 -->
                    <div class="floating-card floating-card-top">

                        <i class="fas fa-graduation-cap"></i>

                        <div>
                            <strong>50+</strong>
                            <span>{{ __('home-about.Courses') }}</span>
                        </div>

                    </div>

                    <!-- Floating Card 2 -->
                    <div class="floating-card floating-card-bottom">

                        <i class="fas fa-user-graduate"></i>

                        <div>
                            <strong>12K+</strong>
                            <span>{{ __('home-about.Students') }}</span>
                        </div>

                    </div>

                    <img src="{{ asset('images/about/about.png') }}" alt="About image" class="img-fluid about-image">

                </div>

            </div>

        </div>
    </div>
    <div class="section-divider"></div>
</section>
