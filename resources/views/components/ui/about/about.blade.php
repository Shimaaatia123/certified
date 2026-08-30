    {{-- =========================================================
        ABOUT HERO
        ========================================================= --}}

    <section class="about-hero" id="about-hero" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
        aria-labelledby="aboutHeroTitle">

        {{-- Background atmosphere --}}
        <div class="about-hero__background" aria-hidden="true">

            <div class="about-hero__aurora about-hero__aurora--one"></div>
            <div class="about-hero__aurora about-hero__aurora--two"></div>
            <div class="about-hero__aurora about-hero__aurora--three"></div>

            <div class="about-hero__grid"></div>

            <div class="about-hero__stars about-hero__stars--one"></div>
            <div class="about-hero__stars about-hero__stars--two"></div>
            <div class="about-hero__stars about-hero__stars--three"></div>

            <div class="about-hero__ambient-glow"></div>

        </div>


        {{-- Main content --}}
        <div class="about-hero__container">

            <div class="about-hero__content">

                {{-- Eyebrow --}}
                <div class="about-hero__eyebrow">

                    <span class="about-hero__eyebrow-dot"></span>

                    <span>
                        {{ __('about.hero.eyebrow') }}
                    </span>

                </div>


                {{-- Main heading --}}
                <h1 class="about-hero__title" id="aboutHeroTitle">

                    <span class="about-hero__title-line">
                        {{ __('about.hero.title_line_one') }}
                    </span>

                    <span class="about-hero__title-line">
                        {{ __('about.hero.title_line_two') }}

                        <span class="about-hero__title-highlight">
                            {{ __('about.hero.title_highlight') }}
                        </span>
                    </span>

                </h1>


                {{-- Description --}}
                <p class="about-hero__description">
                    {{ __('about.hero.description') }}
                </p>


                {{-- Trust indicators --}}
                <div class="about-hero__stats">

                    {{-- Secure --}}
                    <div class="about-hero__stat">

                        <div class="about-hero__stat-icon">

                            <svg viewBox="0 0 24 24" aria-hidden="true">

                                <path d="M12 3L19 6V11C19 15.5 16.1 19.3 12 21C7.9 19.3 5 15.5 5 11V6L12 3Z" />

                                <path d="M9 12L11 14L15 10" />

                            </svg>

                        </div>

                        <div class="about-hero__stat-content">

                            <strong>
                                {{ __('about.hero.stats.secure.value') }}
                            </strong>

                            <span>
                                {{ __('about.hero.stats.secure.title') }}
                            </span>

                            <small>
                                {{ __('about.hero.stats.secure.description') }}
                            </small>

                        </div>

                    </div>


                    {{-- Trusted --}}
                    <div class="about-hero__stat">

                        <div class="about-hero__stat-icon">

                            <svg viewBox="0 0 24 24" aria-hidden="true">

                                <circle cx="12" cy="12" r="8" />

                                <path d="M8.5 12L10.8 14.3L15.5 9.6" />

                            </svg>

                        </div>

                        <div class="about-hero__stat-content">

                            <strong>
                                {{ __('about.hero.stats.trusted.value') }}
                            </strong>

                            <span>
                                {{ __('about.hero.stats.trusted.title') }}
                            </span>

                            <small>
                                {{ __('about.hero.stats.trusted.description') }}
                            </small>

                        </div>

                    </div>


                    {{-- Instant --}}
                    <div class="about-hero__stat">

                        <div class="about-hero__stat-icon">

                            <svg viewBox="0 0 24 24" aria-hidden="true">

                                <path d="M13 2L5 13H11L10 22L19 10H13L13 2Z" />

                            </svg>

                        </div>

                        <div class="about-hero__stat-content">

                            <strong>
                                {{ __('about.hero.stats.instant.value') }}
                            </strong>

                            <span>
                                {{ __('about.hero.stats.instant.title') }}
                            </span>

                            <small>
                                {{ __('about.hero.stats.instant.description') }}
                            </small>

                        </div>

                    </div>

                </div>


                {{-- CTA --}}
                <div class="about-hero__actions">

                    <a href="#about-mission" class="about-hero__button about-hero__button--primary">

                        <span>
                            {{ __('about.hero.buttons.mission') }}
                        </span>

                        <svg viewBox="0 0 24 24" aria-hidden="true">

                            <path d="M5 12H19"></path>
                            <path d="M13 6L19 12L13 18"></path>

                        </svg>

                    </a>


                    <a href="#about-features" class="about-hero__button about-hero__button--secondary">

                        <span>
                            {{ __('about.hero.buttons.features') }}
                        </span>

                        <span class="about-hero__button-grid" aria-hidden="true">

                            <i></i>
                            <i></i>
                            <i></i>
                            <i></i>

                        </span>

                    </a>

                </div>

            </div>


            {{-- =================================================
                 HERO VISUAL
                 ================================================= --}}

            <div class="about-hero__visual" aria-hidden="true">


                {{-- Orbital rings --}}
                <div class="about-hero__orbit about-hero__orbit--one"></div>
                <div class="about-hero__orbit about-hero__orbit--two"></div>
                <div class="about-hero__orbit about-hero__orbit--three"></div>


                {{-- Floating stars --}}
                <span class="about-hero__star about-hero__star--one"></span>
                <span class="about-hero__star about-hero__star--two"></span>
                <span class="about-hero__star about-hero__star--three"></span>
                <span class="about-hero__star about-hero__star--four"></span>
                <span class="about-hero__star about-hero__star--five"></span>


                {{-- Central platform --}}
                <div class="about-hero__platform">

                    <div class="about-hero__platform-layer about-hero__platform-layer--one"></div>

                    <div class="about-hero__platform-layer about-hero__platform-layer--two"></div>

                    <div class="about-hero__platform-glow"></div>

                </div>


                {{-- Shield --}}
                <div class="about-hero__shield">

                    <div class="about-hero__shield-glow"></div>

                    <svg viewBox="0 0 200 230" class="about-hero__shield-svg">

                        <defs>

                            <linearGradient id="aboutShieldGradient" x1="0%" y1="0%" x2="100%"
                                y2="100%">
                                <stop offset="0%" />
                                <stop offset="50%" />
                                <stop offset="100%" />
                            </linearGradient>

                        </defs>

                        <path class="about-hero__shield-shape"
                            d="M100 8L184 42V101C184 157 150 202 100 222C50 202 16 157 16 101V42L100 8Z" />

                        <path class="about-hero__shield-check" d="M60 113L87 140L143 82" />

                    </svg>

                </div>


                {{-- Secure floating card --}}
                <div class="about-hero__floating-card about-hero__floating-card--secure">

                    <span class="about-hero__floating-icon">

                        <svg viewBox="0 0 24 24">
                            <rect x="6" y="10" width="12" height="10" rx="2"></rect>
                            <path d="M8 10V7a4 4 0 018 0v3"></path>
                        </svg>

                    </span>

                    <span class="about-hero__floating-text">
                        {{ __('about.hero.visual.secure') }}
                    </span>

                    <span class="about-hero__floating-lines"></span>

                </div>


                {{-- Verified floating card --}}
                <div class="about-hero__floating-card about-hero__floating-card--verified">

                    <span class="about-hero__floating-icon">

                        <svg viewBox="0 0 24 24">

                            <circle cx="12" cy="12" r="8"></circle>

                            <path d="M8.5 12L11 14.5L15.5 9.5"></path>

                        </svg>

                    </span>

                    <span class="about-hero__floating-text">
                        {{ __('about.hero.visual.verified') }}
                    </span>

                    <span class="about-hero__floating-lines"></span>

                </div>


                {{-- Trusted floating card --}}
                <div class="about-hero__floating-card about-hero__floating-card--trusted">

                    <span class="about-hero__floating-icon">

                        <svg viewBox="0 0 24 24">

                            <circle cx="9" cy="8" r="3"></circle>

                            <path d="M3 19C3.5 15.5 5.5 13 9 13C12.5 13 14.5 15.5 15 19"></path>

                            <circle cx="17" cy="10" r="2"></circle>

                        </svg>

                    </span>

                    <span class="about-hero__floating-text">
                        {{ __('about.hero.visual.trusted') }}
                    </span>

                    <span class="about-hero__floating-lines"></span>

                </div>


                {{-- Certificate --}}
                <div class="about-hero__certificate">

                    <div class="about-hero__certificate-shine"></div>

                    <div class="about-hero__certificate-header">

                        <span class="about-hero__certificate-logo">
                            ✓
                        </span>

                        <span>
                            {{ __('about.hero.visual.certificate') }}
                        </span>

                    </div>

                    <div class="about-hero__certificate-lines">

                        <span></span>
                        <span></span>
                        <span></span>

                    </div>

                    <div class="about-hero__certificate-bottom">

                        <div class="about-hero__qr">

                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>

                        </div>

                        <div class="about-hero__seal">

                            <span>✓</span>

                        </div>

                    </div>

                    <div class="about-hero__certificate-status">
                        {{ __('about.hero.visual.valid') }}
                    </div>

                </div>

            </div>

        </div>


        {{-- Bottom fade --}}
        <div class="about-hero__bottom-fade" aria-hidden="true"></div>

    </section>


    {{-- Placeholder anchors for upcoming sections --}}
    <div id="about-mission"></div>
    <div id="about-features"></div>
