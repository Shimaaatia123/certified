<!--===================================================================

    CERTIFICATE VERIFICATION JOURNEY

    Purpose:
    Displays the complete certificate verification workflow
    from generation to final verification.

    Structure:

    01. Divider 
    02. Background Layers
    03. Section Header
    04. Verification Pipeline
    05. Verification Cards
    06. Footer Decoration

====================================================================-->

<section class="cert-journey" id="certificate-journey">

    <div class="cert-journey__divider"></div>

    <!-- ======================================================
        Background Layers
    ======================================================= -->

    <div class="cert-journey__background" aria-hidden="true">

        <div class="cert-journey__grid"></div>

        <div class="cert-journey__aurora"></div>

        <div class="cert-journey__blur cert-journey__blur--1"></div>
        <div class="cert-journey__blur cert-journey__blur--2"></div>

        <div class="cert-journey__mouse-glow"></div>

        <div class="cert-journey__particles">

            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>
            <span class="cert-journey__star"></span>

            <span class="cert-journey__sparkle"></span>
            <span class="cert-journey__sparkle"></span>
            <span class="cert-journey__sparkle"></span>
            <span class="cert-journey__sparkle"></span>
            <span class="cert-journey__sparkle"></span>
            <span class="cert-journey__sparkle"></span>


        </div>

    </div>

    <div class="container cert-journey__container">

        <!-- ======================================================
            Section Header
        ======================================================= -->

        <header class="cert-journey__header">

            <span class="cert-journey__eyebrow">

                <i class="fas fa-shield-halved" aria-hidden="true"></i>

                {{ __('certificates.hero.journey_badge') }}

            </span>

            <h2 class="cert-journey__title">

                {{ __('certificates.hero.journey_title') }}

            </h2>

            <p class="cert-journey__description">

                {{ __('certificates.hero.journey_description') }}

            </p>

        </header>

        <!-- ======================================================
            Verification Pipeline
        ======================================================= -->

        <div class="cert-journey__pipeline" role="list">



            <!-- ======================================================
                Step 01
            ======================================================= -->

            <article class="cert-journey__card cert-reveal" role="listitem" data-step="1">

                <span class="cert-journey__number">

                    01

                </span>

                <div class="cert-journey__connector">

                    <span class="cert-journey__connector-line"></span>

                    <span class="cert-journey__connector-glow"></span>

                </div>

                <div class="cert-journey__icon">

                    <div class="cert-journey__icon-ring"></div>

                    <i class="fas fa-file-circle-check" aria-hidden="true"></i>

                </div>

                <h3 class="cert-journey__card-title">

                    {{ __('certificates.hero.journey_step_1_title') }}

                </h3>

                <p class="cert-journey__card-description">

                    {{ __('certificates.hero.journey_step_1_description') }}

                </p>

            </article>

            <!-- ======================================================
                Step 02
            ======================================================= -->

            <article class="cert-journey__card cert-reveal" role="listitem" data-step="2">

                <span class="cert-journey__number">

                    02

                </span>

                <div class="cert-journey__connector">

                    <span class="cert-journey__connector-line"></span>

                    <span class="cert-journey__connector-glow"></span>

                </div>

                <div class="cert-journey__icon">

                    <div class="cert-journey__icon-ring"></div>

                    <i class="fas fa-user-shield" aria-hidden="true"></i>

                </div>

                <h3 class="cert-journey__card-title">

                    {{ __('certificates.hero.journey_step_2_title') }}

                </h3>

                <p class="cert-journey__card-description">

                    {{ __('certificates.hero.journey_step_2_description') }}

                </p>

            </article>

            <!-- ======================================================
                Step 03
            ======================================================= -->

            <article class="cert-journey__card cert-reveal" role="listitem" data-step="3">

                <span class="cert-journey__number">

                    03

                </span>

                <div class="cert-journey__connector">

                    <span class="cert-journey__connector-line"></span>

                    <span class="cert-journey__connector-glow"></span>

                </div>

                <div class="cert-journey__icon">

                    <div class="cert-journey__icon-ring"></div>

                    <i class="fas fa-signature" aria-hidden="true"></i>

                </div>

                <h3 class="cert-journey__card-title">

                    {{ __('certificates.hero.journey_step_3_title') }}

                </h3>

                <p class="cert-journey__card-description">

                    {{ __('certificates.hero.journey_step_3_description') }}

                </p>

            </article>

            <!-- ======================================================
                Step 04
            ======================================================= -->

            <article class="cert-journey__card cert-reveal" role="listitem" data-step="4">

                <span class="cert-journey__number">

                    04

                </span>

                <div class="cert-journey__connector">

                    <span class="cert-journey__connector-line"></span>

                    <span class="cert-journey__connector-glow"></span>

                </div>

                <div class="cert-journey__icon">

                    <div class="cert-journey__icon-ring"></div>

                    <i class="fas fa-database" aria-hidden="true"></i>

                </div>

                <h3 class="cert-journey__card-title">

                    {{ __('certificates.hero.journey_step_4_title') }}

                </h3>

                <p class="cert-journey__card-description">

                    {{ __('certificates.hero.journey_step_4_description') }}

                </p>

            </article>

            <!-- ======================================================
                Step 05
            ======================================================= -->

            <article class="cert-journey__card cert-reveal" role="listitem" data-step="5">

                <span class="cert-journey__number">

                    05

                </span>

                <div class="cert-journey__connector">

                    <span class="cert-journey__connector-line"></span>

                    <span class="cert-journey__connector-glow"></span>

                </div>

                <div class="cert-journey__icon">

                    <div class="cert-journey__icon-ring"></div>

                    <i class="fas fa-qrcode" aria-hidden="true"></i>

                </div>

                <h3 class="cert-journey__card-title">

                    {{ __('certificates.hero.journey_step_5_title') }}

                </h3>

                <p class="cert-journey__card-description">

                    {{ __('certificates.hero.journey_step_5_description') }}

                </p>

            </article>

            <!-- ======================================================
                Step 06
            ======================================================= -->

            <article class="cert-journey__card cert-journey__card--highlight cert-reveal" role="listitem" data-step="6">

                <span class="cert-journey__number">

                    06

                </span>

                <div class="cert-journey__icon">

                    <div class="cert-journey__icon-ring"></div>

                    <i class="fas fa-circle-check" aria-hidden="true"></i>

                </div>

                <h3 class="cert-journey__card-title">

                    {{ __('certificates.hero.journey_step_6_title') }}

                </h3>

                <p class="cert-journey__card-description">

                    {{ __('certificates.hero.journey_step_6_description') }}

                </p>

                <div class="cert-journey__status" role="status" aria-live="polite">

                    <span class="cert-journey__status-dot"></span>

                    <span class="cert-journey__status-text">

                        {{ __('certificates.hero.journey_verified_status') }}

                    </span>

                </div>

            </article>

        </div>

        <!-- ======================================================
            Footer Decoration
        ======================================================= -->

        <div class="cert-journey__footer-decoration" aria-hidden="true">

            <span></span>
            <span></span>
            <span></span>

        </div>

    </div>

    <div class="cert-journey__noise" aria-hidden="true"></div>

</section>
