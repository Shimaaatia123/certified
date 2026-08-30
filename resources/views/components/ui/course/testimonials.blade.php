<section class="course-testimonials-section">

    {{-- =========================================================
         BACKGROUND
    ========================================================== --}}
    <div class="course-testimonials-background">

        <div class="course-testimonials-grid"></div>

        <div class="course-testimonials-noise"></div>

        <div class="course-testimonials-stars"></div>

        <div class="course-testimonials-glow course-testimonials-glow-left"></div>

        <div class="course-testimonials-glow course-testimonials-glow-right"></div>

        <div class="course-testimonials-glow course-testimonials-glow-center"></div>

    </div>


    {{-- =========================================================
         TOP DIVIDER
    ========================================================== --}}
    <div class="course-testimonials-divider">

        <div class="course-testimonials-divider-line"></div>

        <div class="course-testimonials-divider-shine"></div>

        <div class="course-testimonials-divider-center"></div>

    </div>

    <div class="course-testimonials-divider-glow"></div>


    <div class="container">

        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <div class="course-testimonials-header">

            <div class="course-testimonials-title-wrapper">

                <div class="course-testimonials-badge">

                    <i class="bi bi-chat-square-heart-fill"></i>

                    <span>
                        {{ __('course-testimonials.badge') }}
                    </span>

                </div>


                <h2 class="course-testimonials-title">

                    {{ __('course-testimonials.title') }}

                    <span>
                        {{ __('course-testimonials.title_highlight') }}
                    </span>

                    {{ __('course-testimonials.title_end') }}

                </h2>


                <p class="course-testimonials-description">

                    {{ __('course-testimonials.description') }}

                </p>

            </div>

        </div>


        {{-- =====================================================
             TESTIMONIALS SLIDER
        ====================================================== --}}
        <div class="course-testimonials-slider">

            <div class="course-testimonials-slider-mask">

                <div class="course-testimonials-track">

                    <div class="course-testimonials-track-inner">

                        @foreach(__('course-testimonials.reviews') as $index => $review)

                            <article
                                class="course-testimonial-card {{ $index === 0 ? 'active' : '' }}"
                            >

                                {{-- Card Glow --}}
                                <div class="course-testimonial-card-glow"></div>


                                {{-- Animated Beam --}}
                                <div class="course-testimonial-beam">

                                    <span></span>

                                </div>


                                {{-- Quote --}}
                                <div class="course-testimonial-quote">

                                    <i class="bi bi-quote"></i>

                                </div>


                                {{-- Rating --}}
                                <div class="course-testimonial-stars">

                                    ★★★★★

                                </div>


                                {{-- Review --}}
                                <p class="course-testimonial-text">

                                    {{ $review['text'] }}

                                </p>


                                {{-- User --}}
                                <div class="course-testimonial-user">

                                    <div class="course-testimonial-avatar">

                                        <div class="course-testimonial-avatar-ring"></div>

                                        {{ mb_substr($review['name'], 0, 1) }}

                                    </div>


                                    <div class="course-testimonial-info">

                                        <h4 class="course-testimonial-name">

                                            {{ $review['name'] }}

                                        </h4>


                                        <span class="course-testimonial-role">

                                            {{ $review['role'] }}

                                        </span>

                                    </div>

                                </div>

                            </article>

                        @endforeach

                    </div>

                </div>

            </div>


            {{-- =================================================
                 CONTROLS
            ================================================== --}}
            <div class="course-testimonials-controls">

                <button
                    type="button"
                    class="course-testimonials-prev"
                    aria-label="Previous testimonial"
                >

                    <i class="bi bi-arrow-left"></i>

                </button>


                <button
                    type="button"
                    class="course-testimonials-next"
                    aria-label="Next testimonial"
                >

                    <i class="bi bi-arrow-right"></i>

                </button>

            </div>


            {{-- =================================================
                 DOTS
            ================================================== --}}
            <div class="course-testimonials-dots">

                @foreach(__('course-testimonials.reviews') as $index => $review)

                    <button
                        type="button"
                        class="course-testimonials-dot {{ $index === 0 ? 'active' : '' }}"
                        aria-label="Go to testimonial {{ $index + 1 }}"
                    ></button>

                @endforeach

            </div>

        </div>

    </div>

</section>