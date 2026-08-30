{{-- =========================================================
     CERTIFIED — VERIFICATION ENGINE
     About Page / Section 3
     ========================================================= --}}

<section class="verification-engine" id="verification-engine" aria-labelledby="verification-engine-title">

    {{-- =====================================================
         ATMOSPHERE
         ===================================================== --}}

    <div class="verification-engine__atmosphere" aria-hidden="true">

        <div class="verification-engine__grid"></div>

        <div class="verification-engine__glow verification-engine__glow--one"></div>
        <div class="verification-engine__glow verification-engine__glow--two"></div>

        <span class="verification-engine__particle verification-engine__particle--1"></span>
        <span class="verification-engine__particle verification-engine__particle--2"></span>
        <span class="verification-engine__particle verification-engine__particle--3"></span>
        <span class="verification-engine__particle verification-engine__particle--4"></span>
        <span class="verification-engine__particle verification-engine__particle--5"></span>

    </div>


    <div class="verification-engine__container">

        {{-- =================================================
             HEADER
             ================================================= --}}

        <header class="verification-engine__header">

            <span class="verification-engine__eyebrow">
                <span class="verification-engine__eyebrow-line"></span>

                {{ __('about.verification_engine.eyebrow') }}
            </span>

            <h2 class="verification-engine__title" id="verification-engine-title">
                {{ __('about.verification_engine.title') }}
                <span>
                    {{ __('about.verification_engine.title_accent') }}
                </span>
            </h2>

            <p class="verification-engine__description">
                {{ __('about.verification_engine.description') }}
            </p>

        </header>


        {{-- =================================================
             VERIFICATION PIPELINE
             ================================================= --}}

        <div class="verification-engine__pipeline" aria-label="{{ __('about.verification_engine.pipeline_label') }}">

            <div class="verification-engine__pipeline-line">
                <span class="verification-engine__pipeline-signal"></span>
            </div>


            {{-- ISSUE --}}

            <div class="verification-engine__step is-active" data-step="issue">

                <div class="verification-engine__step-node">
                    <span>01</span>
                </div>

                <div class="verification-engine__step-content">

                    <strong>
                        {{ __('about.verification_engine.steps.issue.title') }}
                    </strong>

                    <span>
                        {{ __('about.verification_engine.steps.issue.description') }}
                    </span>

                </div>

            </div>


            {{-- SIGN --}}

            <div class="verification-engine__step" data-step="sign">

                <div class="verification-engine__step-node">
                    <span>02</span>
                </div>

                <div class="verification-engine__step-content">

                    <strong>
                        {{ __('about.verification_engine.steps.sign.title') }}
                    </strong>

                    <span>
                        {{ __('about.verification_engine.steps.sign.description') }}
                    </span>

                </div>

            </div>


            {{-- HASH --}}

            <div class="verification-engine__step" data-step="hash">

                <div class="verification-engine__step-node">
                    <span>03</span>
                </div>

                <div class="verification-engine__step-content">

                    <strong>
                        {{ __('about.verification_engine.steps.hash.title') }}
                    </strong>

                    <span>
                        {{ __('about.verification_engine.steps.hash.description') }}
                    </span>

                </div>

            </div>


            {{-- QR --}}

            <div class="verification-engine__step" data-step="qr">

                <div class="verification-engine__step-node">
                    <span>04</span>
                </div>

                <div class="verification-engine__step-content">

                    <strong>
                        {{ __('about.verification_engine.steps.qr.title') }}
                    </strong>

                    <span>
                        {{ __('about.verification_engine.steps.qr.description') }}
                    </span>

                </div>

            </div>


            {{-- VERIFIED --}}

            <div class="verification-engine__step verification-engine__step--verified" data-step="verified">

                <div class="verification-engine__step-node">
                    <span>05</span>
                </div>

                <div class="verification-engine__step-content">

                    <strong>
                        {{ __('about.verification_engine.steps.verified.title') }}
                    </strong>

                    <span>
                        {{ __('about.verification_engine.steps.verified.description') }}
                    </span>

                </div>

            </div>

        </div>


        {{-- =================================================
             DIGITAL VERIFICATION CORE
             ================================================= --}}

        <div class="verification-engine__core">


            {{-- =================================================
                 DIGITAL CERTIFICATE
                 ================================================= --}}

            <article class="verification-engine__certificate"
                aria-label="{{ __('about.verification_engine.certificate.aria_label') }}">

                <div class="verification-engine__certificate-header">

                    <div class="verification-engine__certificate-brand">

                        <span class="verification-engine__brand-mark">
                            ✓
                        </span>

                        <span>
                            CERTIFIED
                        </span>

                    </div>

                    <span class="verification-engine__certificate-status">
                        <span></span>
                        {{ __('about.verification_engine.certificate.verified') }}
                    </span>

                </div>


                <div class="verification-engine__certificate-body">

                    <span class="verification-engine__certificate-label">
                        {{ __('about.verification_engine.certificate.label') }}
                    </span>

                        <h3>
                            {{ __('about.verification_engine.certificate.cert_name') }}
                        </h3>
                    

                    <p>
                        {{ __('about.verification_engine.certificate.achievement') }}
                    </p>


                    <div class="verification-engine__certificate-divider"></div>


                    <div class="verification-engine__certificate-meta">

                        <div>
                            <span>
                                {{ __('about.verification_engine.certificate.id_label') }}
                            </span>

                            <strong>
                                20100000530978
                            </strong>
                        </div>

                        <div>
                            <span>
                                {{ __('about.verification_engine.certificate.issued_label') }}
                            </span>

                            <strong>
                                22/07/2020
                            </strong>
                        </div>

                    </div>

                </div>


                <div class="verification-engine__certificate-footer">

                    <div class="verification-engine__signature">
                        <span>Joneth</span>
                        <small>
                            {{ __('about.verification_engine.certificate.signature') }}
                        </small>
                    </div>


                    <div class="verification-engine__qr">

                        <svg viewBox="0 0 100 100" aria-hidden="true">
                            <path fill="currentColor" d="
                                    M0 0h30v30H0z
                                    M70 0h30v30H70z
                                    M0 70h30v30H0z
                                    M40 0h10v10H40z
                                    M55 5h10v10H55z
                                    M40 20h20v10H40z
                                    M35 40h15v15H35z
                                    M55 35h10v10H55z
                                    M70 40h20v10H70z
                                    M45 65h10v10H45z
                                    M60 60h30v10H60z
                                    M40 80h20v10H40z
                                    M70 75h10v10H70z
                                    M85 85h15v15H85z
                                " />
                        </svg>

                    </div>

                </div>


                {{-- SCANNER --}}

                <div class="verification-engine__scanner" aria-hidden="true"></div>

            </article>


            {{-- =================================================
                 VERIFICATION STATUS PANEL
                 ================================================= --}}

            <aside class="verification-engine__status">

                <div class="verification-engine__status-header">

                    <div>

                        <span class="verification-engine__status-eyebrow">
                            {{ __('about.verification_engine.status.eyebrow') }}
                        </span>

                        <h3>
                            {{ __('about.verification_engine.status.title') }}
                        </h3>

                    </div>

                    <span class="verification-engine__live">
                        <i></i>
                        LIVE
                    </span>

                </div>


                <div class="verification-engine__status-id">

                    <span>
                        {{ __('about.verification_engine.status.certificate_id') }}
                    </span>

                    <strong>
                        20100000530978
                    </strong>

                </div>


                <div class="verification-engine__integrity">

                    <div class="verification-engine__integrity-head">

                        <span>
                            {{ __('about.verification_engine.status.integrity') }}
                        </span>

                        <strong>100%</strong>

                    </div>

                    <div class="verification-engine__integrity-bar">
                        <span></span>
                    </div>

                </div>


                <div class="verification-engine__checks">

                    <div class="verification-engine__check is-valid" data-check="signature">

                        <span class="verification-engine__check-icon">
                            ✓
                        </span>

                        <div>
                            <span>
                                {{ __('about.verification_engine.status.signature') }}
                            </span>

                            <strong>
                                {{ __('about.verification_engine.status.valid') }}
                            </strong>
                        </div>

                    </div>


                    <div class="verification-engine__check" data-check="hash">

                        <span class="verification-engine__check-icon">
                            ✓
                        </span>

                        <div>
                            <span>
                                {{ __('about.verification_engine.status.hash') }}
                            </span>

                            <strong>
                                {{ __('about.verification_engine.status.matched') }}
                            </strong>
                        </div>

                    </div>


                    <div class="verification-engine__check" data-check="qr">

                        <span class="verification-engine__check-icon">
                            ✓
                        </span>

                        <div>
                            <span>
                                {{ __('about.verification_engine.status.qr') }}
                            </span>

                            <strong>
                                {{ __('about.verification_engine.status.confirmed') }}
                            </strong>
                        </div>

                    </div>

                </div>


                <div class="verification-engine__final">

                    <span class="verification-engine__final-icon">
                        ✓
                    </span>

                    <div>
                        <strong>
                            {{ __('about.verification_engine.status.verified') }}
                        </strong>

                        <span>
                            {{ __('about.verification_engine.status.authenticity') }}
                        </span>
                    </div>

                </div>

            </aside>

        </div>


        {{-- =================================================
             FOOT NOTE
             ================================================= --}}

        <div class="verification-engine__footer-note">

            <span class="verification-engine__footer-dot"></span>

            {{ __('about.verification_engine.footer') }}

        </div>

    </div>

</section>
