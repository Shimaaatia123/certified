{{-- =========================================================
     CERTIFIED — VERIFICATION INTELLIGENCE
     Section 4 — Digital Verification Control Center
     ========================================================= --}}

<section
    class="verification-intelligence"
    id="verification-intelligence"
    aria-labelledby="verification-intelligence-title"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
>

    {{-- =====================================================
         BACKGROUND SYSTEM
         ===================================================== --}}

    <div
        class="verification-intelligence__background"
        aria-hidden="true"
    >
        <div class="verification-intelligence__grid"></div>

        <div class="verification-intelligence__orb verification-intelligence__orb--one"></div>
        <div class="verification-intelligence__orb verification-intelligence__orb--two"></div>

        <div class="verification-intelligence__particles">
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


    <div class="verification-intelligence__container">

        {{-- =================================================
             HEADER
             ================================================= --}}

        <header class="verification-intelligence__header">

            <span class="verification-intelligence__eyebrow">
                <span class="verification-intelligence__eyebrow-dot"></span>

                {{ __('about.verification_intelligence.eyebrow') }}
            </span>


            <h2
                class="verification-intelligence__title"
                id="verification-intelligence-title"
            >
                {{ __('about.verification_intelligence.title_line_one') }}

                <span>
                    {{ __('about.verification_intelligence.title_line_two') }}
                </span>
            </h2>


            <p class="verification-intelligence__description">
                {{ __('about.verification_intelligence.description') }}
            </p>

        </header>


        {{-- =================================================
             VERIFICATION CONTROL CENTER
             ================================================= --}}

        <div class="verification-intelligence__stage">

            {{-- =================================================
                 SECURITY NODE — TOP LEFT
                 ================================================= --}}

            <article
                class="verification-intelligence__node verification-intelligence__node--top-left"
                data-node="signature"
            >

                <span class="verification-intelligence__node-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M4 17.5c2.8-2.4 5.1-4.7 7.1-7.1 1.4-1.7 2.7-3.6 3.5-5.2.5-1 .9-1.7 1.6-1.7.9 0 1.1 1.2.5 2.5-1 2.2-3.4 5-5.8 7.2-2.2 2.1-4.5 3.4-6.2 4.1 1.2.5 2.8.3 4.2-.3"/>
                    </svg>
                </span>

                <span class="verification-intelligence__node-content">
                    <strong>
                        {{ __('about.verification_intelligence.nodes.signature.title') }}
                    </strong>

                    <small>
                        {{ __('about.verification_intelligence.nodes.signature.status') }}
                    </small>
                </span>

                <span class="verification-intelligence__node-status">
                    <i></i>
                </span>

            </article>


            {{-- =================================================
                 SECURITY NODE — TOP RIGHT
                 ================================================= --}}

            <article
                class="verification-intelligence__node verification-intelligence__node--top-right"
                data-node="hash"
            >

                <span class="verification-intelligence__node-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M9 4 7 20M17 4l-2 16M4 9h16M3 15h16"/>
                    </svg>
                </span>

                <span class="verification-intelligence__node-content">
                    <strong>
                        {{ __('about.verification_intelligence.nodes.hash.title') }}
                    </strong>

                    <small>
                        {{ __('about.verification_intelligence.nodes.hash.status') }}
                    </small>
                </span>

                <span class="verification-intelligence__node-status">
                    <i></i>
                </span>

            </article>


            {{-- =================================================
                 SECURITY NODE — BOTTOM LEFT
                 ================================================= --}}

            <article
                class="verification-intelligence__node verification-intelligence__node--bottom-left"
                data-node="issuer"
            >

                <span class="verification-intelligence__node-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 3 19 6v5c0 4.7-2.8 8.1-7 10-4.2-1.9-7-5.3-7-10V6l7-3Z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                </span>

                <span class="verification-intelligence__node-content">
                    <strong>
                        {{ __('about.verification_intelligence.nodes.issuer.title') }}
                    </strong>

                    <small>
                        {{ __('about.verification_intelligence.nodes.issuer.status') }}
                    </small>
                </span>

                <span class="verification-intelligence__node-status">
                    <i></i>
                </span>

            </article>


            {{-- =================================================
                 SECURITY NODE — BOTTOM RIGHT
                 ================================================= --}}

            <article
                class="verification-intelligence__node verification-intelligence__node--bottom-right"
                data-node="timestamp"
            >

                <span class="verification-intelligence__node-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="12" r="8.5"/>
                        <path d="M12 7v5l3.2 2"/>
                    </svg>
                </span>

                <span class="verification-intelligence__node-content">
                    <strong>
                        {{ __('about.verification_intelligence.nodes.timestamp.title') }}
                    </strong>

                    <small>
                        {{ __('about.verification_intelligence.nodes.timestamp.status') }}
                    </small>
                </span>

                <span class="verification-intelligence__node-status">
                    <i></i>
                </span>

            </article>


            {{-- =================================================
                 CONNECTION SYSTEM
                 ================================================= --}}

            <div
                class="verification-intelligence__connections"
                aria-hidden="true"
            >
                <span class="verification-intelligence__connection verification-intelligence__connection--one"></span>
                <span class="verification-intelligence__connection verification-intelligence__connection--two"></span>
                <span class="verification-intelligence__connection verification-intelligence__connection--three"></span>
                <span class="verification-intelligence__connection verification-intelligence__connection--four"></span>
            </div>


            {{-- =================================================
                 CERTIFICATE CORE
                 ================================================= --}}

            <div class="verification-intelligence__core">

                <div class="verification-intelligence__core-ring"></div>

                <div class="verification-intelligence__scan-beam"></div>


                {{-- =============================================
                     DIGITAL CERTIFICATE
                     ============================================= --}}

                <article class="verification-intelligence__certificate">

                    <div class="verification-intelligence__certificate-shine"></div>

                    <div class="verification-intelligence__certificate-top">

                        <div class="verification-intelligence__brand">
                            <span class="verification-intelligence__brand-mark">
                                C
                            </span>

                            <span>
                                CERTIFIED
                            </span>
                        </div>


                        <div class="verification-intelligence__mini-seal">
                            <span>✓</span>
                        </div>

                    </div>


                    <div class="verification-intelligence__certificate-body">

                        <span class="verification-intelligence__certificate-label">
                            {{ __('about.verification_intelligence.certificate.label') }}
                        </span>

                        <h3>
                            {{ __('about.verification_intelligence.certificate.title') }}
                        </h3>

                        <div class="verification-intelligence__recipient">
                            Ahmed Mohamed
                        </div>

                        <p>
                            {{ __('about.verification_intelligence.certificate.program') }}
                        </p>

                    </div>


                    <div class="verification-intelligence__certificate-meta">

                        <div>
                            <span>
                                {{ __('about.verification_intelligence.certificate.issued') }}
                            </span>

                            <strong>
                                19 Aug 2026
                            </strong>
                        </div>

                        <div>
                            <span>
                                {{ __('about.verification_intelligence.certificate.credential_id') }}
                            </span>

                            <strong>
                                CRT-8X29-••••
                            </strong>
                        </div>

                    </div>


                    {{-- =============================================
                         QR AREA
                         ============================================= --}}

                    <div class="verification-intelligence__qr">

                        <div class="verification-intelligence__qr-scanner"></div>

                        <div class="verification-intelligence__qr-pattern">
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>
                        </div>

                    </div>


                    <div class="verification-intelligence__certificate-footer">

                        <div class="verification-intelligence__signature">

                            <span>
                                {{ __('about.verification_intelligence.certificate.signature') }}
                            </span>

                            <strong>
                                Digital Signature
                            </strong>

                        </div>


                        <div class="verification-intelligence__hash">
                            <span>
                                SHA-256
                            </span>

                            <strong>
                                8F7A•••29D
                            </strong>
                        </div>

                    </div>

                </article>


                {{-- =============================================
                     VERIFIED BADGE
                     ============================================= --}}

                <div
                    class="verification-intelligence__verified"
                    data-verified
                >

                    <div class="verification-intelligence__verified-halo"></div>
                    <div class="verification-intelligence__verified-ring verification-intelligence__verified-ring--outer"></div>
                    <div class="verification-intelligence__verified-ring verification-intelligence__verified-ring--inner"></div>

                    <div class="verification-intelligence__verified-circle">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="m6.5 12.5 3.4 3.3 7.6-7.7"/>
                        </svg>
                    </div>

                    <span class="verification-intelligence__verified-label">
                        VERIFIED
                    </span>

                </div>

            </div>


            {{-- =================================================
                 LIVE STATUS PANEL
                 ================================================= --}}

            <div class="verification-intelligence__status">

                <div class="verification-intelligence__status-indicator">
                    <span></span>
                </div>


                <div class="verification-intelligence__status-content">

                    <span class="verification-intelligence__status-label">
                        LIVE VERIFICATION
                    </span>

                    <strong
                        class="verification-intelligence__status-title"
                        data-status-title
                    >
                        {{ __('about.verification_intelligence.status.scanning') }}
                    </strong>

                    <p
                        class="verification-intelligence__status-message"
                        data-status-message
                    >
                        {{ __('about.verification_intelligence.status.scanning_description') }}
                    </p>

                </div>


                <div class="verification-intelligence__status-progress">
                    <span data-progress></span>
                </div>

            </div>

        </div>


        {{-- =================================================
             VERIFICATION TIMELINE
             ================================================= --}}

        <div class="verification-intelligence__timeline">

            <div class="verification-intelligence__timeline-line">
                <span data-timeline-progress></span>
            </div>


            <div
                class="verification-intelligence__timeline-item"
                data-step="issued"
            >
                <span class="verification-intelligence__timeline-dot"></span>

                <span class="verification-intelligence__timeline-text">
                    {{ __('about.verification_intelligence.timeline.issued') }}
                </span>
            </div>


            <div
                class="verification-intelligence__timeline-item"
                data-step="signed"
            >
                <span class="verification-intelligence__timeline-dot"></span>

                <span class="verification-intelligence__timeline-text">
                    {{ __('about.verification_intelligence.timeline.signed') }}
                </span>
            </div>


            <div
                class="verification-intelligence__timeline-item"
                data-step="archived"
            >
                <span class="verification-intelligence__timeline-dot"></span>

                <span class="verification-intelligence__timeline-text">
                    {{ __('about.verification_intelligence.timeline.archived') }}
                </span>
            </div>


            <div
                class="verification-intelligence__timeline-item"
                data-step="verified"
            >
                <span class="verification-intelligence__timeline-dot"></span>

                <span class="verification-intelligence__timeline-text">
                    {{ __('about.verification_intelligence.timeline.verified') }}
                </span>
            </div>

        </div>


        {{-- =================================================
             CLOSING STATEMENT
             ================================================= --}}

        <div class="verification-intelligence__closing">

            <p>
                {{ __('about.verification_intelligence.closing') }}
            </p>

            <div class="verification-intelligence__closing-points">

                <span>
                    <i>✓</i>
                    {{ __('about.verification_intelligence.closing_points.one') }}
                </span>

                <span>
                    <i>✓</i>
                    {{ __('about.verification_intelligence.closing_points.two') }}
                </span>

                <span>
                    <i>✓</i>
                    {{ __('about.verification_intelligence.closing_points.three') }}
                </span>

                <span>
                    <i>✓</i>
                    {{ __('about.verification_intelligence.closing_points.four') }}
                </span>

            </div>

        </div>

    </div>

</section>