<section class="courses-section">

    <div class="courses-stars">

        @for ($i = 0; $i < 18; $i++)
            <span></span>
        @endfor

    </div>


    <!-- HEADER -->
    <div class="courses-header">

        <span class="courses-subtitle">
            {{ __('courses-section.subtitle') }}
        </span>

        <h2 class="courses-title">
            {{ __('courses-section.title') }}
            <span>{{ __('courses-section.title_highlight') }}</span>
        </h2>

        <p class="courses-desc">
            {{ __('courses-section.description') }}
        </p>

    </div>

    <!-- FILTERS -->
    <div class="courses-filters">

        <button class="filter-btn active" data-filter="all">
            {{ __('courses-section.filters.all') }}
        </button>

        <button class="filter-btn" data-filter="popular">
            {{ __('courses-section.filters.popular') }}
        </button>

        <button class="filter-btn" data-filter="new">
            {{ __('courses-section.filters.new') }}
        </button>

        <button class="filter-btn" data-filter="free">
            {{ __('courses-section.filters.free') }}
        </button>

    </div>

    <!-- GRID -->
    <div class="courses-grid" id="coursesGrid">

        @foreach ($courses as $course)
            <div class="col-lg-4 col-md-6">

                <div class="course-card" data-course-id="{{ $course->id }}">

                    <div class="course-image">

                        {{-- COURSE IMAGE --}}
                        @if ($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                                class="img-fluid">
                        @else
                            <div class="course-image-placeholder">
                                <i class="fa-solid fa-image"></i>
                            </div>
                        @endif


                        {{-- COURSE BADGE --}}
                        <span class="course-badge">
                            {{ __('language.' . $course->badge) }}
                        </span>

                    </div>


                    <div class="course-content">

                        {{-- COURSE TITLE --}}
                        <h3>
                            {{ $course->title }}
                        </h3>


                        {{-- COURSE DESCRIPTION --}}
                        <p>
                            {{ $course->description }}
                        </p>


                        <div class="course-footer">

                            {{-- COURSE BUTTON --}}
                            <a href="{{ route('courses.show', $course->id) }}" class="course-btn">

                                {{ __('courses-section.button') }}

                                <i class="fa-solid fa-arrow-right"></i>

                            </a>


                            {{-- COURSE DURATION --}}
                            <span class="course-time">

                                <i class="fa-solid fa-clock"></i>

                                {{ __('language.' . $course->duration) }}

                            </span>

                        </div>

                    </div>

                </div>

            </div>
        @endforeach

    </div>
    <div id="courseSearchStatus" class="course-search-status" hidden></div>

    <div id="coursesConfig" data-locale="{{ app()->getLocale() }}" data-show-url="{{ url('/courses/show') }}"
        data-all-label="{{ __('courses-section.button') }}" data-no-results="{{ __('courses-section.no_results') }}"
        data-search-error="{{ __('courses-section.search_error') }}" hidden>
    </div>
    <!-- ==========================================================
                    COURSES TO HERO TRANSITION
========================================================== -->

    <div class="courses-transition">

        <div class="transition-glow"></div>

        <div class="transition-border"></div>

        <div class="transition-curve">

            <span class="transition-icon">

                <i class="fa-solid fa-arrow-down"></i>

            </span>

        </div>

    </div>



</section>
