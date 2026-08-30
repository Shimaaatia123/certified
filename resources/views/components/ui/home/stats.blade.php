{{-- =========================================================
     STATS SECTION
     ---------------------------------------------------------
     Purpose:
     Displays the main platform statistics using four
     responsive statistic cards.

     Data Source:
     Static marketing values.

     Backend Integration:
     Not required.

     Localization:
     All visible text is retrieved from Laravel translation
     files through the `stats.*` translation keys.
========================================================= --}}

<section class="stats-section py-5">

    {{-- =====================================================
         DECORATIVE BACKGROUND
         -----------------------------------------------------
         Contains the visual background effects of the section:
         - Grid
         - Animated blobs
         - Floating circles
         - Mouse-follow glow
    ====================================================== --}}
    <div class="stats-bg">

        {{-- Background grid --}}
        <div class="bg-grid"></div>

        {{-- Decorative animated blobs --}}
        <span class="bg-blob blob-1"></span>
        <span class="bg-blob blob-2"></span>

        {{-- Decorative floating circles --}}
        <span class="floating-circle circle-1"></span>
        <span class="floating-circle circle-2"></span>
        <span class="floating-circle circle-3"></span>

        {{-- Mouse-follow visual effect --}}
        <div class="mouse-glow"></div>

    </div>


    <div class="container">

        {{-- =================================================
             SECTION HEADER
             -------------------------------------------------
             Contains:
             - Section badge
             - Main title
             - Supporting subtitle
        ================================================== --}}
        <div class="stats-header text-center reveal-up">

            {{-- Section badge --}}
            <span class="stats-badge">

                <i class="fas fa-shield-alt"></i>

                {{ __('stats.badge') }}

            </span>


            {{-- Section title --}}
            <h2 class="stats-title">

                {{ __('stats.title') }}

            </h2>


            {{-- Section description --}}
            <p class="section-subtitle">

                {{ __('stats.subtitle') }}

            </p>

        </div>


        {{-- =================================================
             STATISTICS GRID
             -------------------------------------------------
             Bootstrap grid:
             - 4 columns on large screens
             - 2 columns on medium screens
             - Responsive stacking on smaller screens
        ================================================== --}}
        <div class="row text-center g-4 g-lg-5">


            {{-- =================================================
                 STAT 01 — ACTIVE USERS
            ================================================== --}}
            <div class="col-lg-3 col-md-6 reveal-up">

                <div class="stat-box">

                    {{-- Statistic icon --}}
                    {{-- Active Users --}}
                    <div class="stat-icon stat-icon-users" aria-hidden="true">
                        <span class="user-head user-head-main"></span>
                        <span class="user-body user-body-main"></span>
                        <span class="user-head user-head-secondary"></span>
                        <span class="user-body user-body-secondary"></span>
                    </div>


                    {{-- Animated counter --}}
                    <h2 class="counter" data-target="12000" data-suffix="K+">

                        0

                    </h2>


                    {{-- Statistic title --}}
                    <h5>

                        {{ __('stats.active_users') }}

                    </h5>


                    {{-- Statistic description --}}
                    <p>

                        {{ __('stats.active_users_desc') }}

                    </p>

                </div>

            </div>


            {{-- =================================================
                 STAT 02 — CERTIFICATES
            ================================================== --}}
            <div class="col-lg-3 col-md-6 reveal-up delay-1">

                <div class="stat-box">

                    {{-- Statistic icon --}}
                    <div class="stat-icon stat-icon-certificate" aria-hidden="true">
                        <span class="certificate-ring"></span>
                        <span class="certificate-center"></span>
                        <span class="certificate-ribbon certificate-ribbon-left"></span>
                        <span class="certificate-ribbon certificate-ribbon-right"></span>
                    </div>


                    {{-- Animated counter --}}
                    <h2 class="counter" data-target="8500" data-suffix="K+">

                        0

                    </h2>


                    {{-- Statistic title --}}
                    <h5>

                        {{ __('stats.certificates') }}

                    </h5>


                    {{-- Statistic description --}}
                    <p>

                        {{ __('stats.certificates_desc') }}

                    </p>

                </div>

            </div>


            {{-- =================================================
                 STAT 03 — SUCCESS RATE
            ================================================== --}}
            <div class="col-lg-3 col-md-6 reveal-up delay-2">

                <div class="stat-box">

                    {{-- Statistic icon --}}
                    <div class="stat-icon stat-icon-success" aria-hidden="true">
                        <span class="success-star">★</span>
                    </div>


                    {{-- Animated counter --}}
                    <h2 class="counter" data-target="99" data-suffix="%">

                        0

                    </h2>


                    {{-- Statistic title --}}
                    <h5>

                        {{ __('stats.success_rate') }}

                    </h5>


                    {{-- Statistic description --}}
                    <p>

                        {{ __('stats.success_rate_desc') }}

                    </p>

                </div>

            </div>


            {{-- =================================================
                 STAT 04 — YEARS OF EXPERIENCE
            ================================================== --}}
            <div class="col-lg-3 col-md-6 reveal-up delay-3">

                <div class="stat-box">

                    {{-- Statistic icon --}}
                    <div class="stat-icon stat-icon-award" aria-hidden="true">
                        <span class="award-medal"></span>
                        <span class="award-ribbon award-ribbon-left"></span>
                        <span class="award-ribbon award-ribbon-right"></span>
                    </div>


                    {{-- Animated counter --}}
                    <h2 class="counter" data-target="5" data-suffix="+">

                        0

                    </h2>


                    {{-- Statistic title --}}
                    <h5>

                        {{ __('stats.years_experience') }}

                    </h5>


                    {{-- Statistic description --}}
                    <p>

                        {{ __('stats.years_experience_desc') }}

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
