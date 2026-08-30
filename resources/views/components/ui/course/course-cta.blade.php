{{-- =========================================================
                        COURSE CTA
========================================================= --}}

<div class="course-cta-divider" aria-hidden="true">
    <span></span>
</div>

<section class="course-cta-section" aria-labelledby="course-cta-title">

    {{-- =====================================================
                            BACKGROUND
    ====================================================== --}}

    <div class="course-cta-background" aria-hidden="true">

        <div class="course-cta-grid"></div>
        <div class="course-cta-noise"></div>

        {{-- Aurora --}}
        <span class="course-cta-aurora course-cta-aurora-1"></span>
        <span class="course-cta-aurora course-cta-aurora-2"></span>

        {{-- Orbs --}}
        <span class="course-cta-orb course-cta-orb-1"></span>
        <span class="course-cta-orb course-cta-orb-2"></span>
        <span class="course-cta-orb course-cta-orb-3"></span>

        {{-- Rings --}}
        <span class="course-cta-ring course-cta-ring-1"></span>
        <span class="course-cta-ring course-cta-ring-2"></span>

        {{-- Wave --}}
        <div class="course-cta-wave"></div>

    </div>

    {{-- Mouse glow --}}
    <div class="course-cta-mouse-glow" aria-hidden="true"></div>


    <div class="container">

        <div class="course-cta-card">

            {{-- =================================================
                                HEADER
            ================================================== --}}

            <div class="course-cta-header">

                <span class="course-cta-badge">

                    <i class="fa-solid fa-rocket" aria-hidden="true"></i>

                    <span>
                        {{ __('course_cta.badge') }}
                    </span>

                </span>


                <h2 id="course-cta-title" class="course-cta-title">

                    <span class="course-cta-title-main">
                        {{ __('course_cta.title') }}
                    </span>

                    <span class="course-cta-title-highlight">
                        {{ __('course_cta.title_highlight') }}
                    </span>

                </h2>


                <p class="course-cta-subtitle">
                    {{ __('course_cta.subtitle') }}
                </p>

            </div>


            {{-- =================================================
                                STATS
            ================================================== --}}

            <div class="course-cta-stats">

                {{-- Stat 01 --}}
                <div class="course-cta-stat">

                    <div class="course-cta-stat-icon" aria-hidden="true">
                        <i class="fa-solid fa-users"></i>
                    </div>

                    <div class="course-cta-stat-content">

                        <strong class="course-cta-stat-number">
                            12K+
                        </strong>

                        <span class="course-cta-stat-label">
                            {{ __('course_cta.students') }}
                        </span>

                    </div>

                </div>


                {{-- Stat 02 --}}
                <div class="course-cta-stat">

                    <div class="course-cta-stat-icon" aria-hidden="true">
                        <i class="fa-solid fa-certificate"></i>
                    </div>

                    <div class="course-cta-stat-content">

                        <strong class="course-cta-stat-number">
                            8.5K+
                        </strong>

                        <span class="course-cta-stat-label">
                            {{ __('course_cta.certificates') }}
                        </span>

                    </div>

                </div>


                {{-- Stat 03 --}}
                <div class="course-cta-stat">

                    <div class="course-cta-stat-icon" aria-hidden="true">
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="course-cta-stat-content">

                        <strong class="course-cta-stat-number">
                            99%
                        </strong>

                        <span class="course-cta-stat-label">
                            {{ __('course_cta.success') }}
                        </span>

                    </div>

                </div>

            </div>


            {{-- =================================================
                                ACTIONS
            ================================================== --}}

            <div class="course-cta-actions">

                <a href="{{ route('courses.route') }}" class="course-cta-btn course-cta-btn-primary">

                    <span>
                        {{ __('course_cta.primary_button') }}
                    </span>

                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>

                </a>


                <a href="{{ url('/' . app()->getLocale() . '/contact') }}#conversation-terminal"
                    class="course-cta-btn course-cta-btn-secondary">

                    <span>
                        {{ __('course_cta.secondary_button') }}
                    </span>

                </a>

            </div>


            {{-- =================================================
                            TRUST BAR
            ================================================== --}}

            <div class="course-cta-trust">

                <div class="course-cta-rating">

                    <div class="course-cta-rating-stars" aria-label="5 star rating">

                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>

                    </div>

                    <span>
                        {{ __('course_cta.rating') }}
                    </span>

                </div>


                <span class="course-cta-trust-divider" aria-hidden="true"></span>


                <div class="course-cta-trusted">

                    <i class="fa-solid fa-shield-check" aria-hidden="true"></i>

                    <span>
                        {{ __('course_cta.trusted') }}
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>
