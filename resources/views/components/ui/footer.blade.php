<footer class="footer">

    {{-- ================= Top Divider ================= --}}
    <div class="footer-top-divider" aria-hidden="true">
        <span></span>
    </div>

    {{-- ================= Background Effects ================= --}}
    <div class="footer-stars" aria-hidden="true"></div>

    <div class="footer-aurora" aria-hidden="true"></div>

    <div class="footer-glow-line" aria-hidden="true"></div>


    <div class="container">

        {{-- ================= Footer Content ================= --}}
        <div class="footer-content">


            {{-- =====================================================
                                BRAND
            ====================================================== --}}
            <div class="footer-brand reveal-up">

                <a href="{{ route('home') }}" class="footer-logo" aria-label="Certified Home">

                    <img src="{{ asset('images/logo/logo.png') }}" alt="Certified Logo">

                    <span class="footer-logo-text">
                        <strong class="footer-logo-c">C</strong>ertified
                    </span>

                </a>


                <p class="footer-description">
                    {{ __('footer.description') }}
                </p>

                {{-- =====================================================
                    SOCIAL LINKS
                  TODO: Add real Certified social media links
                    before publishing the project / portfolio.
                ====================================================== --}}

            {{-- 
               <div class="footer-social">

                 <a
                  href="https://facebook.com/YOUR_CERTIFIED_PAGE"
                  target="_blank"
                  rel="noopener noreferrer"
                  aria-label="Facebook"
                  >
                 <i class="fab fa-facebook-f"></i>
                </a>

                <a
                 href="https://x.com/YOUR_CERTIFIED_ACCOUNT"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="X / Twitter"
                >
                 <i class="fab fa-x-twitter"></i>
                </a>

                <a
                 href="https://linkedin.com/company/YOUR_CERTIFIED_PAGE"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="LinkedIn"
                >
                 <i class="fab fa-linkedin-in"></i>
                </a>

                <a
                 href="https://instagram.com/YOUR_CERTIFIED_ACCOUNT"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="Instagram"
                >
                 <i class="fab fa-instagram"></i>
                </a>

            </div>
            --}}

                {{-- ================= Social ================= --}}
                <div class="footer-social">

                    <a href="#" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="#" aria-label="X / Twitter">
                        <i class="fab fa-x-twitter"></i>
                    </a>

                    <a href="#" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                    <a href="#" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>

                </div>

            </div>


            {{-- =====================================================
                            QUICK LINKS
            ====================================================== --}}

            <div class="footer-column footer-accordion reveal-up">

                <button type="button" class="footer-toggle" aria-expanded="false">

                    <span>
                        {{ __('footer.quick_links') }}
                    </span>

                    <i class="bi bi-chevron-down" aria-hidden="true"></i>

                </button>


                <ul class="footer-menu">

                    {{-- Home --}}
                    <li>
                        <a href="{{ route('home') }}">
                            {{ __('footer.home') }}
                        </a>
                    </li>

                    {{-- Courses --}}
                    <li>
                        <a href="{{ route('courses.route') }}">
                            {{ __('footer.courses') }}
                        </a>
                    </li>

                    {{-- Certificates --}}
                    <li>
                        <a href="{{ route('certificates') }}">
                            {{ __('footer.certificates') }}
                        </a>
                    </li>

                    {{-- About --}}
                    <li>
                        <a href="{{ route('about') }}">
                            {{ __('footer.about') }}
                        </a>
                    </li>

                    {{-- Contact --}}
                    <li>
                        <a href="{{ route('contact') }}">
                            {{ __('footer.contact') }}
                        </a>
                    </li>

                </ul>

            </div>


            {{-- =====================================================
                            RESOURCES
            ====================================================== --}}
            <div class="footer-column footer-accordion reveal-up">

                <button type="button" class="footer-toggle" aria-expanded="false">

                    <span>
                        {{ __('footer.resources') }}
                    </span>

                    <i class="bi bi-chevron-down" aria-hidden="true"></i>

                </button>


                <ul class="footer-menu">

                    <li>
                        <a href="#">
                            {{ __('footer.documentation') }}
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            {{ __('footer.privacy') }}
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            {{ __('footer.terms') }}
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            {{ __('footer.help') }}
                        </a>
                    </li>

                </ul>

            </div>


            {{-- =====================================================
                            CONTACT
            ====================================================== --}}
            <div class="footer-column footer-accordion reveal-up">

                <button type="button" class="footer-toggle" aria-expanded="false">

                    <span>
                        {{ __('footer.contact') }}
                    </span>

                    <i class="bi bi-chevron-down" aria-hidden="true"></i>

                </button>


                <ul class="footer-menu">

                    <li>
                        <a href="mailto:support@certified.com">
                            <i class="fas fa-envelope" aria-hidden="true"></i>

                            <span>
                                support@certified.com
                            </span>
                        </a>
                    </li>


                    <li>
                        <a href="tel:+201000000000">
                            <i class="fas fa-phone" aria-hidden="true"></i>

                            <span>
                                +20 100 000 0000
                            </span>
                        </a>
                    </li>


                    <li>
                        <span class="footer-contact-item">

                            <i class="fas fa-location-dot" aria-hidden="true"></i>

                            <span>
                                {{ __('footer.location') }}
                            </span>

                        </span>
                    </li>

                </ul>

            </div>

        </div>


        {{-- =====================================================
                            FOOTER BOTTOM
        ====================================================== --}}
        <div class="footer-bottom">

            <p>
                © {{ date('Y') }}

                Certified.

                {{ __('footer.copyright') }}
            </p>

        </div>

    </div>

</footer>
