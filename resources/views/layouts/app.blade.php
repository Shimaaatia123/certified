<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', config('app.name', 'Certified'))
    </title>

    <!-- Google Font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- =========================================================
     FONT AWESOME
     ---------------------------------------------------------
     Global icon library used throughout the application.
     Loaded once at the application layout level to prevent
     duplicate library loading and CSS conflicts.
========================================================= -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Bootstrap Icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Project CSS -->

    <!-- NAV&FOOT CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/back-to-top.css') }}">

    <!-- home CSS -->
    <link rel="stylesheet" href="{{ asset('css/home/services.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/feature.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/trusted.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/testimonial.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/how-it-works.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/call-to-action.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/stats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/faq.css') }}">


    <!-- course CSS -->
    <link rel="stylesheet" href="{{ asset('css/course/courses.css') }}">
    <link rel="stylesheet" href="{{ asset('css/course/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/course/categories.css') }}">
    <link rel="stylesheet" href="{{ asset('css/course/featured-courses.css') }}">
    <link rel="stylesheet" href="{{ asset('css/course/testimonials.css') }}">
    <link rel="stylesheet" href="{{ asset('css/course/journey.css') }}">
    <link rel="stylesheet" href="{{ asset('css/course/course-cta.css') }}">

    <!-- certificate css -->
    <link rel="stylesheet" href="{{ asset('css/certificate/certificates.css') }}">
    <link rel="stylesheet" href="{{ asset('css/certificate/journey.css') }}">
    <link rel="stylesheet" href="{{ asset('css/certificate/trust-system.css') }}">
    <link rel="stylesheet" href="{{ asset('css/certificate/certificate-cta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/certificate/certificate-tasks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/certificate/certificate-spotlight.css') }}">
    <link rel="stylesheet" href="{{ asset('css/certificate/verification-demo.css') }}">

    <!-- about js -->
    <link rel="stylesheet" href="{{ asset('css/about/about-hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about/trust-story.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about/verification-engine.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about/verification-intelligence.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about/verification-verdict.css') }}">

    <!-- contact -->
    <link rel="stylesheet" href="{{ asset('css/contact/contact-hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact/communication-flow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact/conversation-terminal.css') }}">
    @stack('styles')

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}



</head>

<body class="app-body">

    <div id="app">

        @include('components.ui.navbar')

        {{-- Contact success message --}}
        @if (session('contact_message'))
            <div class="certified-contact-success" role="status" aria-live="polite">
                <span class="certified-contact-success__icon" aria-hidden="true">
                    ✓
                </span>

                <span class="certified-contact-success__text">
                    {{ session('contact_message') }}
                </span>
            </div>
        @endif

        <main class="app-main">
            @yield('content')
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <!-- home js -->
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/home/hero.js') }}"></script>
    <script src="{{ asset('js/home/features.js') }}"></script>
    <script src="{{ asset('js/home/testimonial.js') }}"></script>
    <script src="{{ asset('js/home/stats.js') }}"></script>
    <script src="{{ asset('js/home/about.js') }}"></script>
    <script src="{{ asset('js/home/services.js') }}"></script>
    <script src="{{ asset('js/home/how-it-works.js') }}"></script>
    <script src="{{ asset('js/home/call-to-action.js') }}"></script>
    <script src="{{ asset('js/home/faq.js') }}"></script>
    <script src="{{ asset('js/footer.js') }}"></script>
    <script src="{{ asset('js/back-to-top.js') }}"></script>

    <!-- course js -->
    <script src="{{ asset('js/course/courses.js') }}"></script>
    <script src="{{ asset('js/course/hero.js') }}"></script>
    <script src="{{ asset('js/course/categories.js') }}"></script>
    <script src="{{ asset('js/course/featured-courses.js') }}"></script>
    <script src="{{ asset('js/course/course-testimonials.js') }}"></script>
    <script src="{{ asset('js/course/journey.js') }}"></script>
    <script src="{{ asset('js/course/course-cta.js') }}"></script>

    <!-- certificate js -->
    <script src="{{ asset('js/certificate/certificates.js') }}"></script>
    <script src="{{ asset('js/certificate/trust-system.js') }}"></script>
    <script src="{{ asset('js/certificate/certificate-cta.js') }}"></script>
    <script src="{{ asset('js/certificate/certificate-tasks.js') }}"></script>
    <script src="{{ asset('js/certificate/cert-spotlight.js') }}"></script>

    {{-- QR Code Generator --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <script src="{{ asset('js/certificate/verification-demo.js') }}"></script>


    <!-- about js -->
    <script src="{{ asset('js/about/about-hero.js') }}"></script>
    <script src="{{ asset('js/about/trust-story.js') }}"></script>
    <script src="{{ asset('js/about/verification-engine.js') }}"></script>
    <script src="{{ asset('js/about/verification-intelligence.js') }}"></script>
    <script src="{{ asset('js/about/verification-verdict.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('js/contact/contact-hero.js') }}"></script>
    <script src="{{ asset('js/contact/communication-flow.js') }}"></script>
    <script src="{{ asset('js/contact/conversation-terminal.js') }}"></script>

</body>

</html>
