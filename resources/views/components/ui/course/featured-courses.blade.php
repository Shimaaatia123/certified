<section class="featured-courses-section">

    {{-- =========================================================
         BACKGROUND EFFECTS
    ========================================================== --}}
    <div class="featured-bg">

        {{-- Aurora Glow --}}
        <div class="aurora-glow"></div>

        {{-- Floating Orbs --}}
        <div class="floating-orbs">
            <span></span>
            <span></span>
            <span></span>
        </div>

        {{-- Dust Particles --}}
        <div class="dust-particles">
            @for ($i = 0; $i < 25; $i++)
                <span></span>
            @endfor
        </div>

        {{-- Code Symbols --}}
        <div class="code-symbols">
            <span>&lt;/&gt;</span>
            <span>{ }</span>
            <span>&lt; &gt;</span>
            <span>◈</span>
            <span>/* */</span>
        </div>

    </div>


    {{-- =========================================================
         MAIN CONTENT
    ========================================================== --}}
    <div class="container position-relative">

        {{-- =====================================================
             SECTION HEADER
        ====================================================== --}}
        <div class="section-header text-center">

            <h2 class="title">
                {{ __('featured-courses.title') }}

                <span>
                    {{ __('featured-courses.title_highlight') }}
                </span>
            </h2>

            <p class="subtitle">
                {{ __('featured-courses.subtitle') }}
            </p>

        </div>


        {{-- =====================================================
             WAVE DIVIDER
        ====================================================== --}}
        <div class="wave-divider">

            <svg viewBox="0 0 1440 320" aria-hidden="true">
                <path
                    fill="#070A12"
                    fill-opacity="1"
                    d="M0,96L80,112C160,128,320,160,480,160C640,160,800,128,960,122.7C1120,117,1280,139,1360,149.3L1440,160L1440,320L0,320Z">
                </path>
            </svg>

        </div>


        {{-- =====================================================
             STATISTICS
        ====================================================== --}}
        <div class="stats-section">

            @foreach (__('featured-courses.stats') as $stat)

                <div class="stat">

                    <div class="icon">
                        {{ $stat['icon'] }}
                    </div>

                    <h3
                        class="counter"
                        data-value="{{ $stat['number'] }}"
                        data-suffix="{{ $stat['suffix'] }}"
                    >
                        0
                    </h3>

                    <p>
                        {{ $stat['title'] }}
                    </p>

                    <div class="progress"></div>

                </div>

            @endforeach

        </div>


        {{-- =====================================================
             FEATURED COURSE
        ====================================================== --}}
        <div class="courses-grid">

            <div class="course-card">

                <div class="card-inner">

                    {{-- Course Image --}}
                    <div class="card-image">

                        <img
                            src="{{ asset('images/courses/courses.jpg') }}"
                            alt="{{ __('featured-courses.course.title') }}"
                        >

                        <div class="image-overlay"></div>

                        <div class="badge">
                            {{ __('featured-courses.course.badge') }}
                        </div>

                    </div>


                    {{-- Course Content --}}
                    <div class="card-content">

                        <h3>
                            {{ __('featured-courses.course.title') }}
                        </h3>


                        {{-- Course Meta --}}
                        <div class="meta">

                            <span>
                                ⏱ {{ __('featured-courses.course.duration') }}
                            </span>

                            <span>
                                👨‍🎓 {{ __('featured-courses.course.students') }}
                            </span>

                            <span>
                                ⭐ {{ __('featured-courses.course.rating') }}
                            </span>

                        </div>


                        {{-- Description --}}
                        <p>
                            {{ __('featured-courses.course.description') }}
                        </p>


                        {{-- Footer --}}
                        <div class="card-footer">

                            <div class="price">

                                <span class="old">
                                    {{ __('featured-courses.course.old_price') }}
                                </span>

                                <span class="new">
                                    {{ __('featured-courses.course.new_price') }}
                                </span>

                            </div>

                            <button
                                type="button"
                                class="enroll-btn"
                            >
                                {{ __('featured-courses.course.button') }}
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>