


{{-- =========================================================
     CERTIFIED — TRUST STORY
     About Page / Trust Story Component
     ========================================================= --}}

<section
    class="trust-story"
    id="trust-story"
    aria-labelledby="trust-story-title"
>
 
    {{-- =====================================================
         BACKGROUND ATMOSPHERE
         ===================================================== --}}

    <div class="trust-story__atmosphere" aria-hidden="true">

        <div class="trust-story__gradient"></div>

        <div class="trust-story__separator">
            <span class="trust-story__separator-light"></span>
        </div>

        <span class="trust-story__star trust-story__star--1"></span>
        <span class="trust-story__star trust-story__star--2"></span>
        <span class="trust-story__star trust-story__star--3"></span>
        <span class="trust-story__star trust-story__star--4"></span>
        <span class="trust-story__star trust-story__star--5"></span>
        <span class="trust-story__star trust-story__star--6"></span>
        <span class="trust-story__star trust-story__star--7"></span>
        <span class="trust-story__star trust-story__star--8"></span>

        <span class="trust-story__orb trust-story__orb--1"></span>
        <span class="trust-story__orb trust-story__orb--2"></span>
        <span class="trust-story__orb trust-story__orb--3"></span>

    </div>


   <div class="trust-story__container">

        {{-- =====================================================
             LEFT — CONTENT
             ===================================================== --}}

        <div class="trust-story__content">

            <span class="trust-story__eyebrow">
                {{ __('about.trust_story.eyebrow') }}
            </span>

            <h2
                class="trust-story__heading"
                id="trust-story-title"
            >
                {{ __('about.trust_story.heading') }}
            </h2>

            <p class="trust-story__description">
                {{ __('about.trust_story.description') }}
            </p>

            <div class="trust-story__actions">

                <a
                    href="#explore"
                    class="trust-story__btn-primary"
                >
                    {{ __('about.trust_story.btn_primary') }}
                </a>

                <a
                    href="#how-it-works"
                    class="trust-story__btn-secondary"
                >
                    {{ __('about.trust_story.btn_secondary') }}
                </a>

            </div>

        </div>


        {{-- =====================================================
             RIGHT — VISUAL CERTIFICATE EXPERIENCE
             ===================================================== --}}

        <div
            class="trust-story__visual"
            aria-label="{{ __('about.trust_story.cert_title') }}"
        >

            {{-- =================================================
                 BACKGROUND NODE NETWORK
                 ================================================= --}}

            <svg
                class="trust-story__nodes"
                viewBox="0 0 500 500"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
            >

                <circle
                    cx="250"
                    cy="250"
                    r="180"
                    stroke="rgba(49, 151, 149, 0.2)"
                    stroke-dasharray="4 4"
                />

                <circle
                    cx="250"
                    cy="250"
                    r="220"
                    stroke="rgba(255, 255, 255, 0.05)"
                />

                <line
                    x1="250"
                    y1="30"
                    x2="250"
                    y2="470"
                    stroke="rgba(255, 255, 255, 0.04)"
                />

                <line
                    x1="30"
                    y1="250"
                    x2="470"
                    y2="250"
                    stroke="rgba(255, 255, 255, 0.04)"
                />

            </svg>


            {{-- =================================================
                 FLOATING VERIFICATION BADGES
                 ================================================= --}}

            <div
                class="trust-story__badge trust-story__badge--top-left"
            >

                <svg
                    class="trust-story__badge-icon"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                >

                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                    />

                </svg>

                <span>
                    {{ __('about.trust_story.badge_verified') }}
                </span>

            </div>


            <div
                class="trust-story__badge trust-story__badge--middle-left"
            >
                <span>
                    {{ __('about.trust_story.badge_cert_id') }}
                </span>
            </div>


            <div
                class="trust-story__badge trust-story__badge--bottom-left"
            >
                <span>
                    {{ __('about.trust_story.badge_secure') }}
                </span>
            </div>


            <div
                class="trust-story__badge trust-story__badge--top-right"
            >
                <span>
                    {{ __('about.trust_story.badge_authentic') }}
                </span>
            </div>


            <div
                class="trust-story__badge trust-story__badge--middle-right"
            >
                <span>
                    {{ __('about.trust_story.badge_sha') }}
                </span>
            </div>


            <div
                class="trust-story__badge trust-story__badge--bottom-right"
            >
                <span>
                    {{ __('about.trust_story.badge_qr') }}
                </span>
            </div>


            {{-- =================================================
                 DIGITAL CERTIFICATE
                 ================================================= --}}

            <article
                class="trust-story__certificate"
                aria-label="{{ __('about.trust_story.cert_title') }}"
            >

                <div class="trust-story__certificate-inner">


                    {{-- =========================================
                         CERTIFICATE HEADER
                         ========================================= --}}

                    <header>

                        <div
                            class="trust-story__certificate-shield"
                            aria-hidden="true"
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="currentColor"
                            >

                                <path
                                    d="M12 2L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-3zm-1 14l-4-4 1.41-1.41L11 13.17l6.59-6.59L19 8l-8 8z"
                                />

                            </svg>

                        </div>

                        <h3 class="trust-story__certificate-title">
                            {{ __('about.trust_story.cert_title') }}
                        </h3>

                        <p class="trust-story__certificate-subtitle">
                            {{ __('about.trust_story.cert_subtitle') }}
                        </p>

                    </header>


                    {{-- =========================================
                         RECIPIENT
                         ========================================= --}}

                    <div class="trust-story__recipient">

                        <span class="trust-story__recipient-label">
                            {{ __('about.trust_story.cert_recipient') }}
                        </span>

                        <h4 class="trust-story__recipient-name">
                            {{ __('about.trust_story.cert_name') }}
                        </h4>

                        <p class="trust-story__achievement">
                            {{ __('about.trust_story.cert_achievement') }}
                        </p>

                    </div>


                    {{-- =========================================
                         CERTIFICATE DETAILS
                         ========================================= --}}

                    <div class="trust-story__details">


                        {{-- Certificate ID --}}

                        <div class="trust-story__detail">

                            <span class="trust-story__detail-label">
                                {{ __('about.trust_story.cert_lbl_id') }}
                            </span>

                            <span class="trust-story__detail-value">
                                20100000530978
                            </span>

                        </div>


                        {{-- Issue Date --}}

                        <div class="trust-story__detail">

                            <span class="trust-story__detail-label">
                                {{ __('about.trust_story.cert_lbl_issued') }}
                            </span>

                            <span class="trust-story__detail-value">
                                22/07/2020
                            </span>

                        </div>


                        {{-- Expiry Date --}}

                        <div class="trust-story__detail">

                            <span class="trust-story__detail-label">
                                {{ __('about.trust_story.cert_lbl_expiry') }}
                            </span>

                            <span class="trust-story__detail-value">
                                June 26, 2024
                            </span>

                        </div>

                    </div>


                    {{-- =========================================
                         CERTIFICATE FOOTER
                         ========================================= --}}

                    <footer class="trust-story__certificate-footer">


                        {{-- Digital Signature --}}

                        <div class="trust-story__signature-block">

                            <div
                                class="trust-story__signature"
                                aria-hidden="true"
                            >
                                Joneth
                            </div>

                            <span class="trust-story__signature-label">
                                {{ __('about.trust_story.cert_lbl_sig') }}
                            </span>

                        </div>


                        {{-- QR Verification --}}

                        <div
                            class="trust-story__qr"
                            aria-label="{{ __('about.trust_story.badge_qr') }}"
                        >

                            <svg
                                viewBox="0 0 100 100"
                                class="trust-story__qr-svg"
                                aria-hidden="true"
                            >

                                <path
                                    fill="#000"
                                    d="
                                        M0 0h30v30H0z
                                        M40 0h10v10H40z
                                        M60 0h10v10H60z
                                        M70 0h30v30H70z
                                        M10 10h10v10H10z
                                        M80 10h10v10H80z
                                        M0 40h10v10H0z
                                        M20 40h20v10H20z
                                        M50 40h10v10H50z
                                        M70 40h10v10H70z
                                        M0 60h10v10H0z
                                        M30 60h10v10H30z
                                        M50 60h20v10H50z
                                        M80 60h20v10H80z
                                        M0 70h30v30H0z
                                        M40 70h20v10H40z
                                        M70 70h10v10H70z
                                        M90 70h10v10H90z
                                        M10 80h10v10H10z
                                        M50 80h10v10H50z
                                        M80 80h20v10H80z
                                    "
                                />

                            </svg>

                        </div>


                        {{-- Security Indicator --}}

                        <div class="trust-story__security-block">

                            <span
                                class="trust-story__signature-script"
                                aria-hidden="true"
                            >
                                Digital Signature
                            </span>

                            <span class="trust-story__signature-label">
                                {{ __('about.trust_story.cert_lbl_sec') }}
                            </span>

                        </div>

                    </footer>

                </div>

            </article>

        </div>

    </div>

</section>