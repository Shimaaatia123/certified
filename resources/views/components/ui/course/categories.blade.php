<section class="categories-section" data-locale="{{ app()->getLocale() }}"
    data-categories-endpoint="{{ url('/api/categories/all') }}">

    {{-- ==========================================================
         BACKGROUND EFFECTS
    =========================================================== --}}

    <div class="categories-bg">

        <span class="bg-circle bg-circle-1"></span>
        <span class="bg-circle bg-circle-2"></span>
        <span class="bg-grid"></span>

    </div>


    {{-- ==========================================================
         STARS
    =========================================================== --}}

    <div class="categories-stars">

        @for ($i = 0; $i < 20; $i++)
            <span></span>
        @endfor

    </div>


    {{-- ==========================================================
         TOP DIVIDER
    =========================================================== --}}

    <div class="categories-divider-top">

        <span class="divider-line"></span>

        <span class="divider-light"></span>

    </div>


    {{-- ==========================================================
         CONTENT
    =========================================================== --}}

    <div class="container">

        {{-- ======================================================
             FLOATING PARTICLES
        ======================================================= --}}

        <div class="categories-particles">

            @for ($i = 0; $i < 12; $i++)
                <span></span>
            @endfor

        </div>


        {{-- ======================================================
             HEADER
        ======================================================= --}}

        <div class="categories-header">

            <div class="header-glow"></div>


            <span class="categories-subtitle">

                {{ __('course-categories.subtitle') }}

            </span>


            <h2 class="categories-title">

                {{ __('course-categories.title') }}

                <span>

                    {{ __('course-categories.highlight') }}

                </span>

            </h2>


            <p class="categories-description">

                {{ __('course-categories.description') }}

            </p>

        </div>


        {{-- ======================================================
             LOADING SKELETON
        ======================================================= --}}

        <div id="categories-loading" class="row g-4 categories-loading-grid">

            @for ($i = 0; $i < 6; $i++)
                <div class="col-lg-4 col-md-6">

                    <div class="category-card category-card-skeleton">

                        {{-- IMAGE SKELETON --}}
                        <div class="category-skeleton-image"></div>


                        {{-- ICON SKELETON --}}
                        <div class="category-skeleton-icon"></div>


                        {{-- TITLE SKELETON --}}
                        <div class="category-skeleton-title"></div>


                        {{-- DESCRIPTION SKELETON --}}
                        <div class="category-skeleton-text"></div>

                        <div
                            class="
                                category-skeleton-text
                                category-skeleton-text-short
                            ">
                        </div>


                        {{-- FOOTER SKELETON --}}
                        <div class="category-skeleton-footer">

                            <div class="category-skeleton-count"></div>

                            <div class="category-skeleton-arrow"></div>

                        </div>

                    </div>

                </div>
            @endfor

        </div>


        {{-- ======================================================
             DYNAMIC CATEGORIES
             Filled by JavaScript
        ======================================================= --}}

        <div id="categories-data" class="row g-4" hidden>
        </div>


        {{-- ======================================================
             EMPTY / ERROR STATE
        ======================================================= --}}

        <div id="categories-empty" class="categories-empty" hidden>

            <div class="categories-empty-icon">

                <i class="fa-solid fa-layer-group"></i>

            </div>


            <h3>

                {{ app()->getLocale() === 'ar' ? 'لا توجد فئات متاحة حاليًا' : 'No categories available right now' }}

            </h3>


            <p>

                {{ app()->getLocale() === 'ar' ? 'حاول مرة أخرى لاحقًا.' : 'Please try again later.' }}

            </p>

        </div>

    </div>


    {{-- ==========================================================
         BOTTOM DIVIDER
    =========================================================== --}}

    <div class="categories-divider-bottom">

        <span class="divider-glow"></span>

        <span class="divider-line"></span>


        <div class="divider-circle">

            <i class="fa-solid fa-layer-group"></i>

        </div>

    </div>

</section>
