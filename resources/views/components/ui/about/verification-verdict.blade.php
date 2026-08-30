{{-- =========================================================
     CERTIFIED — VERIFICATION VERDICT
     About Page / Section 5
     Digital Verification Verdict Experience
     ========================================================= --}}

<section
    class="verification-verdict"
    id="verification-verdict"
    aria-labelledby="verification-verdict-title"
    data-verdict-section
>
    {{-- =====================================================
         ATMOSPHERE
         ===================================================== --}}

    <div class="verification-verdict__ambient" aria-hidden="true">
        <span class="verification-verdict__orb verification-verdict__orb--one"></span>
        <span class="verification-verdict__orb verification-verdict__orb--two"></span>
        <span class="verification-verdict__grid"></span>
    </div> 

    <div class="verification-verdict__container">

        {{-- =================================================
             INTRO
             ================================================= --}}

        <div class="verification-verdict__intro">

            <span class="verification-verdict__eyebrow">
                <span class="verification-verdict__eyebrow-dot"></span>

                {{ __('about.verification_verdict.eyebrow') }}
            </span>

            <h2
                class="verification-verdict__title"
                id="verification-verdict-title"
            >
                {{ __('about.verification_verdict.title') }}
            </h2>

            <p class="verification-verdict__description">
                {{ __('about.verification_verdict.description') }}
            </p>

        </div>


        {{-- =================================================
             VERIFICATION CONSOLE
             ================================================= --}}

        <div
            class="verification-verdict__console"
            data-verdict-console
        >

            {{-- Console Header --}}
            <div class="verification-verdict__console-header">

                <div class="verification-verdict__console-brand">

                    <span class="verification-verdict__brand-mark">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>

                    <div>
                        <strong>
                            {{ __('about.verification_verdict.console_title') }}
                        </strong>

                        <small>
                            {{ __('about.verification_verdict.console_subtitle') }}
                        </small>
                    </div>

                </div>


                <div
                    class="verification-verdict__system-status"
                    data-system-status
                >
                    <span class="verification-verdict__status-dot"></span>

                    <span data-status-text>
                        {{ __('about.verification_verdict.status.verifying') }}
                    </span>
                </div>

            </div>


            {{-- Credential Identity --}}
            <div class="verification-verdict__credential">

                <div class="verification-verdict__credential-meta">

                    <span>
                        {{ __('about.verification_verdict.credential_label') }}
                    </span>

                    <strong>
                        CERT-2026-08421
                    </strong>

                </div>

                <span class="verification-verdict__credential-live">
                    <span></span>
                    {{ __('about.verification_verdict.live_record') }}
                </span>

            </div>


            {{-- Main Verification Area --}}
            <div class="verification-verdict__main">

                {{-- =================================================
                     LEFT — CREDENTIAL / QR
                     ================================================= --}}

                <div class="verification-verdict__credential-panel">

                    <div class="verification-verdict__document">

                        <div class="verification-verdict__document-top">
                            <span class="verification-verdict__document-line"></span>
                            <span class="verification-verdict__document-line verification-verdict__document-line--short"></span>
                        </div>

                        <div class="verification-verdict__document-seal">
                            <span>✓</span>
                        </div>

                        <div class="verification-verdict__document-title">
                            {{ __('about.verification_verdict.certificate') }}
                        </div>

                        <div class="verification-verdict__document-line"></div>
                        <div class="verification-verdict__document-line verification-verdict__document-line--medium"></div>
                        <div class="verification-verdict__document-line verification-verdict__document-line--short"></div>

                        <div class="verification-verdict__document-footer">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        {{-- Single scan line --}}
                        <span
                            class="verification-verdict__scan-line"
                            aria-hidden="true"
                        ></span>

                    </div>


                    {{-- CSS QR --}}
                    <div
                        class="verification-verdict__qr"
                        aria-label="{{ __('about.verification_verdict.qr_label') }}"
                    >
                        <span class="verification-verdict__qr-pattern"></span>

                        <span class="verification-verdict__qr-corner verification-verdict__qr-corner--tl"></span>
                        <span class="verification-verdict__qr-corner verification-verdict__qr-corner--tr"></span>
                        <span class="verification-verdict__qr-corner verification-verdict__qr-corner--bl"></span>

                        <span class="verification-verdict__qr-center">
                            ✓
                        </span>
                    </div>

                </div>


                {{-- =================================================
                     CENTER — RESULT
                     ================================================= --}}

                <div class="verification-verdict__result-panel">

                    <div class="verification-verdict__result-heading">
                        <span>
                            {{ __('about.verification_verdict.result_label') }}
                        </span>

                        <span class="verification-verdict__result-signal">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>


                    <div
                        class="verification-verdict__result"
                        data-verdict-result
                    >
                        <div class="verification-verdict__result-ring">
                            <div class="verification-verdict__result-ring-inner">
                                <span
                                    class="verification-verdict__result-icon"
                                    data-result-icon
                                >
                                    <span>✓</span>
                                </span>
                            </div>
                        </div>

                        <span
                            class="verification-verdict__result-label"
                            data-result-label
                        >
                            {{ __('about.verification_verdict.verifying') }}
                        </span>

                        <strong
                            class="verification-verdict__result-state"
                            data-result-state
                        >
                            ...
                        </strong>
                    </div>


                    {{-- Checks --}}
                    <div class="verification-verdict__checks">

                        <div
                            class="verification-verdict__check"
                            data-check="identity"
                        >
                            <span class="verification-verdict__check-icon">✓</span>

                            <span>
                                {{ __('about.verification_verdict.checks.identity') }}
                            </span>

                            <strong>100%</strong>
                        </div>

                        <div
                            class="verification-verdict__check"
                            data-check="issuer"
                        >
                            <span class="verification-verdict__check-icon">✓</span>

                            <span>
                                {{ __('about.verification_verdict.checks.issuer') }}
                            </span>

                            <strong>99%</strong>
                        </div>

                        <div
                            class="verification-verdict__check"
                            data-check="signature"
                        >
                            <span class="verification-verdict__check-icon">✓</span>

                            <span>
                                {{ __('about.verification_verdict.checks.signature') }}
                            </span>

                            <strong>100%</strong>
                        </div>

                        <div
                            class="verification-verdict__check"
                            data-check="integrity"
                        >
                            <span class="verification-verdict__check-icon">✓</span>

                            <span>
                                {{ __('about.verification_verdict.checks.integrity') }}
                            </span>

                            <strong>98%</strong>
                        </div>

                    </div>

                </div>


                {{-- =================================================
                     RIGHT — CONFIDENCE
                     ================================================= --}}

                <div class="verification-verdict__confidence-panel">

                    <div class="verification-verdict__confidence-heading">
                        <span>
                            {{ __('about.verification_verdict.confidence_label') }}
                        </span>

                        <span class="verification-verdict__confidence-lock">
                            ◈
                        </span>
                    </div>


                    <div
                        class="verification-verdict__confidence"
                        data-confidence
                    >

                        <svg
                            class="verification-verdict__confidence-svg"
                            viewBox="0 0 120 120"
                            aria-hidden="true"
                        >
                            <circle
                                class="verification-verdict__confidence-track"
                                cx="60"
                                cy="60"
                                r="50"
                            />

                            <circle
                                class="verification-verdict__confidence-progress"
                                cx="60"
                                cy="60"
                                r="50"
                                data-confidence-progress
                            />
                        </svg>

                        <div class="verification-verdict__confidence-value">
                            <strong data-confidence-value>0.0%</strong>

                            <span>
                                {{ __('about.verification_verdict.high_confidence') }}
                            </span>
                        </div>

                    </div>


                    <div class="verification-verdict__confidence-data">

                        <div>
                            <span>
                                {{ __('about.verification_verdict.metrics.identity') }}
                            </span>

                            <strong>100%</strong>
                        </div>

                        <div>
                            <span>
                                {{ __('about.verification_verdict.metrics.issuer') }}
                            </span>

                            <strong>99%</strong>
                        </div>

                        <div>
                            <span>
                                {{ __('about.verification_verdict.metrics.signature') }}
                            </span>

                            <strong>100%</strong>
                        </div>

                        <div>
                            <span>
                                {{ __('about.verification_verdict.metrics.integrity') }}
                            </span>

                            <strong>98%</strong>
                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 TIMELINE
                 ================================================= --}}

            <div class="verification-verdict__timeline">

                <div class="verification-verdict__timeline-line">
                    <span data-timeline-progress></span>
                </div>


                <div
                    class="verification-verdict__timeline-step"
                    data-timeline-step="0"
                >
                    <span class="verification-verdict__timeline-node">01</span>

                    <div>
                        <strong>
                            {{ __('about.verification_verdict.timeline.received') }}
                        </strong>

                        <small>
                            {{ __('about.verification_verdict.timeline.received_desc') }}
                        </small>
                    </div>
                </div>


                <div
                    class="verification-verdict__timeline-step"
                    data-timeline-step="1"
                >
                    <span class="verification-verdict__timeline-node">02</span>

                    <div>
                        <strong>
                            {{ __('about.verification_verdict.timeline.identified') }}
                        </strong>

                        <small>
                            {{ __('about.verification_verdict.timeline.identified_desc') }}
                        </small>
                    </div>
                </div>


                <div
                    class="verification-verdict__timeline-step"
                    data-timeline-step="2"
                >
                    <span class="verification-verdict__timeline-node">03</span>

                    <div>
                        <strong>
                            {{ __('about.verification_verdict.timeline.validated') }}
                        </strong>

                        <small>
                            {{ __('about.verification_verdict.timeline.validated_desc') }}
                        </small>
                    </div>
                </div>


                <div
                    class="verification-verdict__timeline-step"
                    data-timeline-step="3"
                >
                    <span class="verification-verdict__timeline-node">04</span>

                    <div>
                        <strong>
                            {{ __('about.verification_verdict.timeline.integrity') }}
                        </strong>

                        <small>
                            {{ __('about.verification_verdict.timeline.integrity_desc') }}
                        </small>
                    </div>
                </div>


                <div
                    class="verification-verdict__timeline-step"
                    data-timeline-step="4"
                >
                    <span class="verification-verdict__timeline-node">05</span>

                    <div>
                        <strong>
                            {{ __('about.verification_verdict.timeline.verified') }}
                        </strong>

                        <small>
                            {{ __('about.verification_verdict.timeline.verified_desc') }}
                        </small>
                    </div>
                </div>

            </div>


            {{-- =================================================
                 FOOTER
                 ================================================= --}}

            <div class="verification-verdict__footer">

                <div class="verification-verdict__footer-message">

                    <span class="verification-verdict__footer-icon">
                        ✓
                    </span>

                    <div>
                        <strong data-footer-title>
                            {{ __('about.verification_verdict.footer.verifying') }}
                        </strong>

                        <span data-footer-message>
                            {{ __('about.verification_verdict.footer.verifying_desc') }}
                        </span>
                    </div>

                </div>


                <div class="verification-verdict__duration">
                    <span>
                        {{ __('about.verification_verdict.duration') }}
                    </span>

                    <strong data-duration>
                        --.--s
                    </strong>
                </div>

            </div>

        </div>


        {{-- =================================================
             HUMAN CLOSE
             ================================================= --}}

        <div class="verification-verdict__close">

            <span class="verification-verdict__close-line"></span>

            <div class="verification-verdict__close-content">

                <span>
                    {{ __('about.verification_verdict.close.eyebrow') }}
                </span>

                <h3>
                    {{ __('about.verification_verdict.close.title') }}
                </h3>

                <p>
                    {{ __('about.verification_verdict.close.description') }}
                </p>

            </div>

            <span class="verification-verdict__close-line"></span>

        </div>

    </div>
</section>


<script>
    window.VerificationVerdictTranslations = {
        verifying: @json(__('about.verification_verdict.js.verifying')),
        scanning: @json(__('about.verification_verdict.js.scanning')),
        issuer: @json(__('about.verification_verdict.js.issuer')),
        signature: @json(__('about.verification_verdict.js.signature')),
        integrity: @json(__('about.verification_verdict.js.integrity')),
        verified: @json(__('about.verification_verdict.js.verified')),
        authentic: @json(__('about.verification_verdict.js.authentic')),
        complete: @json(__('about.verification_verdict.js.complete')),
        completeDescription: @json(__('about.verification_verdict.js.complete_description')),
    };
</script>

