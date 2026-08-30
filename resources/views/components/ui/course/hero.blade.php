<section class="courses-hero">

    <!-- Background Effects -->

    <div class="hero-background">

        <div class="hero-glow hero-glow-1"></div>

        <div class="hero-glow hero-glow-2"></div>

        <div class="hero-grid"></div>

        <div class="hero-particles"></div>

    </div>
    <div class="container">

        <div class="row align-items-center gy-5">

            <!-- Left -->
            <div class="col-lg-6">

                <div class="courses-hero-content">

                    <span class="hero-badge">
                        <span class="badge-icon">

                            <i class="fa-solid fa-graduation-cap"></i>

                        </span>
                        {{ __('course-hero.badge') }}
                    </span>

                    <h1 class="hero-title">
                        {{ __('course-hero.title') }}

                        <span>
                            {{ __('course-hero.title_highlight') }}
                        </span>
                    </h1>

                    <p class="hero-description">
                        {{ __('course-hero.description') }}
                    </p>

                    <!-- Search -->

                    <div class="hero-search" id="courseSearch">

                        <input type="text" id="courseSearchInput"
                            placeholder="{{ __('course-hero.search_placeholder') }}" autocomplete="off">

                        <button type="button" id="courseSearchButton"
                            aria-label="{{ __('course-hero.search_placeholder') }}">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>

                    </div>

                    <!-- Popular -->

                    <div class="popular-tags">

                        @foreach (__('course-hero.popular') as $tag)
                            <span>{{ $tag }}</span>
                        @endforeach

                    </div>

                    <!-- Stats -->

                    <div class="hero-stats">

                        @foreach (__('course-hero.stats') as $stat)
                            <div>

                                <h3>{{ $stat['number'] }}</h3>

                                <p>{{ $stat['title'] }}</p>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

            <!-- Right -->

            <div class="col-lg-6">

                <div class="hero-image">

                    <img src="{{ asset('images/hero/hero-course.png') }}" alt="Certified Courses" class="img-fluid">

                </div>

            </div>

        </div>

    </div>
    <!-- Hero Divider -->

    <!-- ==========================================================
                    HERO CURVED DIVIDER
========================================================== -->

    <div class="hero-divider">

        <svg class="hero-divider-svg" viewBox="0 0 1440 220" preserveAspectRatio="none">

            <path class="hero-divider-path" d="M0,120
               C280,200
               520,30
               720,80
               C930,135
               1160,200
               1440,120" />

            <circle class="hero-divider-dot" r="7">

                <animateMotion dur="6s" repeatCount="indefinite">

                    <mpath href="#dividerPath" />

                </animateMotion>

            </circle>

            <path id="dividerPath" fill="none" d="M0,120
               C280,200
               520,30
               720,80
               C930,135
               1160,200
               1440,120" />

        </svg>

    </div>
</section>
