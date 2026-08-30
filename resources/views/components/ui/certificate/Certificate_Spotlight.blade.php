{{-- =====================================================================
#
#                    CERTIFICATE SPOTLIGHT
#
#====================================================================== --}}

<section class="cert-spotlight" id="certificate-spotlight">

    {{-- ================================================================
         Mouse Glow
    ================================================================= --}}

    <span class="cert-spotlight__mouse-glow" aria-hidden="true">
    </span>

    {{-- ================================================================
         Background / Atmospheric Layer
    ================================================================= --}}

    <div class="cert-spotlight__background" aria-hidden="true"> 

        {{-- Stars --}}
        <div class="cert-spotlight__stars">

            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>
            <span class="cert-spotlight__star"></span>

        </div>

        {{-- Grid --}}
        <div class="cert-spotlight__grid"></div>

        {{-- Aurora --}}
        <div class="cert-spotlight__aurora cert-spotlight__aurora--1"></div>
        <div class="cert-spotlight__aurora cert-spotlight__aurora--2"></div>

        {{-- Floating Orbs --}}
        <div class="cert-spotlight__orb cert-spotlight__orb--1"></div>
        <div class="cert-spotlight__orb cert-spotlight__orb--2"></div>

        {{-- Particles --}}
        <div class="cert-spotlight__particles">

            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>

        </div>

    </div>



    {{-- ================================================================
         Main Container
    ================================================================= --}}

    <div class="container cert-spotlight__container">

        <div class="cert-spotlight__card">


            {{-- ========================================================
                 Decorative Corners
            ========================================================= --}}

            <span class="cert-spotlight__corner cert-spotlight__corner--tl" aria-hidden="true">
            </span>

            <span class="cert-spotlight__corner cert-spotlight__corner--tr" aria-hidden="true">
            </span>

            <span class="cert-spotlight__corner cert-spotlight__corner--bl" aria-hidden="true">
            </span>

            <span class="cert-spotlight__corner cert-spotlight__corner--br" aria-hidden="true">
            </span>


            {{-- Animated Scan Line --}}

            <span class="cert-spotlight__scan" aria-hidden="true">
            </span>


            {{-- ========================================================
                 LEFT CONTENT
            ========================================================= --}}

            <div class="cert-spotlight__content">


                {{-- ----------------------------------------------------
                     Badge
                ----------------------------------------------------- --}}

                <div class="cert-spotlight__badge">

                    <span class="cert-spotlight__badge-icon">

                        <i class="fa-solid fa-shield-halved" aria-hidden="true">
                        </i>

                    </span>

                    <span>
                        {{ __('certificates.spotlight.badge') }}
                    </span>

                </div>


                {{-- ----------------------------------------------------
                     Main Heading
                ----------------------------------------------------- --}}

                <h2 class="cert-spotlight__title">

                    <span class="cert-spotlight__title-line">
                        {{ __('certificates.spotlight.title_1') }}
                    </span>

                    <span class="cert-spotlight__title-line">
                        {{ __('certificates.spotlight.title_2') }}
                    </span>

                </h2>


                {{-- ----------------------------------------------------
                     Description
                ----------------------------------------------------- --}}

                <p class="cert-spotlight__description">
                    {{ __('certificates.spotlight.description') }}
                </p>


                {{-- ====================================================
                     CTA Buttons
                ===================================================== --}}

                <div class="cert-spotlight__actions">


                    {{-- Primary Button --}}

                    <a href="{{ url('/courses') }}" class="cert-spotlight__button cert-spotlight__button--primary">

                        <span class="cert-spotlight__button-icon">

                            <i class="fa-solid fa-graduation-cap" aria-hidden="true">
                            </i>

                        </span>

                        <span class="cert-spotlight__button-text">
                            {{ __('certificates.spotlight.primary_btn') }}
                        </span>

                        <i class="fa-solid fa-arrow-right cert-spotlight__button-arrow" aria-hidden="true">
                        </i>

                    </a>


                    {{-- Secondary Button --}}

                    <a href="#certificate-trust" class="cert-spotlight__button cert-spotlight__button--secondary">

                        <span class="cert-spotlight__button-icon">

                            <i class="fa-solid fa-shield-halved" aria-hidden="true">
                            </i>

                        </span>

                        <span class="cert-spotlight__button-text">
                            {{ __('certificates.spotlight.secondary_btn') }}
                        </span>

                    </a>

                </div>


                {{-- ====================================================
                     Trust Indicators
                ===================================================== --}}

                <div class="cert-spotlight__trust">


                    {{-- Verified --}}

                    <div class="cert-spotlight__trust-item">

                        <span class="cert-spotlight__trust-icon">

                            <i class="fa-solid fa-circle-check" aria-hidden="true">
                            </i>

                        </span>

                        <div class="cert-spotlight__trust-content">

                            <strong>
                                {{ __('certificates.spotlight.trust.verified_title') }}
                            </strong>

                            <span>
                                {{ __('certificates.spotlight.trust.verified_text') }}
                            </span>

                        </div>

                    </div>


                    <span class="cert-spotlight__trust-separator" aria-hidden="true">
                    </span>


                    {{-- Secure --}}

                    <div class="cert-spotlight__trust-item">

                        <span class="cert-spotlight__trust-icon">

                            <i class="fa-solid fa-lock" aria-hidden="true">
                            </i>

                        </span>

                        <div class="cert-spotlight__trust-content">

                            <strong>
                                {{ __('certificates.spotlight.trust.secure_title') }}
                            </strong>

                            <span>
                                {{ __('certificates.spotlight.trust.secure_text') }}
                            </span>

                        </div>

                    </div>


                    <span class="cert-spotlight__trust-separator" aria-hidden="true">
                    </span>


                    {{-- Instant --}}

                    <div class="cert-spotlight__trust-item">

                        <span class="cert-spotlight__trust-icon">

                            <i class="fa-solid fa-bolt" aria-hidden="true">
                            </i>

                        </span>

                        <div class="cert-spotlight__trust-content">

                            <strong>
                                {{ __('certificates.spotlight.trust.instant_title') }}
                            </strong>

                            <span>
                                {{ __('certificates.spotlight.trust.instant_text') }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================================
                 RIGHT VISUAL
            ========================================================= --}}

            <div class="cert-spotlight__visual" aria-hidden="true">


                {{-- ----------------------------------------------------
                     Energy Rings
                ----------------------------------------------------- --}}

                <div class="cert-spotlight__visual-ring cert-spotlight__visual-ring--1"></div>

                <div class="cert-spotlight__visual-ring cert-spotlight__visual-ring--2"></div>

                <div class="cert-spotlight__visual-ring cert-spotlight__visual-ring--3"></div>


                {{-- ----------------------------------------------------
                     Main Certificate
                ----------------------------------------------------- --}}

                <div class="cert-spotlight__certificate">


                    {{-- Certificate Glow --}}

                    <div class="cert-spotlight__certificate-glow"></div>


                    {{-- Certificate Header --}}

                    <div class="cert-spotlight__certificate-header">

                        <span class="cert-spotlight__certificate-logo">

                            <i class="fa-solid fa-graduation-cap" aria-hidden="true">
                            </i>

                        </span>

                        <div class="cert-spotlight__certificate-brand">

                            <strong>
                                {{ __('certificates.spotlight.badge') }}
                            </strong>

                            <small>
                               {{ __('certificates.spotlight.eyebrow') }}
                            </small>

                        </div>

                    </div>


                    {{-- Certificate Body --}}

                    <div class="cert-spotlight__certificate-body">

                        <span>
                            {{ __('certificates.spotlight.title') }}
                        </span>

                        <strong>
                           {{ __('certificates.spotlight.achievement') }}
                        </strong>

                        <div class="cert-spotlight__certificate-line"></div>

                        <div class="cert-spotlight__certificate-emblem">

                            <i class="fa-solid fa-award" aria-hidden="true">
                            </i>

                        </div>

                    </div>


                    {{-- Certificate Footer --}}

                    <div class="cert-spotlight__certificate-footer">

                        <span>

                            <i class="fa-solid fa-fingerprint" aria-hidden="true">
                            </i>

                            {{ __('certificates.spotlight.secure_id') }}

                        </span>

                        <span>

                            <i class="fa-solid fa-shield-halved" aria-hidden="true">
                            </i>

                         {{ __('certificates.spotlight.verified') }}

                        </span>

                    </div>

                </div>


                {{-- ====================================================
                     Floating Verified Badge
                ===================================================== --}}

                <div class="cert-spotlight__floating cert-spotlight__floating--top">

                    <span class="cert-spotlight__floating-icon">

                        <i class="fa-solid fa-shield-halved" aria-hidden="true">
                        </i>

                    </span>

                    <div class="cert-spotlight__floating-content">

                        <strong>
                           {{ __('certificates.spotlight.verified') }}
                        </strong>

                        <small>
                         {{ __('certificates.spotlight.authentic') }}
                        </small>

                    </div>

                </div>


                {{-- ====================================================
                     Floating QR Badge
                ===================================================== --}}

                <div class="cert-spotlight__floating cert-spotlight__floating--bottom">

                    <span class="cert-spotlight__floating-icon">

                        <i class="fa-solid fa-qrcode" aria-hidden="true">
                        </i>

                    </span>

                    <div class="cert-spotlight__floating-content">

                        <strong>
                           {{ __('certificates.spotlight.instant') }}
                        </strong>

                        <small>
                         {{ __('certificates.spotlight.qr_verification') }}
                        </small>

                    </div>

                </div>

            </div>

        </div>


        {{-- ================================================================
             Bottom Decorative Line
        ================================================================= --}}

        <div class="cert-spotlight__footer-line" aria-hidden="true">

            <span></span>
            <span></span>
            <span></span>

        </div>

    </div>

</section>
