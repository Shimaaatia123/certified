```blade
<header id="navbar" class="main-navbar">

    <div class="navbar-glow-line"></div>

    <div class="container-custom">


        {{-- =========================
             Logo
        ========================== --}}

        <a href="{{ route('home') }}"
           class="navbar-logo"
           aria-label="Certified Home">

            <img
                src="{{ asset('images/logo/logo.png') }}"
                alt="Certified Logo"
                class="navbar-logo-image"
            >

            <span class="navbar-logo-text">
                Certified
            </span>

        </a>


        {{-- =========================
             Navigation
        ========================== --}}

        <nav
            class="main-navigation"
            aria-label="Primary Navigation"
        >

            <ul class="nav-menu">


                <li class="nav-item">

                    <a
                        href="{{ route('home') }}"
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                    >
                        Home
                        <i class="fa-solid fa-chevron-down nav-arrow"></i>
                    </a>

                </li>


                <li class="nav-item has-dropdown">

                    <a
                        href="{{ route('courses.route') }}"
                        class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}"
                    >

                        Courses

                        <i class="fa-solid fa-chevron-down nav-arrow"></i>

                    </a>

                </li>


                <li class="nav-item has-dropdown">

                    <a
                        href="{{ route('certificates') }}"
                        class="nav-link {{ request()->routeIs('certificates') ? 'active' : '' }}"
                    >

                        Certificates

                        <i class="fa-solid fa-chevron-down nav-arrow"></i>

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('about') }}"
                        class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                    >
                        About
                        <i class="fa-solid fa-chevron-down nav-arrow"></i>
                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('contact') }}"
                        class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                    >
                        Contact
                        <i class="fa-solid fa-chevron-down nav-arrow"></i>
                    </a>

                </li>


            </ul>

        </nav>


        {{-- =========================
             Right Actions
        ========================== --}}

        <div class="navbar-actions">


            @guest

                <a
                    href="{{ route('login') }}"
                    class="btn-login"
                >
                    Login
                </a>


                <a
                    href="{{ route('register') }}"
                    class="btn-register"
                >
                    Register
                </a>


            @else


                {{-- =========================
                     Authenticated User Menu
                ========================== --}}

                <div class="user-menu">


                    <button
                        type="button"
                        class="user-button"
                        id="userMenuButton"
                        aria-label="User Menu"
                        aria-expanded="false"
                        aria-haspopup="true"
                    >

                        <span class="user-avatar">

                            <i class="fa-regular fa-user"></i>

                        </span>


                        <span class="user-name">

                            {{ Auth::user()->name }}

                        </span>


                        <span class="user-arrow">

                            <i class="fa-solid fa-chevron-down"></i>

                        </span>

                    </button>


                    {{-- =========================
                         User Dropdown
                    ========================== --}}

                    <div
                        class="user-dropdown"
                        id="userDropdown"
                        role="menu"
                    >


                        <div class="user-dropdown-header">

                            <span class="user-dropdown-label">
                                Signed in as
                            </span>

                            <strong>
                                {{ Auth::user()->name }}
                            </strong>

                        </div>


                        <div class="user-dropdown-divider"></div>


                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="user-logout"
                                role="menuitem"
                            >

                                <span class="logout-icon">

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

        <button
            class="mobile-toggle"
            id="mobileToggle"
            aria-label="Open Menu"
            type="button"
        >

            <i class="fa-solid fa-bars"></i>

        </button>


    </div>


    {{-- =========================
         Mobile Overlay
    ========================== --}}

    <div
        class="mobile-overlay"
        id="mobileOverlay"
    ></div>


    {{-- =========================
         Mobile Menu
    ========================== --}}

    <div
        class="mobile-menu"
        id="mobileMenu"
    >


        <div class="mobile-menu-header">

            <span>
                Menu
            </span>


            <button
                class="mobile-close"
                id="mobileClose"
                type="button"
                aria-label="Close Menu"
            >

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>


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


        @guest

            <div class="mobile-buttons">

                <a
                    href="{{ route('login') }}"
                    class="btn-login"
                >
                    Login
                </a>


                <a
                    href="{{ route('register') }}"
                    class="btn-register"
                >
                    Register
                </a>

            </div>

        @endguest


    </div>

</header>
```
