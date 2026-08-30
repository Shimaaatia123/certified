{{-- =========================================================
     CERTIFIED — CONTACT HERO
     Secure Communication Gateway
     ========================================================= --}}

<section class="contact-hero" id="contact-hero" aria-labelledby="contact-hero-title">

    {{-- =====================================================
         BACKGROUND SYSTEM
         ===================================================== --}}

    <div class="contact-hero__background" aria-hidden="true">

        {{-- =====================================================
     CINEMATIC REVEAL SYSTEM
     ===================================================== --}}

         <span class="contact-hero__sweep"></span>
        <span class="contact-hero__sweep-glow"></span>

        <div class="contact-hero__data-streams">
            <span class="contact-hero__stream contact-hero__stream--1"></span>
            <span class="contact-hero__stream contact-hero__stream--2"></span>
            <span class="contact-hero__stream contact-hero__stream--3"></span>
            <span class="contact-hero__stream contact-hero__stream--4"></span>
            <span class="contact-hero__stream contact-hero__stream--5"></span>
        </div>

        <span class="contact-hero__orb contact-hero__orb--one"></span>
        <span class="contact-hero__orb contact-hero__orb--two"></span>

        <span class="contact-hero__grid"></span>

        <span class="contact-hero__line contact-hero__line--one"></span>
        <span class="contact-hero__line contact-hero__line--two"></span>

        {{-- =====================================================
     ATMOSPHERIC PARTICLES
     ===================================================== --}}

        <div class="contact-hero__particles" aria-hidden="true">

            <span class="contact-hero__star contact-hero__star--1"></span>
            <span class="contact-hero__star contact-hero__star--2"></span>
            <span class="contact-hero__star contact-hero__star--3"></span>
            <span class="contact-hero__star contact-hero__star--4"></span>
            <span class="contact-hero__star contact-hero__star--5"></span>
            <span class="contact-hero__star contact-hero__star--6"></span>

            <span class="contact-hero__spark contact-hero__spark--1">✦</span>
            <span class="contact-hero__spark contact-hero__spark--2">✦</span>
            <span class="contact-hero__spark contact-hero__spark--3">✦</span>
            <span class="contact-hero__spark contact-hero__spark--4">✦</span>

            <span class="contact-hero__data contact-hero__data--1"></span>
            <span class="contact-hero__data contact-hero__data--2"></span>
            <span class="contact-hero__data contact-hero__data--3"></span>

        </div>

    </div>


    <div class="contact-hero__container">

        {{-- =================================================
             LEFT — CONTENT
             ================================================= --}}

        <div class="contact-hero__content">

            <div class="contact-hero__eyebrow">

                <span class="contact-hero__eyebrow-dot"></span>

                <span>
                    {{ __('contact.hero.eyebrow') }}
                </span>

            </div>


            <h1 class="contact-hero__title" id="contact-hero-title">
                {{ __('contact.hero.title') }}
            </h1>


            <p class="contact-hero__description">
                {{ __('contact.hero.description') }}
            </p>


            <div class="contact-hero__actions">

                <a href="#contact-options" class="contact-hero__button">
                    <span>
                        {{ __('contact.hero.cta') }}
                    </span>

                    <svg class="contact-hero__button-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

            </div>


            {{-- Micro trust indicators --}}

            <div class="contact-hero__trust" aria-label="{{ __('contact.hero.trust_label') }}">

                <span class="contact-hero__trust-item">
                    <span class="contact-hero__trust-dot"></span>
                    {{ __('contact.hero.online') }}
                </span>

                <span class="contact-hero__trust-divider"></span>

                <span class="contact-hero__trust-item">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M7 10V8a5 5 0 0110 0v2" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" />

                        <rect x="5" y="10" width="14" height="10" rx="2" stroke="currentColor"
                            stroke-width="1.7" />

                        <path d="M12 14V16" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                    </svg>

                    {{ __('contact.hero.secure') }}
                </span>

            </div>

        </div>


        {{-- =================================================
             RIGHT — DIGITAL SIGNAL CONSOLE
             ================================================= --}}

        <div class="contact-signal" aria-label="{{ __('contact.hero.signal_aria') }}">

            {{-- LIVE CONSOLE EFFECTS --}}

            <span class="contact-signal__edge-energy"></span>
            <span class="contact-signal__scan-line"></span>

            <span class="contact-signal__corner contact-signal__corner--tl"></span>
            <span class="contact-signal__corner contact-signal__corner--tr"></span>
            <span class="contact-signal__corner contact-signal__corner--bl"></span>
            <span class="contact-signal__corner contact-signal__corner--br"></span>

            {{-- top bar --}}

            <div class="contact-signal__top">

                <div class="contact-signal__system">

                    <span class="contact-signal__status-dot"></span>

                    <span>
                        {{ __('contact.hero.system_online') }}
                    </span>

                </div>

                <span class="contact-signal__code">
                    CH-01
                </span>

            </div>


            {{-- heading --}}

            <div class="contact-signal__heading">

                <span class="contact-signal__label">
                    {{ __('contact.hero.channel_label') }}
                </span>

                <span class="contact-signal__sub">
                    {{ __('contact.hero.channel_subtitle') }}
                </span>

            </div>


            {{-- signal core --}}

            <div class="contact-signal__core">

                <span class="contact-signal__transmission"></span>
                <span class="contact-signal__transmission contact-signal__transmission--two"></span>

                <div class="contact-signal__rings">

                    <span></span>
                    <span></span>
                    <span></span>

                    <div class="contact-signal__core-center">
                        <span class="contact-signal__core-dot"></span>

                        <strong>
                            {{ __('contact.hero.signal') }}
                        </strong>

                        <small>
                            {{ __('contact.hero.active') }}
                        </small>
                    </div>

                </div>

            </div>


            {{-- diagnostics --}}

            <div class="contact-signal__diagnostics">

                <div class="contact-signal__row">

                    <span>
                        {{ __('contact.hero.identity') }}
                    </span>

                    <strong>
                        {{ __('contact.hero.ready') }}
                    </strong>

                </div>


                <div class="contact-signal__row">

                    <span>
                        {{ __('contact.hero.message') }}
                    </span>

                    <strong>
                        {{ __('contact.hero.ready') }}
                    </strong>

                </div>


                <div class="contact-signal__row">

                    <span>
                        {{ __('contact.hero.response') }}
                    </span>

                    <strong>
                        {{ __('contact.hero.active') }}
                    </strong>

                </div>

            </div>


            {{-- footer --}}

            <div class="contact-signal__footer">

                <div>

                    <span>
                        {{ __('contact.hero.encryption') }}
                    </span>

                    <strong>
                        AES-256
                    </strong>

                </div>

                <div>

                    <span>
                        {{ __('contact.hero.status') }}
                    </span>

                    <strong>
                        {{ __('contact.hero.connected') }}
                    </strong>

                </div>

            </div>

        </div>

    </div>

   


    {{-- =====================================================
         CONNECTION STATUS STRIP
         ===================================================== --}}

    <div class="contact-hero__status-bar">

        <div class="contact-hero__status-inner">

            <span class="contact-hero__status-item">
                <span class="contact-hero__status-indicator"></span>
                {{ __('contact.hero.system_online') }}
            </span>


            <span class="contact-hero__status-separator"></span>


            <span class="contact-hero__status-item">
                {{ __('contact.hero.response_ready') }}
            </span>


            <span class="contact-hero__status-separator"></span>


            <span class="contact-hero__status-item">
                {{ __('contact.hero.secure_communication') }}
            </span>

        </div>

    </div>

</section>
