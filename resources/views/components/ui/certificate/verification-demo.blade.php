<section
    class="cvd"
    aria-labelledby="cvd-heading"
    data-cvd-root
    data-cvd-endpoint="{{ url('/api/certificates/verify') }}"
>
    <div class="cvd__ambient cvd__ambient--one" aria-hidden="true"></div>
    <div class="cvd__ambient cvd__ambient--two" aria-hidden="true"></div>
    <div class="cvd__grid" aria-hidden="true"></div>

    <div class="cvd__container">

        {{-- =========================================================
        | INTRO
        ========================================================== --}}
        <div class="cvd__intro"> 

            <div class="cvd__eyebrow">
                <span class="cvd__eyebrow-dot" aria-hidden="true"></span>

                <span>
                    {{ __('certificates.verification.eyebrow') }}
                </span>
            </div>

            <h2 id="cvd-heading" class="cvd__heading">
                {{ __('certificates.verification.title') }}
            </h2>

            <p class="cvd__description">
                {{ __('certificates.verification.description') }}
            </p>

            {{-- TRUST META --}}
            <div class="cvd__meta" aria-label="{{ __('certificates.verification.trust_label') }}">

                <div class="cvd__meta-item">
                    <span class="cvd__meta-icon" aria-hidden="true">
                        <i class="fa-solid fa-shield-halved"></i>
                    </span>

                    <span>
                        {{ __('certificates.verification.meta.secure_lookup') }}
                    </span>
                </div>

                <div class="cvd__meta-item">
                    <span class="cvd__meta-icon" aria-hidden="true">
                        <i class="fa-solid fa-fingerprint"></i>
                    </span>

                    <span>
                        {{ __('certificates.verification.meta.hash_verified') }}
                    </span>
                </div>

            </div>

            {{-- =====================================================
            | FORM
            ====================================================== --}}
            <form
                class="cvd__form"
                data-cvd-form
                novalidate
            >

                <label
                    class="cvd__label"
                    for="cvd-certificate-id"
                >
                    {{ __('certificates.verification.certificate_id') }}
                </label>

                <div class="cvd__input-shell">

                    <span class="cvd__input-icon" aria-hidden="true">
                        <i class="fa-regular fa-id-card"></i>
                    </span>

                    <input
                        id="cvd-certificate-id"
                        name="certificate_id"
                        type="text"
                        class="cvd__input"
                        placeholder="{{ __('certificates.verification.placeholder') }}"
                        autocomplete="off"
                        autocapitalize="characters"
                        spellcheck="false"
                        inputmode="text"
                        maxlength="100"
                        required
                        aria-describedby="cvd-helper cvd-error"
                        data-cvd-input
                    >

                    <button
                        type="submit"
                        class="cvd__submit"
                        data-cvd-submit
                    >
                        <span
                            class="cvd__submit-content"
                            data-cvd-submit-content
                        >
                            <span class="cvd__submit-label">
                                {{ __('certificates.verification.verify_button') }}
                            </span>

                            <i
                                class="fa-solid fa-arrow-right cvd__submit-arrow"
                                aria-hidden="true"
                            ></i>
                        </span>

                        <span
                            class="cvd__submit-loading"
                            data-cvd-loading
                            hidden
                        >
                            <span class="cvd__spinner" aria-hidden="true"></span>

                            <span>
                                {{ __('certificates.verification.verifying') }}
                            </span>
                        </span>
                    </button>

                </div>

                <p
                    id="cvd-helper"
                    class="cvd__helper"
                >
                    {{ __('certificates.verification.helper') }}
                </p>

                <p
                    id="cvd-error"
                    class="cvd__error"
                    data-cvd-error
                    role="alert"
                    hidden
                ></p>

            </form>

            {{-- ACCESSIBILITY ANNOUNCEMENT --}}
            <p
                class="cvd__sr-only"
                data-cvd-announcement
                role="status"
                aria-live="polite"
            ></p>

        </div>


        {{-- =========================================================
        | VERIFICATION CARD
        ========================================================== --}}
        <div class="cvd__card" data-cvd-card>

            <div class="cvd__card-shine" aria-hidden="true"></div>

            <div class="cvd__card-border" aria-hidden="true"></div>

            {{-- =====================================================
            | IDLE
            ====================================================== --}}
            <div
                class="cvd__state cvd__state--idle"
                data-cvd-state="idle"
            >

                <div class="cvd__security-orb">

                    <span class="cvd__security-ring cvd__security-ring--one"></span>
                    <span class="cvd__security-ring cvd__security-ring--two"></span>
                    <span class="cvd__security-core">
                        <i class="fa-solid fa-shield-halved"></i>
                    </span>

                </div>

                <div class="cvd__idle-copy">

                    <span class="cvd__status-kicker">
                        {{ __('certificates.verification.engine_kicker') }}
                    </span>

                    <h3>
                        {{ __('certificates.verification.engine_title') }}
                    </h3>

                    <p>
                        {{ __('certificates.verification.engine_description') }}
                    </p>

                </div>

                <div class="cvd__trust-list">

                    <div class="cvd__trust-item">
                        <span class="cvd__trust-check">
                            <i class="fa-solid fa-check"></i>
                        </span>

                        {{ __('certificates.verification.trust.encrypted_lookup') }}
                    </div>

                    <div class="cvd__trust-item">
                        <span class="cvd__trust-check">
                            <i class="fa-solid fa-check"></i>
                        </span>

                        {{ __('certificates.verification.trust.hash_matching') }}
                    </div>

                    <div class="cvd__trust-item">
                        <span class="cvd__trust-check">
                            <i class="fa-solid fa-check"></i>
                        </span>

                        {{ __('certificates.verification.trust.qr_authenticity') }}
                    </div>

                </div>

            </div>


            {{-- =====================================================
            | LOADING
            ====================================================== --}}
            <div
                class="cvd__state cvd__state--loading"
                data-cvd-state="loading"
                hidden
            >

                <div class="cvd__loader-orb">

                    <span class="cvd__loader-ring"></span>

                    <i class="fa-solid fa-fingerprint"></i>

                </div>

                <span class="cvd__loading-title">
                    {{ __('certificates.verification.loading_title') }}
                </span>

                <p class="cvd__loading-description">
                    {{ __('certificates.verification.loading_description') }}
                </p>

                <div class="cvd__scan-bar">
                    <span></span>
                </div>

            </div>


            {{-- =====================================================
            | SUCCESS
            ====================================================== --}}
            <div
                class="cvd__state cvd__state--result"
                data-cvd-state="result"
                hidden
            >

                <div class="cvd__result-header">

                    <div class="cvd__verified-icon">
                        <i class="fa-solid fa-check"></i>
                    </div>

                    <div>
                        <span class="cvd__status-kicker">
                            {{ __('certificates.verification.success_kicker') }}
                        </span>

                        <h3 data-cvd-result-heading tabindex="-1">
                            {{ __('certificates.verification.success_title') }}
                        </h3>
                    </div>

                </div>


                {{-- CERTIFICATE INFORMATION --}}
                <div class="cvd__details">

                    <div class="cvd__detail">
                        <span class="cvd__detail-label">
                            {{ __('certificates.verification.fields.student') }}
                        </span>

                        <strong data-cvd-field="student">
                            —
                        </strong>
                    </div>

                    <div class="cvd__detail">
                        <span class="cvd__detail-label">
                            {{ __('certificates.verification.fields.course') }}
                        </span>

                        <strong data-cvd-field="course">
                            —
                        </strong>
                    </div>

                    <div class="cvd__detail">
                        <span class="cvd__detail-label">
                            {{ __('certificates.verification.fields.issued') }}
                        </span>

                        <strong data-cvd-field="issued">
                            —
                        </strong>
                    </div>

                    <div class="cvd__detail">
                        <span class="cvd__detail-label">
                            {{ __('certificates.verification.fields.status') }}
                        </span>

                        <strong
                            class="cvd__detail-status"
                            data-cvd-field="status"
                        >
                            —
                        </strong>
                    </div>

                </div>


                {{-- HASH + QR --}}
                <div class="cvd__verification-footer">

                    <div class="cvd__hash-box">

                        <span class="cvd__hash-label">
                            {{ __('certificates.verification.hash') }}
                        </span>

                        <code data-cvd-field="hash">
                            —
                        </code>

                    </div>

                    <div class="cvd__qr-box">

                        <img
                            src=""
                            alt="{{ __('certificates.verification.qr_alt') }}"
                            data-cvd-qr
                            hidden
                        >

                        <div
                            class="cvd__qr-placeholder"
                            data-cvd-qr-placeholder
                            aria-hidden="true"
                        >
                            <i class="fa-solid fa-qrcode"></i>
                        </div>

                    </div>

                </div>


                <div class="cvd__secure-badge">

                    <i class="fa-solid fa-shield-check" aria-hidden="true"></i>

                    <span>
                        {{ __('certificates.verification.secured_badge') }}
                    </span>

                </div>

            </div>


            {{-- =====================================================
            | NOT FOUND
            ====================================================== --}}
            <div
                class="cvd__state cvd__state--error"
                data-cvd-state="error"
                hidden
            >

                <div class="cvd__error-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>

                <span class="cvd__status-kicker">
                    {{ __('certificates.verification.not_found_kicker') }}
                </span>

                <h3>
                    {{ __('certificates.verification.not_found_title') }}
                </h3>

                <p>
                    {{ __('certificates.verification.not_found_description') }}
                </p>

                <button
                    type="button"
                    class="cvd__retry"
                    data-cvd-retry
                >
                    <i class="fa-solid fa-rotate-right"></i>

                    {{ __('certificates.verification.try_again') }}
                </button>

            </div>

        </div>

    </div>
</section>