 {{-- ==========================================================
     CERTIFIED — HOME HERO SECTION
     ==========================================================

     PURPOSE
     -------
     Main landing section of the Certified platform.
     Introduces the platform, communicates its core value
     proposition, highlights key marketing statistics, and
     provides primary navigation toward the Courses page.


     FRONTEND RESPONSIBILITIES
     --------------------------
     - Blade markup / component structure
     - Laravel localization
     - Hero image asset
     - Animated marketing statistics
     - Mouse-based parallax interaction
     - Floating informational cards
     - Responsive layout
     - Visual animations and hover effects


     BACKEND INTEGRATION
     -------------------
     Status: NOT REQUIRED

     Reason:
     Hero statistics are currently marketing values and are
     intentionally not derived from transactional database
     records.

     Current values:
     - 5,000+ Students
     - 120+ Courses
     - 98% Success Rate

     These values are presentation content, not live metrics.


     DATABASE
     --------
     No database query is required for this section.


     ROUTING
     -------
     Get Started     → courses.route
     Explore Courses → courses.route

     Both actions currently lead to the Courses page because
     no separate onboarding flow is implemented.


     JAVASCRIPT
     ----------
     - IntersectionObserver
     - Counter animation
     - Mouse-based parallax
     - Floating card interaction


     LOCALIZATION
     ------------
     Supported languages:
     - Arabic
     - English

     Text content is loaded through Laravel translation files.


     ASSETS
     ------
     Hero image:
     public/images/hero/hero-banner.png


     RESPONSIVE BEHAVIOR
     -------------------
     - Desktop two-column layout
     - Tablet stacked layout
     - Mobile single-column layout
     - Floating cards hidden on small phones


     ISOLATION
     ---------
     Hero styles must remain scoped to .hero-section to prevent
     CSS leakage into other Home sections.

     Generic utility names should be avoided where possible.


     FINAL STATUS
     ------------
     Frontend: COMPLETE
     Routing: COMPLETE
     Backend Integration: NOT REQUIRED
     Localization: COMPLETE
     Responsive Design: COMPLETE
     Documentation: COMPLETE

     ========================================================== --}}
 <section class="hero-section">

     <div class="container mt-3 pt-2">

         <div class="hero-content">
             <div class="hero-badge">

                 <div class="hero-badge-icon">
                     <i class="bi bi-stars"></i>
                 </div>

                 <div class="hero-badge-text">
                     {{ __('home-hero.badge') }}
                     <strong>5,000+</strong>
                     {{ __('home-hero.students_worldwide') }}
                 </div>

             </div>
             <h1 class="hero-title">
                 <i class="fa-solid fa-shield-halved"></i>
                 {{ __('home-hero.title') }}
                 <span>Certified</span>
             </h1>

             <p class="hero-subtitle">
                 {{ __('home-hero.subtitle_line_1') }}

                 <br>

                 {{ __('home-hero.subtitle_line_2') }}
             </p>

             <div class="hero-buttons">

                 <a href="{{ route('courses.route') }}" class="btn-primary-custom">
                     {{ __('home-hero.get_started') }}
                 </a>

                 <a href="{{ route('courses.route') }}" class="btn-secondary-custom">
                     {{ __('home-hero.explore_courses') }}
                 </a>

             </div>

             <div class="hero-stats">

                 <div class="stat-box">

                     <h3 class="hero-counter" data-target="5000" data-suffix="+">

                         0

                     </h3>

                     <p>{{ __('home-hero.students') }}</p>

                 </div>

                 <div class="stat-box">

                     <h3 class="hero-counter" data-target="120" data-suffix="+">

                         0

                     </h3>

                     <p>{{ __('home-hero.courses') }}</p>

                 </div>

                 <div class="stat-box">

                     <h3 class="hero-counter" data-target="98" data-suffix="%">

                         0

                     </h3>

                     <p>{{ __('home-hero.success_rate') }}</p>

                 </div>

             </div>

         </div>

         <div class="hero-image-wrapper">

             <img src="{{ asset('images/hero/hero-banner.png') }}" class="hero-image" alt="Hero">

            <div class="floating-card hero-card-one">

                 <i class="fa-solid fa-certificate"></i>

                 <span>{{ __('home-hero.certified_courses') }}</span>

             </div>

             <div class="floating-card hero-card-two">

                 <i class="fa-solid fa-user-graduate"></i>

                 <span>{{ __('home-hero.expert_mentors') }}</span>

             </div>

         </div>

     </div>

 </section>
 <!-- End of HERO Section -->
