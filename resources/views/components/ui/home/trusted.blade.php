{{-- ==========================================================
     CERTIFIED — HOME
     TRUSTED SECTION
     ==========================================================

     Purpose:
     ----------------------------------------------------------
     Displays platform trust indicators and trusted company
     logos inside an infinite horizontal slider.

     Content:
     - Trust metrics
     - Section title
     - Section description
     - Trusted company logos

     Localization:
     ----------------------------------------------------------
     Text is loaded using Laravel translation keys.

     Backend Integration:
     ----------------------------------------------------------
     NOT REQUIRED.

     The section contains static marketing/presentation data
     and does not depend on transactional database records.

     Assets:
     ----------------------------------------------------------
     Company logos:
         public/images/companies/

     Slider:
     ----------------------------------------------------------
     The company list is intentionally duplicated to create
     a seamless infinite scrolling animation.

     Do NOT remove the duplicated group unless the slider
     implementation is changed.

     JavaScript:
     ----------------------------------------------------------
     trusted.js handles:
     - Scroll reveal
     - Mouse-follow glow

     CSS:
     ----------------------------------------------------------
     trusted.css handles:
     - Layout
     - Background effects
     - Company cards
     - Infinite slider
     - Responsive behavior
     - Visual animations

     Status:
     CLOSED
     ========================================================== --}}
<!-- ==========================================================
     CERTIFIED — HOME
     TRUSTED SECTION
     Purpose:
     Showcase trusted partner/company logos and platform metrics.
     Backend Integration:
     Not required — content is static marketing data.
     ========================================================== -->

<section class="trusted-section">

    <div class="trusted-bg">

        <div class="bg-grid"></div>

        <span class="blob blob-left"></span>

        <span class="blob blob-right"></span>

        <div class="mouse-glow"></div>

    </div>

    <div class="container">

        <div class="section-header reveal-up">

            <span class="section-tag h3">
                {{ __('trusted.tag') }}
            </span>

            <div class="trust-meta reveal-up">

                <span>
                    <i class="fas fa-star"></i>
                    {{ __('trusted.rating') }}
                </span>

                <span class="divider"></span>

                <span>
                    <i class="fas fa-users"></i>
                    {{ __('trusted.learners') }}
                </span>

                <span class="divider"></span>

                <span>
                    <i class="fas fa-building"></i>
                    {{ __('trusted.partners') }}
                </span>

            </div>

            <h2>
                {{ __('trusted.title') }}
            </h2>

            <p>
                {{ __('trusted.subtitle') }}
            </p>

        </div>

        <div class="companies-slider">

            <div class="companies-track">

                <!-- المجموعة الأولى -->

                <div class="company-item">
                    <img src="{{ asset('images/companies/google.png') }}" alt="Google">
                </div>

                <div class="company-item">
                    <img src="{{ asset('images/companies/microsoft.png') }}" alt="Microsoft">
                </div>

                <div class="company-item">
                    <img src="{{ asset('images/companies/amazon.png') }}" alt="Amazon">
                </div>

                <div class="company-item">
                    <img src="{{ asset('images/companies/meta.png') }}" alt="Meta">
                </div>

                <div class="company-item">
                    <img src="{{ asset('images/companies/oracle.png') }}" alt="Oracle">
                </div>

                <div class="company-item">
                    <img src="{{ asset('images/companies/ibm.png') }}" alt="IBM">
                </div>

                <!--
                  Duplicate company group
                  Required for the seamless infinite slider loop.
                  Do not remove or modify independently from the first group.
                -->

                <div class="company-item">
                    <img src="{{ asset('images/companies/google.png') }}" alt="Google">
                </div>

                <div class="company-item">
                    <img src="{{ asset('images/companies/microsoft.png') }}" alt="Microsoft">
                </div>

                <div class="company-item">
                    <img src="{{ asset('images/companies/amazon.png') }}" alt="Amazon">
                </div>

                <div class="company-item">
                    <img src="{{ asset('images/companies/meta.png') }}" alt="Meta">
                </div>

                <div class="company-item">
                    <img src="{{ asset('images/companies/oracle.png') }}" alt="Oracle">
                </div>

                <div class="company-item">
                    <img src="{{ asset('images/companies/ibm.png') }}" alt="IBM">
                </div>

            </div>

        </div>

    </div>

</section>
<!-- End of Trusted Section -->
