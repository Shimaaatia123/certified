@extends('layouts.app')
@section('title', 'Login')
@section('content')

<style>
    /* =========================================================
       CERTIFIED AUTH — LOGIN
       Premium Compact Layout
       Extra Navbar Separation
       Fully Scoped
    ========================================================= */

    .auth-login-page {
        position: relative;

        /*
         * مساحة الصفحة بعد الـ Navbar
         */
        min-height: calc(100vh - 76px);

        /*
         * مسافة كبيرة وواضحة جدًا تحت الـ Navbar
         */
        padding: 150px 22px 45px;

        display: flex;
        align-items: flex-start;
        justify-content: center;

        overflow: hidden;

        background:
            radial-gradient(
                circle at 8% 15%,
                rgba(37, 99, 235, .10),
                transparent 27%
            ),
            radial-gradient(
                circle at 92% 85%,
                rgba(15, 118, 110, .09),
                transparent 27%
            ),
            linear-gradient(
                135deg,
                #f8fbff 0%,
                #f1f6ff 50%,
                #f2fcfa 100%
            );
    }


    /* =========================================================
       BACKGROUND AMBIENT LIGHT
    ========================================================= */

    .auth-login-page::before {
        content: "";

        position: absolute;

        width: 380px;
        height: 380px;

        top: -190px;
        right: -120px;

        border-radius: 50%;

        background:
            radial-gradient(
                circle,
                rgba(37, 99, 235, .11),
                transparent 68%
            );

        pointer-events: none;
    }


    .auth-login-page::after {
        content: "";

        position: absolute;

        width: 340px;
        height: 340px;

        bottom: -210px;
        left: -140px;

        border-radius: 50%;

        background:
            radial-gradient(
                circle,
                rgba(15, 118, 110, .09),
                transparent 68%
            );

        pointer-events: none;
    }


    /* =========================================================
       WRAPPER
    ========================================================= */

    .auth-login-wrapper {
        position: relative;

        z-index: 2;

        width: 100%;

        max-width: 920px;

        margin: 0 auto;
    }


    /* =========================================================
       MAIN LOGIN SHELL
    ========================================================= */

    .auth-login-shell {
        position: relative;

        display: grid;

        grid-template-columns: .92fr 1.08fr;

        min-height: 390px;

        overflow: hidden;

        border: 1px solid rgba(255, 255, 255, .92);

        border-radius: 24px;

        background: rgba(255, 255, 255, .88);

        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);

        box-shadow:
            0 28px 65px rgba(15, 23, 42, .12),
            0 8px 25px rgba(37, 99, 235, .05);
    }


    /* =========================================================
       PREMIUM TOP LINE
    ========================================================= */

    .auth-login-shell::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;
        right: 0;

        height: 3px;

        background:
            linear-gradient(
                90deg,
                #2563eb,
                #38bdf8,
                #0f766e,
                #2563eb
            );

        background-size: 300% 100%;

        animation:
            authLoginFlow 7s linear infinite;

        z-index: 10;
    }


    /* =========================================================
       LEFT BRAND PANEL
    ========================================================= */

    .auth-login-visual {
        position: relative;

        display: flex;

        align-items: center;

        padding: 34px 38px;

        overflow: hidden;

        color: #fff;

        background:
            linear-gradient(
                145deg,
                #0f172a 0%,
                #172554 52%,
                #064e3b 100%
            );
    }


    /* =========================================================
       TECHNICAL GRID
    ========================================================= */

    .auth-login-visual::before {
        content: "";

        position: absolute;

        inset: 0;

        opacity: .13;

        background-image:
            linear-gradient(
                rgba(255,255,255,.18) 1px,
                transparent 1px
            ),
            linear-gradient(
                90deg,
                rgba(255,255,255,.18) 1px,
                transparent 1px
            );

        background-size: 34px 34px;

        pointer-events: none;
    }


    /* =========================================================
       GLOW
    ========================================================= */

    .auth-login-visual::after {
        content: "";

        position: absolute;

        width: 300px;
        height: 300px;

        top: -145px;
        right: -125px;

        border-radius: 50%;

        background:
            radial-gradient(
                circle,
                rgba(56,189,248,.24),
                transparent 67%
            );

        pointer-events: none;
    }


    .auth-login-visual-content {
        position: relative;

        z-index: 2;

        width: 100%;
    }


    /* =========================================================
       BRAND BADGE
    ========================================================= */

    .auth-login-brand {
        display: inline-flex;

        align-items: center;

        gap: 8px;

        margin-bottom: 18px;

        padding: 6px 11px;

        border: 1px solid rgba(255,255,255,.13);

        border-radius: 999px;

        background: rgba(255,255,255,.065);

        color: rgba(255,255,255,.82);

        font-size: 10px;

        font-weight: 700;

        letter-spacing: .65px;

        text-transform: uppercase;
    }


    .auth-login-brand-dot {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #34d399;

        box-shadow:
            0 0 0 4px rgba(52,211,153,.10),
            0 0 12px rgba(52,211,153,.7);
    }


    /* =========================================================
       ICON
    ========================================================= */

    .auth-login-visual-icon {
        width: 54px;
        height: 54px;

        margin-bottom: 17px;

        display: flex;

        align-items: center;
        justify-content: center;

        border: 1px solid rgba(255,255,255,.14);

        border-radius: 17px;

        background:
            linear-gradient(
                135deg,
                rgba(37,99,235,.95),
                rgba(15,118,110,.95)
            );

        box-shadow:
            0 14px 28px rgba(0,0,0,.20);

        font-size: 22px;
    }


    /* =========================================================
       TITLE
    ========================================================= */

    .auth-login-visual h1 {
        max-width: 350px;

        margin: 0 0 9px;

        color: #fff;

        font-size: 27px;

        font-weight: 800;

        line-height: 1.18;

        letter-spacing: -.6px;
    }


    .auth-login-visual p {
        max-width: 335px;

        margin: 0;

        color: rgba(255,255,255,.62);

        font-size: 12px;

        line-height: 1.65;
    }


    /* =========================================================
       TRUST ROW
    ========================================================= */

    .auth-login-trust {
        display: flex;

        align-items: center;

        gap: 15px;

        margin-top: 20px;
    }


    .auth-login-trust-item {
        display: flex;

        align-items: center;

        gap: 5px;

        color: rgba(255,255,255,.62);

        font-size: 10px;
    }


    .auth-login-trust-item strong {
        color: rgba(255,255,255,.88);

        font-weight: 700;
    }


    .auth-login-check {
        color: #34d399;

        font-weight: 900;
    }


    /* =========================================================
       RIGHT FORM PANEL
    ========================================================= */

    .auth-login-form-panel {
        display: flex;

        align-items: center;

        padding: 30px 40px;

        background:
            linear-gradient(
                145deg,
                rgba(255,255,255,.97),
                rgba(248,250,252,.90)
            );
    }


    .auth-login-form {
        width: 100%;

        max-width: 365px;

        margin: 0 auto;
    }


    /* =========================================================
       FORM HEADING
    ========================================================= */

    .auth-login-heading {
        margin-bottom: 18px;
    }


    .auth-login-heading h2 {
        margin: 0;

        color: #0f172a;

        font-size: 23px;

        font-weight: 800;

        letter-spacing: -.4px;
    }


    .auth-login-heading p {
        margin: 5px 0 0;

        color: #94a3b8;

        font-size: 11px;
    }


    /* =========================================================
       GROUP
    ========================================================= */

    .auth-login-group {
        margin-bottom: 15px;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .auth-login-label {
        display: block;

        margin-bottom: 6px;

        color: #334155;

        font-size: 11px;

        font-weight: 800;
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .auth-login-input {
        height: 45px;

        border: 1px solid #dbe3ef;

        border-radius: 11px;

        background: #fff;

        padding: 0 13px;

        color: #0f172a;

        font-size: 12px;

        transition:
            border-color .2s ease,
            box-shadow .2s ease;
    }


    .auth-login-input::placeholder {
        color: #a1adbd;
    }


    .auth-login-input:hover {
        border-color: #cbd5e1;
    }


    .auth-login-input:focus {
        border-color: #2563eb;

        background: #fff;

        outline: none;

        box-shadow:
            0 0 0 3px rgba(37,99,235,.075);
    }


    .auth-login-input.is-invalid {
        border-color: #dc2626;
    }


    .auth-login-input.is-invalid:focus {
        box-shadow:
            0 0 0 3px rgba(220,38,38,.07);
    }


    /* =========================================================
       ERROR
    ========================================================= */

    .auth-login-error {
        display: block;

        margin-top: 5px;

        color: #dc2626;

        font-size: 10px;

        font-weight: 600;
    }


    /* =========================================================
       OPTIONS
    ========================================================= */

    .auth-login-options {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 10px;

        margin: 2px 0 16px;
    }


    .auth-login-remember {
        color: #64748b;

        font-size: 11px;
    }


    .auth-login-remember .form-check-input {
        cursor: pointer;

        margin-top: .2em;
    }


    .auth-login-remember .form-check-input:checked {
        background-color: #0f766e;

        border-color: #0f766e;
    }


    .auth-login-forgot {
        color: #2563eb;

        font-size: 11px;

        font-weight: 700;

        text-decoration: none;

        transition: .2s ease;
    }


    .auth-login-forgot:hover {
        color: #0f766e;
    }


    /* =========================================================
       BUTTON
    ========================================================= */

    .auth-login-btn {
        position: relative;

        width: 100%;

        height: 46px;

        overflow: hidden;

        border: 0;

        border-radius: 11px;

        color: #fff;

        font-size: 12px;

        font-weight: 800;

        background:
            linear-gradient(
                135deg,
                #2563eb,
                #0f766e
            );

        box-shadow:
            0 10px 20px rgba(37,99,235,.16);

        transition:
            transform .2s ease,
            box-shadow .2s ease;
    }


    .auth-login-btn::after {
        content: "";

        position: absolute;

        top: 0;

        left: -110%;

        width: 65%;

        height: 100%;

        background:
            linear-gradient(
                90deg,
                transparent,
                rgba(255,255,255,.22),
                transparent
            );

        transform: skewX(-20deg);

        transition: left .55s ease;
    }


    .auth-login-btn:hover {
        color: #fff;

        transform: translateY(-2px);

        box-shadow:
            0 14px 25px rgba(37,99,235,.22);
    }


    .auth-login-btn:hover::after {
        left: 135%;
    }


    .auth-login-btn:active {
        transform: translateY(0);
    }


    /* =========================================================
       SECURITY
    ========================================================= */

    .auth-login-security {
        display: flex;

        align-items: center;

        justify-content: center;

        gap: 6px;

        margin-top: 13px;

        color: #a1adbd;

        font-size: 9px;
    }


    .auth-login-security span:first-child {
        color: #0f766e;

        font-weight: 800;
    }


    /* =========================================================
       ANIMATION
    ========================================================= */

    @keyframes authLoginFlow {

        0% {
            background-position: 0% 50%;
        }

        100% {
            background-position: 300% 50%;
        }

    }


    /* =========================================================
       SHORT LAPTOP
    ========================================================= */

    @media (max-height: 750px) and (min-width: 851px) {

        .auth-login-page {
            padding-top: 125px;
            padding-bottom: 25px;
        }

        .auth-login-shell {
            min-height: 365px;
        }

        .auth-login-visual {
            padding: 28px 34px;
        }

        .auth-login-form-panel {
            padding: 25px 36px;
        }

        .auth-login-heading {
            margin-bottom: 14px;
        }

        .auth-login-group {
            margin-bottom: 12px;
        }

        .auth-login-options {
            margin-bottom: 13px;
        }
    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 850px) {

        .auth-login-page {
            padding-top: 100px;
            padding-bottom: 35px;
        }

        .auth-login-shell {
            grid-template-columns: 1fr;

            max-width: 520px;

            min-height: auto;
        }

        .auth-login-visual {
            min-height: 205px;

            padding: 27px 30px;
        }

        .auth-login-visual-icon {
            width: 50px;
            height: 50px;

            margin-bottom: 13px;

            border-radius: 15px;

            font-size: 21px;
        }

        .auth-login-visual h1 {
            font-size: 24px;
        }

        .auth-login-visual p {
            display: none;
        }

        .auth-login-trust {
            margin-top: 15px;
        }

        .auth-login-form-panel {
            padding: 27px 30px;
        }
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 576px) {

        .auth-login-page {
            min-height: auto;

            padding:
                85px
                13px
                30px;
        }

        .auth-login-wrapper {
            margin: 0;
        }

        .auth-login-shell {
            border-radius: 20px;
        }

        .auth-login-visual {
            min-height: 175px;

            padding: 23px 20px;
        }

        .auth-login-brand {
            margin-bottom: 14px;

            font-size: 9px;
        }

        .auth-login-visual h1 {
            font-size: 21px;
        }

        .auth-login-trust {
            gap: 10px;
        }

        .auth-login-trust-item {
            font-size: 9px;
        }

        .auth-login-form-panel {
            padding: 25px 20px;
        }

        .auth-login-heading h2 {
            font-size: 21px;
        }

        .auth-login-options {
            align-items: flex-start;

            flex-direction: column;
        }
    }

</style>


<div class="auth-login-page">

    <div class="auth-login-wrapper">

        <div class="auth-login-shell">


            {{-- =================================================
                 LEFT — CERTIFIED BRAND PANEL
            ================================================== --}}

            <div class="auth-login-visual">

                <div class="auth-login-visual-content">

                    <div class="auth-login-brand">

                        <span class="auth-login-brand-dot"></span>

                        Certified Secure Access

                    </div>


                    <div class="auth-login-visual-icon">
                        🔐
                    </div>


                    <h1>
                        {{ __('language.Welcome back, please login to your account') }}
                    </h1>


                    <p>
                        Access your Certified account and continue
                        your learning journey through a secure
                        and trusted platform.
                    </p>


                    <div class="auth-login-trust">

                        <div class="auth-login-trust-item">

                            <span class="auth-login-check">
                                ✓
                            </span>

                            <strong>
                                Secure
                            </strong>

                        </div>


                        <div class="auth-login-trust-item">

                            <span class="auth-login-check">
                                ✓
                            </span>

                            <strong>
                                Protected
                            </strong>

                        </div>


                        <div class="auth-login-trust-item">

                            <span class="auth-login-check">
                                ✓
                            </span>

                            <strong>
                                Certified
                            </strong>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 RIGHT — LOGIN FORM
            ================================================== --}}

            <div class="auth-login-form-panel">

                <div class="auth-login-form">


                    <div class="auth-login-heading">

                        <h2>
                            {{ __('language.Login') }}
                        </h2>

                        <p>
                            Enter your credentials to continue.
                        </p>

                    </div>


                    <form
                        method="POST"
                        action="{{ route('login') }}"
                    >

                        @csrf


                        {{-- EMAIL --}}

                        <div class="auth-login-group">

                            <label
                                for="email"
                                class="auth-login-label"
                            >
                                {{ __('language.Email Address') }}
                            </label>


                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                autofocus
                                placeholder="example@email.com"
                                class="form-control auth-login-input @error('email') is-invalid @enderror"
                            >


                            @error('email')

                                <span
                                    class="auth-login-error"
                                    role="alert"
                                >

                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>

                            @enderror

                        </div>


                        {{-- PASSWORD --}}

                        <div class="auth-login-group">

                            <label
                                for="password"
                                class="auth-login-label"
                            >
                                {{ __('language.Password') }}
                            </label>


                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter your password"
                                class="form-control auth-login-input @error('password') is-invalid @enderror"
                            >


                            @error('password')

                                <span
                                    class="auth-login-error"
                                    role="alert"
                                >

                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>

                            @enderror

                        </div>


                        {{-- REMEMBER / FORGOT --}}

                        <div class="auth-login-options">

                            <div class="form-check auth-login-remember">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="remember"
                                    id="remember"
                                    {{ old('remember') ? 'checked' : '' }}
                                >


                                <label
                                    class="form-check-label"
                                    for="remember"
                                >
                                    {{ __('language.Remember Me') }}
                                </label>

                            </div>


                            @if (Route::has('password.request'))

                                <a
                                    class="auth-login-forgot"
                                    href="{{ route('password.request') }}"
                                >
                                    {{ __('language.Forgot Your Password?') }}
                                </a>

                            @endif

                        </div>


                        {{-- SUBMIT --}}

                        <button
                            type="submit"
                            class="btn auth-login-btn"
                        >
                            {{ __('language.Login') }}
                        </button>


                        {{-- SECURITY --}}

                        <div class="auth-login-security">

                            <span>
                                ● Secure Access
                            </span>

                            <span>
                                •
                            </span>

                            Certified Platform

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection