@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')

<style>
    /* =========================================================
       CERTIFIED AUTH — RESET PASSWORD
       Premium Compact Layout
       Same Visual System as LOGIN
       Fully Scoped
    ========================================================= */

    .auth-reset-page {
        position: relative;

        /*
         * Space after Navbar
         */
        min-height: calc(100vh - 76px);

        /*
         * Same vertical positioning as Login
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

    .auth-reset-page::before {
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


    .auth-reset-page::after {
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

    .auth-reset-wrapper {
        position: relative;

        z-index: 2;

        width: 100%;

        max-width: 920px;

        margin: 0 auto;
    }


    /* =========================================================
       MAIN RESET SHELL
    ========================================================= */

    .auth-reset-shell {
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

    .auth-reset-shell::before {
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
            authResetFlow 7s linear infinite;

        z-index: 10;
    }


    /* =========================================================
       LEFT — CERTIFIED SECURITY PANEL
    ========================================================= */

    .auth-reset-visual {
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

    .auth-reset-visual::before {
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

    .auth-reset-visual::after {
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


    .auth-reset-visual-content {
        position: relative;

        z-index: 2;

        width: 100%;
    }


    /* =========================================================
       BRAND BADGE
    ========================================================= */

    .auth-reset-brand {
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


    .auth-reset-brand-dot {
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

    .auth-reset-visual-icon {
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

    .auth-reset-visual h1 {
        max-width: 350px;

        margin: 0 0 9px;

        color: #fff;

        font-size: 27px;

        font-weight: 800;

        line-height: 1.18;

        letter-spacing: -.6px;
    }


    .auth-reset-visual p {
        max-width: 335px;

        margin: 0;

        color: rgba(255,255,255,.62);

        font-size: 12px;

        line-height: 1.65;
    }


    /* =========================================================
       TRUST ROW
    ========================================================= */

    .auth-reset-trust {
        display: flex;

        align-items: center;

        gap: 15px;

        margin-top: 20px;
    }


    .auth-reset-trust-item {
        display: flex;

        align-items: center;

        gap: 5px;

        color: rgba(255,255,255,.62);

        font-size: 10px;
    }


    .auth-reset-trust-item strong {
        color: rgba(255,255,255,.88);

        font-weight: 700;
    }


    .auth-reset-check {
        color: #34d399;

        font-weight: 900;
    }


    /* =========================================================
       RIGHT — RESET FORM PANEL
    ========================================================= */

    .auth-reset-form-panel {
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


    .auth-reset-form {
        width: 100%;

        max-width: 365px;

        margin: 0 auto;
    }


    /* =========================================================
       FORM HEADING
    ========================================================= */

    .auth-reset-heading {
        margin-bottom: 18px;
    }


    .auth-reset-heading h2 {
        margin: 0;

        color: #0f172a;

        font-size: 23px;

        font-weight: 800;

        letter-spacing: -.4px;
    }


    .auth-reset-heading p {
        margin: 5px 0 0;

        color: #94a3b8;

        font-size: 11px;
    }


    /* =========================================================
       GROUP
    ========================================================= */

    .auth-reset-group {
        margin-bottom: 15px;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .auth-reset-label {
        display: block;

        margin-bottom: 6px;

        color: #334155;

        font-size: 11px;

        font-weight: 800;
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .auth-reset-input {
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


    .auth-reset-input::placeholder {
        color: #a1adbd;
    }


    .auth-reset-input:hover {
        border-color: #cbd5e1;
    }


    .auth-reset-input:focus {
        border-color: #2563eb;

        background: #fff;

        outline: none;

        box-shadow:
            0 0 0 3px rgba(37,99,235,.075);
    }


    .auth-reset-input.is-invalid {
        border-color: #dc2626;
    }


    .auth-reset-input.is-invalid:focus {
        box-shadow:
            0 0 0 3px rgba(220,38,38,.07);
    }


    /* =========================================================
       ERROR
    ========================================================= */

    .auth-reset-error {
        display: block;

        margin-top: 5px;

        color: #dc2626;

        font-size: 10px;

        font-weight: 600;
    }


    /* =========================================================
       SUBMIT BUTTON
    ========================================================= */

    .auth-reset-btn {
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


    .auth-reset-btn::after {
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


    .auth-reset-btn:hover {
        color: #fff;

        transform: translateY(-2px);

        box-shadow:
            0 14px 25px rgba(37,99,235,.22);
    }


    .auth-reset-btn:hover::after {
        left: 135%;
    }


    .auth-reset-btn:active {
        transform: translateY(0);
    }


    /* =========================================================
       SECURITY
    ========================================================= */

    .auth-reset-security {
        display: flex;

        align-items: center;

        justify-content: center;

        gap: 6px;

        margin-top: 13px;

        color: #a1adbd;

        font-size: 9px;
    }


    .auth-reset-security span:first-child {
        color: #0f766e;

        font-weight: 800;
    }


    /* =========================================================
       ANIMATION
    ========================================================= */

    @keyframes authResetFlow {

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

        .auth-reset-page {
            padding-top: 125px;
            padding-bottom: 25px;
        }

        .auth-reset-shell {
            min-height: 365px;
        }

        .auth-reset-visual {
            padding: 28px 34px;
        }

        .auth-reset-form-panel {
            padding: 25px 36px;
        }

        .auth-reset-heading {
            margin-bottom: 14px;
        }

        .auth-reset-group {
            margin-bottom: 12px;
        }

    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 850px) {

        .auth-reset-page {
            padding-top: 100px;
            padding-bottom: 35px;
        }

        .auth-reset-shell {
            grid-template-columns: 1fr;

            max-width: 520px;

            min-height: auto;
        }

        .auth-reset-visual {
            min-height: 205px;

            padding: 27px 30px;
        }

        .auth-reset-visual-icon {
            width: 50px;
            height: 50px;

            margin-bottom: 13px;

            border-radius: 15px;

            font-size: 21px;
        }

        .auth-reset-visual h1 {
            font-size: 24px;
        }

        .auth-reset-visual p {
            display: none;
        }

        .auth-reset-trust {
            margin-top: 15px;
        }

        .auth-reset-form-panel {
            padding: 27px 30px;
        }

    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 576px) {

        .auth-reset-page {
            min-height: auto;

            padding:
                85px
                13px
                30px;
        }

        .auth-reset-wrapper {
            margin: 0;
        }

        .auth-reset-shell {
            border-radius: 20px;
        }

        .auth-reset-visual {
            min-height: 175px;

            padding: 23px 20px;
        }

        .auth-reset-brand {
            margin-bottom: 14px;

            font-size: 9px;
        }

        .auth-reset-visual h1 {
            font-size: 21px;
        }

        .auth-reset-trust {
            gap: 10px;
        }

        .auth-reset-trust-item {
            font-size: 9px;
        }

        .auth-reset-form-panel {
            padding: 25px 20px;
        }

        .auth-reset-heading h2 {
            font-size: 21px;
        }

    }

</style>


<div class="auth-reset-page">

    <div class="auth-reset-wrapper">

        <div class="auth-reset-shell">


            {{-- =================================================
                 LEFT — CERTIFIED SECURITY PANEL
            ================================================== --}}

            <div class="auth-reset-visual">

                <div class="auth-reset-visual-content">


                    <div class="auth-reset-brand">

                        <span class="auth-reset-brand-dot"></span>

                        Certified Account Recovery

                    </div>


                    <div class="auth-reset-visual-icon">
                        🔐
                    </div>


                    <h1>
                        Create a new secure password
                    </h1>


                    <p>
                        Protect your Certified account with a strong
                        new password and continue your learning journey
                        through a secure and trusted platform.
                    </p>


                    <div class="auth-reset-trust">


                        <div class="auth-reset-trust-item">

                            <span class="auth-reset-check">
                                ✓
                            </span>

                            <strong>
                                Secure
                            </strong>

                        </div>


                        <div class="auth-reset-trust-item">

                            <span class="auth-reset-check">
                                ✓
                            </span>

                            <strong>
                                Protected
                            </strong>

                        </div>


                        <div class="auth-reset-trust-item">

                            <span class="auth-reset-check">
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
                 RIGHT — RESET PASSWORD FORM
            ================================================== --}}

            <div class="auth-reset-form-panel">

                <div class="auth-reset-form">


                    <div class="auth-reset-heading">

                        <h2>
                            {{ __('language.Reset Password') }}
                        </h2>

                        <p>
                            Create a new password for your account.
                        </p>

                    </div>


                    <form
                        method="POST"
                        action="{{ route('password.store') }}"
                    >

                        @csrf


                        {{-- PASSWORD RESET TOKEN --}}

                        <input
                            type="hidden"
                            name="token"
                            value="{{ $request->route('token') }}"
                        >


                        {{-- EMAIL --}}

                        <div class="auth-reset-group">

                            <label
                                for="email"
                                class="auth-reset-label"
                            >
                                {{ __('language.Email Address') }}
                            </label>


                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email', $request->email) }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="example@email.com"
                                class="form-control auth-reset-input @error('email') is-invalid @enderror"
                            >


                            @error('email')

                                <span
                                    class="auth-reset-error"
                                    role="alert"
                                >

                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>

                            @enderror

                        </div>


                        {{-- NEW PASSWORD --}}

                        <div class="auth-reset-group">

                            <label
                                for="password"
                                class="auth-reset-label"
                            >
                                {{ __('language.Password') }}
                            </label>


                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Enter your new password"
                                class="form-control auth-reset-input @error('password') is-invalid @enderror"
                            >


                            @error('password')

                                <span
                                    class="auth-reset-error"
                                    role="alert"
                                >

                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>

                            @enderror

                        </div>


                        {{-- CONFIRM PASSWORD --}}

                        <div class="auth-reset-group">

                            <label
                                for="password_confirmation"
                                class="auth-reset-label"
                            >
                                {{ __('language.Confirm Password') }}
                            </label>


                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your new password"
                                class="form-control auth-reset-input @error('password_confirmation') is-invalid @enderror"
                            >


                            @error('password_confirmation')

                                <span
                                    class="auth-reset-error"
                                    role="alert"
                                >

                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>

                            @enderror

                        </div>


                        {{-- SUBMIT --}}

                        <button
                            type="submit"
                            class="btn auth-reset-btn"
                        >
                            {{ __('language.Reset Password') }}
                        </button>


                        {{-- SECURITY --}}

                        <div class="auth-reset-security">

                            <span>
                                ● Secure Recovery
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