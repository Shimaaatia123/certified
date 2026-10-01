<header id="navbar" class="main-navbar">

    <div class="navbar-glow-line"></div>

    <div class="container-custom">

        {{-- =========================
         Logo
    ========================== --}}

        <a href="{{ route('home') }}" class="navbar-logo" aria-label="Certified Home">

            <img src="{{ asset('images/logo/logo.png') }}" alt="Certified Logo" class="navbar-logo-image">

            <span class="navbar-logo-text">
                Certified
            </span>

        </a>


        {{-- =========================
         Desktop Navigation
    ========================== --}}

        <nav class="main-navigation" aria-label="Primary Navigation">

            <ul class="nav-menu">

                <li class="nav-item">

                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>

                </li>


                <li class="nav-item">

                    <a href="{{ route('courses.route') }}"
                        class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}">
                        Courses
                    </a>

                </li>


                <li class="nav-item">

                    <a href="{{ route('certificates') }}"
                        class="nav-link {{ request()->routeIs('certificates') ? 'active' : '' }}">
                        Certificates
                    </a>

                </li>


                <li class="nav-item">

                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        About
                    </a>

                </li>


                <li class="nav-item">

                    <a href="{{ route('contact') }}"
                        class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        Contact
                    </a>

                </li>

            </ul>

        </nav>


        {{-- =========================
         Desktop Actions
    ========================== --}}

        <div class="navbar-actions">

            {{-- =========================
             Language Switcher
        ========================== --}}

            <div class="navbar-language">

                <button type="button" class="navbar-language-button" id="navbarLanguageButton"
                    aria-label="Change language" aria-expanded="false" aria-haspopup="true">

                    <span class="navbar-language-icon" aria-hidden="true">
                        <i class="fa-solid fa-globe"></i>
                    </span>

                    <span class="navbar-language-current">
                        {{ strtoupper(app()->getLocale()) }}
                    </span>

                    <span class="navbar-language-chevron" aria-hidden="true">
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>

                </button>

                <div class="navbar-language-dropdown" id="navbarLanguageDropdown" role="menu"
                    aria-label="Language selection">

                    <div class="navbar-language-heading">Language</div>

                    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}"
                        class="navbar-language-option {{ app()->getLocale() === 'en' ? 'active' : '' }}"
                        role="menuitem" hreflang="en" lang="en">

                        <span class="navbar-language-option-icon" aria-hidden="true">
                            <i class="fa-solid fa-language"></i>
                        </span>

                        <span class="navbar-language-option-text">
                            <strong>English</strong>
                            <small>EN</small>
                        </span>

                        @if (app()->getLocale() === 'en')
                            <span class="navbar-language-check" aria-hidden="true">
                                <i class="fa-solid fa-check"></i>
                            </span>
                        @endif

                    </a>

                    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"
                        class="navbar-language-option {{ app()->getLocale() === 'ar' ? 'active' : '' }}"
                        role="menuitem" hreflang="ar" lang="ar">

                        <span class="navbar-language-option-icon" aria-hidden="true">
                            <i class="fa-solid fa-language"></i>
                        </span>

                        <span class="navbar-language-option-text">
                            <strong>العربية</strong>
                            <small>AR</small>
                        </span>

                        @if (app()->getLocale() === 'ar')
                            <span class="navbar-language-check" aria-hidden="true">
                                <i class="fa-solid fa-check"></i>
                            </span>
                        @endif

                    </a>

                </div>

            </div>


            @guest

                {{-- =========================
                 Guest Actions
            ========================== --}}

                <a href="{{ route('login') }}" class="btn-login">
                    Login
                </a>

                <a href="{{ route('register') }}" class="btn-register">
                    Register
                </a>
            @else
                {{-- =========================
                 Dashboard
            ========================== --}}

                <a href="{{ route('admin.home') }}"
                    class="navbar-dashboard {{ request()->routeIs('admin.home') ? 'active' : '' }}" aria-label="Dashboard">

                    <span class="dashboard-icon" aria-hidden="true">
                        <i class="fa-solid fa-gauge-high"></i>
                    </span>

                    <span class="dashboard-label">
                        Dashboard
                    </span>

                </a>


                {{-- =========================
                 User Menu
            ========================== --}}

                <div class="user-menu">

                    <button type="button" class="user-button" id="userMenuButton" aria-label="User Menu"
                        aria-expanded="false" aria-haspopup="true">

                        <span class="user-avatar" aria-hidden="true">
                            <i class="fa-regular fa-user"></i>
                        </span>

                        <span class="user-name">
                            {{ Auth::user()->name }}
                        </span>

                        <span class="user-arrow" aria-hidden="true">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>

                    </button>


                    {{-- User Dropdown --}}

                    <div class="user-dropdown" id="userDropdown" role="menu">

                        <div class="user-dropdown-header">

                            <span class="user-dropdown-label">
                                Signed in as
                            </span>

                            <strong>
                                {{ Auth::user()->name }}
                            </strong>

                        </div>


                        <div class="user-dropdown-divider"></div>


                        <a href="{{ route('admin.home') }}" class="user-dropdown-item" role="menuitem">

                            <span class="dropdown-item-icon" aria-hidden="true">
                                <i class="fa-solid fa-gauge-high"></i>
                            </span>

                            <span>
                                Dashboard
                            </span>

                        </a>


                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button type="submit" class="user-logout" role="menuitem">

                                <span class="logout-icon" aria-hidden="true">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </span>

                                <span>
                                    Log Out
                                </span>

                            </button>

                        </form>

                    </div>

                </div>

            @endguest

        </div>


        {{-- =========================
         Mobile Toggle
    ========================== --}}

        <button class="mobile-toggle" id="mobileToggle" aria-label="Open Menu" aria-expanded="false"
            type="button">

            <i class="fa-solid fa-bars"></i>

        </button>

    </div>


    {{-- =========================
     Mobile Overlay
========================== --}}

    <div class="mobile-overlay" id="mobileOverlay"></div>


    {{-- =========================
     Mobile Menu
========================== --}}

    <div class="mobile-menu" id="mobileMenu" aria-hidden="true">

        <div class="mobile-menu-header">

            <span>
                Menu
            </span>

            <button class="mobile-close" id="mobileClose" type="button" aria-label="Close Menu">

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>


        {{-- Mobile Navigation --}}

        <ul class="mobile-nav">

            <li>
                <a href="{{ route('home') }}">
                    Home
                </a>
            </li>

            <li>
                <a href="{{ route('courses.route') }}">
                    Courses
                </a>
            </li>

            <li>
                <a href="{{ route('certificates') }}">
                    Certificates
                </a>
            </li>

            <li>
                <a href="{{ route('about') }}">
                    About
                </a>
            </li>

            <li>
                <a href="{{ route('contact') }}">
                    Contact
                </a>
            </li>

        </ul>


        {{-- =========================
         Mobile Language
    ========================== --}}

        <div class="mobile-language">

            <div class="mobile-language-title">

                <span class="mobile-language-title-icon" aria-hidden="true">
                    <i class="fa-solid fa-globe"></i>
                </span>

                <span>
                    Language
                </span>

            </div>


            <div class="mobile-language-options">

                <a href="{{ LaravelLocalization::getLocalizedURL('en') }}"
                    class="mobile-language-option {{ app()->getLocale() === 'en' ? 'active' : '' }}">

                    <span>
                        English
                    </span>

                    @if (app()->getLocale() === 'en')
                        <i class="fa-solid fa-check" aria-hidden="true"></i>
                    @endif

                </a>


                <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"
                    class="mobile-language-option {{ app()->getLocale() === 'ar' ? 'active' : '' }}">

                    <span>
                        العربية
                    </span>

                    @if (app()->getLocale() === 'ar')
                        <i class="fa-solid fa-check" aria-hidden="true"></i>
                    @endif

                </a>

            </div>

        </div>


        @auth

            {{-- =========================
             Mobile Dashboard
        ========================== --}}

            <a href="{{ route('admin.home') }}" class="mobile-dashboard">

                <span class="mobile-dashboard-icon" aria-hidden="true">
                    <i class="fa-solid fa-gauge-high"></i>
                </span>

                <span class="mobile-dashboard-text">
                    Dashboard
                </span>

                <span class="mobile-dashboard-arrow" aria-hidden="true">
                    <i class="fa-solid fa-arrow-right"></i>
                </span>

            </a>
        @else
            {{-- =========================
             Mobile Guest Actions
        ========================== --}}

            <div class="mobile-buttons">

                <a href="{{ route('login') }}" class="btn-login">
                    Login
                </a>

                <a href="{{ route('register') }}" class="btn-register">
                    Register
                </a>

            </div>

        @endauth

    </div>

</header>
