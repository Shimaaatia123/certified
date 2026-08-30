{{-- ==========================================================
     CERTIFIED — HOME TESTIMONIALS SECTION
     ----------------------------------------------------------
     Purpose:
     Displays learner testimonials and provides an interactive
     testimonial slider on the Home page.

     Content Source:
     - Laravel translation files.
     - No database queries.
     - No API integration.

     Structure:
     1. Decorative background layer
     2. Section header
     3. Testimonial slider
     4. Progress indicator
     5. Navigation dots

     Backend Integration:
     Not required.

     JavaScript:
     - Automatic testimonial rotation
     - Manual navigation through dots

     Responsive:
     Supported through dedicated CSS media queries.
========================================================== --}}
<section class="testimonials-section py-5">
    {{-- Background --}}
    {{-- ==========================================================
     DECORATIVE BACKGROUND
     ----------------------------------------------------------
     Visual-only elements.
     They do not contain business data and require no
     backend integration.
========================================================== --}}
    <div class="testimonials-bg">

        <div class="bg-grid"></div>

        <span class="bg-blob blob-1"></span>
        <span class="bg-blob blob-2"></span>

        <span class="floating-circle circle-1"></span>
        <span class="floating-circle circle-2"></span>
        <span class="floating-circle circle-3"></span>

       
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
        <div class="shape shape3"></div>
    </div>
    <div class="container">
        {{-- ==========================================================
          SECTION HEADER
        ========================================================== --}}
        {{-- Header --}}
        <div class="testimonials-header text-center reveal-up">

            <span class="section-title">
                {{ __('home-testimonials.badge') }}
            </span>

            <h2 class="section-badge">
                {{ __('home-testimonials.title') }}
            </h2>

            <p class="section-subtitle mt-5">
                {{ __('home-testimonials.subtitle') }}
            </p>

        </div>
       {{-- ==========================================================
        TESTIMONIAL SLIDER
       ----------------------------------------------------------
       Each testimonial is rendered from the translation files.
       The first testimonial is active by default.
       ========================================================== --}}
        {{-- Slider --}}
        <div class="testimonials-wrapper reveal-up delay-1">

            {{-- Testimonial 1 --}}
            <div class="testimonial active">

                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <div class="quote-icon">
                    <i class="fas fa-quote-left"></i>
                </div>

                <p>
                    {{ __('home-testimonials.items.0.text') }}
                </p>

                <div class="user">

                    <div class="avatar">
                        <span>{{ __('home-testimonials.items.0.avatar') }}</span>
                    </div>

                    <div>
                        <h6>{{ __('home-testimonials.items.0.name') }}</h6>
                        <small>{{ __('home-testimonials.items.0.job') }}</small>
                    </div>

                </div>

            </div>

            {{-- Testimonial 2 --}}
            <div class="testimonial">

                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <div class="quote-icon">
                    <i class="fas fa-quote-left"></i>
                </div>

                <p>
                    {{ __('home-testimonials.items.1.text') }}
                </p>

                <div class="user">

                    <div class="avatar">
                        <span>{{ __('home-testimonials.items.1.avatar') }}</span>
                    </div>

                    <div>
                        <h6>{{ __('home-testimonials.items.1.name') }}</h6>
                        <small>{{ __('home-testimonials.items.1.job') }}</small>
                    </div>

                </div>

            </div>

            {{-- Testimonial 3 --}}
            <div class="testimonial">

                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <div class="quote-icon">
                    <i class="fas fa-quote-left"></i>
                </div>

                <p>
                    {{ __('home-testimonials.items.2.text') }}
                </p>

                <div class="user">

                    <div class="avatar">
                        <span>{{ __('home-testimonials.items.2.avatar') }}</span>
                    </div>

                    <div>
                        <h6>{{ __('home-testimonials.items.2.name') }}</h6>
                        <small>{{ __('home-testimonials.items.2.job') }}</small>
                    </div>

                </div>

            </div>

        </div>

        <div class="testimonial-progress reveal-up delay-2">
            <span class="progress-bar"></span>
        </div>

        <div class="dots reveal-up delay-3">

            <button class="dot active" type="button" aria-label="Show testimonial 1">
            </button>

            <button class="dot" type="button" aria-label="Show testimonial 2">
            </button>

            <button class="dot" type="button" aria-label="Show testimonial 3">
            </button>

        </div>
</section>
