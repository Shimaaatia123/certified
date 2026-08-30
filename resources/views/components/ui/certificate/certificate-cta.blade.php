{{-- =====================================================================
#
#                    CERTIFICATE CTA
#
#====================================================================== --}}

<section class="cert-cta" id="certificate-cta">

    {{-- ==========================================================
 Premium Star Field
========================================================== --}}

    <div class="cert-cta__stars" aria-hidden="true">

        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>
        <span class="cert-cta__star"></span>

    </div>

    {{-- ==========================================================
 Mouse Glow
========================================================== --}}

    <span class="cert-cta__mouse-glow" aria-hidden="true"></span>
    {{-- ==========================================================
         Background System
    =========================================================== --}}

    <div class="cert-cta__background" aria-hidden="true">


        <div class="cert-cta__grid"></div>

        <div class="cert-cta__aurora cert-cta__aurora--1"></div>
        <div class="cert-cta__aurora cert-cta__aurora--2"></div>

        <div class="cert-cta__orb cert-cta__orb--1"></div>
        <div class="cert-cta__orb cert-cta__orb--2"></div>

        <div class="cert-cta__particles">
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


    {{-- ==========================================================
         Main Container
    =========================================================== --}}

    <div class="container cert-cta__container">

        <div class="cert-cta__card">

            {{-- ======================================================
                 Decorative Elements
            ======================================================= --}}

            <span class="cert-cta__corner cert-cta__corner--tl"></span>
            <span class="cert-cta__corner cert-cta__corner--tr"></span>
            <span class="cert-cta__corner cert-cta__corner--bl"></span>
            <span class="cert-cta__corner cert-cta__corner--br"></span>

            <span class="cert-cta__scan"></span>

            {{-- ======================================================
                 Left Content
            ======================================================= --}}

            <div class="cert-cta__content">

                <span class="cert-cta__badge">
                    <span class="cert-cta__badge-dot"></span>

                    {{ __('certificates.cta.badge') }}
                </span>


                <h2 class="cert-cta__title">

                    {{ __('certificates.cta.title_1') }}

                    <span>
                        {{ __('certificates.cta.title_2') }}
                    </span>

                </h2>


                <p class="cert-cta__description">
                    {{ __('certificates.cta.description') }}
                </p>


                {{-- ==================================================
                     Actions
                =================================================== --}}

                <div class="cert-cta__actions">

                    <a href="{{ url('/courses') }}" class="cert-cta__button cert-cta__button--primary">
                        <i class="fa-solid fa-graduation-cap" aria-hidden="true"></i>

                        <span>
                            {{ __('certificates.cta.primary_btn') }}
                        </span>

                        <i class="fa-solid fa-arrow-right cert-cta__button-arrow" aria-hidden="true"></i>
                    </a>


                    <a href="#certificate-trust" class="cert-cta__button cert-cta__button--secondary">
                        <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>

                        <span>
                            {{ __('certificates.cta.secondary_btn') }}
                        </span>
                    </a>

                </div>


                {{-- ==================================================
                     Trust Indicators
                =================================================== --}}

                <div class="cert-cta__trust">

                    <div class="cert-cta__trust-item">

                        <span class="cert-cta__trust-icon">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                        </span>

                        <span>
                            {{ __('certificates.cta.trust.verified') }}
                        </span>

                    </div>


                    <span class="cert-cta__trust-separator"></span>


                    <div class="cert-cta__trust-item">

                        <span class="cert-cta__trust-icon">
                            <i class="fa-solid fa-lock" aria-hidden="true"></i>
                        </span>

                        <span>
                            {{ __('certificates.cta.trust.secure') }}
                        </span>

                    </div>


                    <span class="cert-cta__trust-separator"></span>


                    <div class="cert-cta__trust-item">

                        <span class="cert-cta__trust-icon">
                            <i class="fa-solid fa-bolt" aria-hidden="true"></i>
                        </span>

                        <span>
                            {{ __('certificates.cta.trust.instant') }}
                        </span>

                    </div>

                </div>

            </div>


            {{-- ======================================================
                 Right Visual
            ======================================================= --}}

            <div class="cert-cta__visual" aria-hidden="true">

                <div class="cert-cta__visual-ring cert-cta__visual-ring--1"></div>
                <div class="cert-cta__visual-ring cert-cta__visual-ring--2"></div>
                <div class="cert-cta__visual-ring cert-cta__visual-ring--3"></div>


                <div class="cert-cta__certificate">

                    <div class="cert-cta__certificate-glow"></div>

                    <div class="cert-cta__certificate-header">

                        <span class="cert-cta__certificate-logo">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>

                        <div>
                            <strong>
                                {{ __('certificates.cta.visual.brand') }}
                            </strong>

                            <small>
                                {{ __('certificates.cta.visual.credential') }}
                            </small>
                        </div>

                    </div>


                    <div class="cert-cta__certificate-body">

                        <span>
                            {{ __('certificates.cta.visual.verified_certificate') }}
                        </span>

                        <strong>
                            {{ __('certificates.cta.visual.achievement') }}
                        </strong>

                        <div class="cert-cta__certificate-line"></div>

                    </div>


                    <div class="cert-cta__certificate-footer">

                        <span>
                            <i class="fa-solid fa-fingerprint"></i>

                            {{ __('certificates.cta.visual.secure_id') }}
                        </span>

                        <span>
                            <i class="fa-solid fa-shield-halved"></i>

                            {{ __('certificates.cta.visual.verified') }}
                        </span>

                    </div>
                    <div class="cert-cta__floating cert-cta__floating--top">

                        <span>
                            <i class="fa-solid fa-shield-halved"></i>
                        </span>

                        <div>
                            <strong>
                                {{ __('certificates.cta.visual.verified') }}
                            </strong>

                            <small>
                                {{ __('certificates.cta.visual.authentic') }}
                            </small>
                        </div>

                    </div>
                    <div class="cert-cta__floating cert-cta__floating--bottom">

                        <span>
                            <i class="fa-solid fa-qrcode"></i>
                        </span>

                        <div>
                            <strong>
                                {{ __('certificates.cta.visual.instant') }}
                            </strong>

                            <small>
                                {{ __('certificates.cta.visual.qr_verification') }}
                            </small>
                        </div>

                    </div>


                    {{-- ==========================================================
             Footer Decoration
        =========================================================== --}}

                    <div class="cert-cta__footer-line" aria-hidden="true">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                </div>

</section>
