<section class="cert-hero" id="certificates-hero">

    {{-- ===========================
            BACKGROUND LAYERS
    ============================ --}}

    <div class="cert-hero__background">

        <div class="cert-hero__gradient"></div>
        <div class="cert-hero__mesh"></div>
        <div class="cert-hero__aurora"></div>
        <div class="cert-hero__grid"></div>
        <div class="cert-hero__light-beam"></div>
        <div class="cert-hero__mouse-glow"></div>

        {{-- Stars --}}

        @for ($i = 1; $i <= 35; $i++)
            <span class="cert-hero__star"></span>
        @endfor

        {{-- Floating Orbs --}}
        <span class="cert-hero__orb cert-hero__orb--1"></span>
        <span class="cert-hero__orb cert-hero__orb--2"></span>
        <span class="cert-hero__orb cert-hero__orb--3"></span>

        {{-- Sparkles --}}
        @for ($i = 1; $i <= 18; $i++)
            <span class="cert-hero__sparkle cert-hero__sparkle--{{ $i }}"></span>
        @endfor

        {{-- Floating Dust Particles --}}

        @for ($i = 1; $i <= 45; $i++)
            <span class="cert-hero__particle"></span>
        @endfor

    </div>

    <div class="container">

        <div class="cert-hero__wrapper">

            {{-- ======================================
                    LEFT CONTENT
            ======================================= --}}

            <div class="cert-hero__content">

                <div class="cert-hero__badge cert-reveal">

                    <span class="cert-hero__badge-icon">

                        <i class="fa-solid fa-circle-check"></i>

                    </span>

                    <span>

                        {{ __('certificates.hero.badge') }}

                    </span>

                </div>

                <h1 class="cert-hero__title cert-reveal">

                    <span class="cert-hero__title-line">

                        {{ __('certificates.hero.title_1') }}

                    </span>

                    <span class="cert-hero__title-line">

                        {{ __('certificates.hero.title_2') }}

                    </span>

                    <span class="cert-hero__title-highlight">

                        {{ __('certificates.hero.title_3') }}

                    </span>

                </h1>

                <p class="cert-hero__subtitle cert-reveal">

                    {{ __('certificates.hero.subtitle') }}

                </p>

                <div class="cert-hero__buttons cert-reveal">

                    <a href="#certificate-showcase" class="cert-hero__button cert-hero__button--primary">

                        <span>

                            {{ __('certificates.hero.primary_btn') }}

                        </span>

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                    <a href="#certificate-verification" class="cert-hero__button cert-hero__button--secondary">

                        <i class="fa-solid fa-qrcode"></i>

                        <span>

                            {{ __('certificates.hero.secondary_btn') }}

                        </span>

                    </a>

                </div>

                {{-- =======================
                        STATS
                ======================== --}}

                <div class="cert-hero__stats cert-reveal">

                    <article class="cert-hero__stat">

                        <div class="cert-hero__stat-icon">

                            <i class="fa-solid fa-award"></i>

                        </div>

                        <div class="cert-hero__stat-content">

                            <h3 class="cert-counter" data-target="25000">

                                0

                            </h3>

                            <p>

                                {{ __('certificates.hero.issued') }}

                            </p>

                        </div>

                    </article>

                    <article class="cert-hero__stat">

                        <div class="cert-hero__stat-icon">

                            <i class="fa-solid fa-book-open"></i>

                        </div>

                        <div class="cert-hero__stat-content">

                            <h3 class="cert-counter" data-target="120">

                                0

                            </h3>

                            <p>

                                {{ __('certificates.hero.courses') }}

                            </p>

                        </div>

                    </article>

                    <article class="cert-hero__stat">

                        <div class="cert-hero__stat-icon">

                            <i class="fa-solid fa-chart-line"></i>

                        </div>

                        <div class="cert-hero__stat-content">

                            <h3 class="cert-counter" data-target="98" data-suffix="%">
                                0
                            </h3>

                            <p>

                                {{ __('certificates.hero.success') }}

                            </p>

                        </div>

                    </article>

                </div>

            </div>

            {{-- ======================================
                    RIGHT SIDE
            ======================================= --}}

            <div class="cert-hero__visual cert-reveal">

                {{-- Floating Card 1 --}}

                <div class="cert-hero__floating cert-reveal cert-hero__floating--1">

                    <div class="cert-hero__floating-icon">

                        <i class="fa-solid fa-circle-check"></i>

                    </div>

                    <div class="cert-hero__floating-content">

                        <strong>

                            {{ __('certificates.hero.floating_verified') }}

                        </strong>

                        <small>

                            {{ __('certificates.hero.verified') }}

                        </small>

                    </div>

                </div>

                {{-- Floating Card 2 --}}

                <div class="cert-hero__floating cert-reveal cert-hero__floating--2">

                    <div class="cert-hero__floating-icon">

                        <i class="fa-solid fa-medal"></i>

                    </div>

                    <div class="cert-hero__floating-content">

                        <strong>

                            {{ __('certificates.hero.floating_premium') }}

                        </strong>

                        <small>

                            {{ __('certificates.hero.ribbon') }}

                        </small>

                    </div>

                </div>

                {{-- Floating Card 3 --}}

                <div class="cert-hero__floating cert-reveal cert-hero__floating--3">

                    <div class="cert-hero__floating-icon">

                        <i class="fa-solid fa-file-pdf"></i>

                    </div>

                    <div class="cert-hero__floating-content">

                        <strong>

                            {{ __('certificates.hero.floating_pdf') }}

                        </strong>

                        <small>

                            PDF

                        </small>

                    </div>

                </div>

                {{-- ======================================
                        CERTIFICATE CARD
                ======================================= --}}

                <article class="cert-hero__certificate cert-reveal">

                    <div class="cert-hero__certificate-glow"></div>

                    <div class="cert-hero__certificate-shine"></div>

                    <div class="cert-hero__certificate-border"></div>

                    <div class="cert-hero__certificate-noise"></div>

                    <div class="cert-hero__certificate-gradient"></div>

                    <div class="cert-hero__certificate-ribbon">

                        {{ __('certificates.hero.ribbon') }}

                    </div>

                    <div class="cert-hero__certificate-header">

                        <div class="cert-hero__certificate-logo">

                            <div class="cert-hero__logo-circle">

                                <i class="fa-solid fa-graduation-cap"></i>

                            </div>

                        </div>

                        <div>

                            <h4>{{ __('certificates.hero.brand') }}</h4>

                            <p class="cert-hero__certificate-label">

                                {{ __('certificates.hero.verified') }}

                            </p>

                        </div>

                    </div>

                    {{-- ==========================================
                            CERTIFICATE BODY
                    =========================================== --}}

                    <div class="cert-hero__certificate-body">

                        <div class="cert-hero__certificate-stars">

                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>

                        </div>

                        <span class="cert-hero__certificate-overline">

                            {{ __('certificates.hero.presented') }}

                        </span>

                        <h2 class="cert-hero__certificate-name">

                            {{ __('certificates.hero.student_full_name') }}

                        </h2>

                        <p class="cert-hero__certificate-description">

                            {{ __('certificates.hero.completed') }}

                        </p>

                        <h3 class="cert-hero__certificate-course">

                            {{ __('certificates.hero.course_name') }}

                        </h3>

                        <div class="cert-hero__certificate-watermark">

                            <i class="fa-solid fa-certificate"></i>

                            <span></span>

                        </div>

                    </div>

                    {{-- ==========================================
                            INFORMATION
                    =========================================== --}}

                    <div class="cert-hero__certificate-information">

                        <div class="cert-hero__certificate-item">

                            <span>

                                {{ __('certificates.hero.student') }}

                            </span>

                            <strong>

                                {{ __('certificates.hero.student_name') }}

                            </strong>

                        </div>

                        <div class="cert-hero__certificate-item">

                            <span>

                                {{ __('certificates.hero.instructor') }}

                            </span>

                            <strong>

                                {{ __('certificates.hero.instructor_name') }}

                            </strong>

                        </div>

                        <div class="cert-hero__certificate-item">

                            <span>

                                {{ __('certificates.hero.issue_date') }}

                            </span>

                            <strong>

                                {{ __('certificates.hero.issue_date_value') }}

                            </strong>

                        </div>

                        <div class="cert-hero__certificate-item">

                            <span>

                                {{ __('certificates.hero.duration') }}

                            </span>

                            <strong>

                                {{ __('certificates.hero.duration_value') }}

                            </strong>

                        </div>

                    </div>

                    {{-- ==========================================
        FOOTER
========================================== --}}

                    <div class="cert-hero__certificate-footer">

                        <div class="cert-hero__certificate-signature">

                            <span class="cert-hero__certificate-signature-name">

                                {{ __('certificates.hero.signature') }}

                            </span>

                            <div class="cert-hero__certificate-signature-line"></div>

                            <div class="cert-hero__certificate-signature-label">

                                {{ __('certificates.hero.signature') }}

                            </div>

                        </div>



                        <div class="cert-hero__certificate-qr">

                            <i class="fa-solid fa-qrcode"></i>

                        </div>

                    </div>

                    <div class="cert-hero__certificate-seal">

                        <i class="fa-solid fa-award"></i>

                    </div>

                    <div class="cert-hero__certificate-hologram">

                        {{ __('certificates.hero.hologram') }}

                    </div>

                    <div class="cert-hero__certificate-bottom">

                        <div class="cert-hero__certificate-id">

                            <span>

                                {{ __('certificates.hero.certificate_id') }}

                            </span>

                            <strong>

                                {{ __('certificates.hero.certificate_number') }}

                            </strong>

                        </div>

                        <div class="cert-hero__certificate-status">

                            <i class="fa-solid fa-circle-check"></i>

                            <span>

                                {{ __('certificates.hero.verified') }}

                            </span>

                        </div>

                    </div>

                </article>

            </div>

        </div>

    </div>


    {{-- ==========================================
        PREMIUM DIVIDER
========================================== --}}

    <div class="cert-hero__divider">

        <span class="cert-hero__divider-line"></span>

        <span class="cert-hero__divider-glow"></span>

    </div>

</section>
