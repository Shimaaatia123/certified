@extends('layouts.app')
@section('title', 'Register')
@section('content')

<style>
    /* =========================================================
       CERTIFIED AUTH — REGISTER
       Premium Wide Layout
       Horizontal Glass Card
       No Page Scroll
       Fully Scoped — Navbar Safe
    ========================================================= */

    .auth-register-page {
        position: relative;

        min-height: calc(100vh - 76px);

        /*
        Large but controlled navbar clearance
        */
        padding: 105px 20px 35px;

        display: flex;
        align-items: center;
        justify-content: center;

        overflow: hidden;

        background:
            radial-gradient(
                circle at 8% 20%,
                rgba(37, 99, 235, .12),
                transparent 28%
            ),
            radial-gradient(
                circle at 92% 80%,
                rgba(15, 118, 110, .12),
                transparent 30%
            ),
            linear-gradient(
                135deg,
                #f8fbff 0%,
                #eef4ff 50%,
                #f0fdfa 100%
            );

        isolation: isolate;
    }


    /* =========================================================
       BACKGROUND GRID
    ========================================================= */

    .auth-register-page::before {
        content: "";

        position: absolute;
        inset: 0;

        background-image:
            linear-gradient(
                rgba(37, 99, 235, .035) 1px,
                transparent 1px
            ),
            linear-gradient(
                90deg,
                rgba(37, 99, 235, .035) 1px,
                transparent 1px
            );

        background-size: 42px 42px;

        mask-image:
            linear-gradient(
                to bottom,
                transparent,
                black 20%,
                black 80%,
                transparent
            );

        pointer-events: none;

        z-index: -3;
    }


    /* =========================================================
       BACKGROUND GLOW
    ========================================================= */

    .auth-register-page::after {
        content: "";

        position: absolute;

        width: 480px;
        height: 480px;

        left: -260px;
        top: 15%;

        border-radius: 50%;

        background:
            radial-gradient(
                circle,
                rgba(37, 99, 235, .12),
                transparent 70%
            );

        filter: blur(8px);

        pointer-events: none;

        z-index: -2;

        animation: authRegisterGlow 8s ease-in-out infinite;
    }


    /* =========================================================
       WRAPPER
    ========================================================= */

    .auth-register-wrapper {
        position: relative;

        width: 100%;
        max-width: 1040px;

        z-index: 5;

        animation:
            authRegisterAppear .7s
            cubic-bezier(.22, 1, .36, 1)
            both;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .auth-register-card {
        position: relative;

        display: grid;

        grid-template-columns: 34% 66%;

        min-height: 435px;

        overflow: hidden;

        border:
            1px solid
            rgba(255, 255, 255, .85);

        border-radius: 28px;

        background:
            rgba(255, 255, 255, .88);

        backdrop-filter: blur(22px);
        -webkit-backdrop-filter: blur(22px);

        box-shadow:
            0 30px 75px rgba(15, 23, 42, .13),
            0 10px 30px rgba(37, 99, 235, .06),
            inset 0 1px 0 rgba(255, 255, 255, .95);

        transition:
            transform .3s ease,
            box-shadow .3s ease;
    }


    .auth-register-card:hover {
        transform: translateY(-3px);

        box-shadow:
            0 38px 85px rgba(15, 23, 42, .16),
            0 12px 35px rgba(37, 99, 235, .08),
            inset 0 1px 0 rgba(255, 255, 255, .95);
    }


    /* =========================================================
       PREMIUM TOP LINE
    ========================================================= */

    .auth-register-card::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;

        width: 100%;
        height: 4px;

        background:
            linear-gradient(
                90deg,
                #2563eb,
                #06b6d4,
                #0f766e,
                #2563eb
            );

        background-size: 300% 100%;

        animation:
            authRegisterGradient 6s linear infinite;

        z-index: 10;
    }


    /* =========================================================
       LEFT PANEL
    ========================================================= */

    .auth-register-intro {
        position: relative;

        display: flex;
        flex-direction: column;

        justify-content: center;

        padding: 40px 35px;

        overflow: hidden;

        background:
            linear-gradient(
                145deg,
                rgba(239, 246, 255, .9),
                rgba(240, 253, 250, .72)
            );

        border-right:
            1px solid
            rgba(226, 232, 240, .8);
    }


    .auth-register-intro::before {
        content: "";

        position: absolute;

        width: 260px;
        height: 260px;

        top: -130px;
        left: -110px;

        border-radius: 50%;

        background:
            radial-gradient(
                circle,
                rgba(37, 99, 235, .13),
                transparent 70%
            );

        pointer-events: none;
    }


    .auth-register-intro::after {
        content: "";

        position: absolute;

        width: 230px;
        height: 230px;

        bottom: -130px;
        right: -120px;

        border-radius: 50%;

        background:
            radial-gradient(
                circle,
                rgba(15, 118, 110, .12),
                transparent 70%
            );

        pointer-events: none;
    }


    /* =========================================================
       ICON
    ========================================================= */

    .auth-register-icon {
        position: relative;

        width: 66px;
        height: 66px;

        margin-bottom: 20px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 20px;

        color: #fff;

        font-size: 27px;
        font-weight: 800;

        background:
            linear-gradient(
                135deg,
                #2563eb,
                #0f766e
            );

        box-shadow:
            0 15px 32px rgba(37, 99, 235, .22),
            inset 0 1px 1px rgba(255, 255, 255, .3);

        transform: rotate(-2deg);

        animation:
            authRegisterIconFloat 4s ease-in-out infinite;
    }


    .auth-register-icon::before {
        content: "";

        position: absolute;

        inset: -7px;

        border:
            1px solid
            rgba(37, 99, 235, .13);

        border-radius: 24px;

        animation:
            authRegisterRing 3s ease-in-out infinite;
    }


    .auth-register-icon::after {
        content: "";

        position: absolute;

        width: 10px;
        height: 10px;

        top: -4px;
        right: -3px;

        border-radius: 50%;

        background: #22c55e;

        border: 3px solid #fff;
    }


    /* =========================================================
       INTRO TEXT
    ========================================================= */

    .auth-register-intro h4 {
        position: relative;

        margin: 0;

        color: #0f172a;

        font-size: 28px;
        font-weight: 850;

        line-height: 1.15;

        letter-spacing: -.7px;
    }


    .auth-register-intro p {
        position: relative;

        margin: 11px 0 0;

        max-width: 260px;

        color: #64748b;

        font-size: 13px;
        line-height: 1.7;
    }


    /* =========================================================
       SECURITY STATUS
    ========================================================= */

    .auth-register-security {
        position: relative;

        display: flex;
        align-items: center;
        gap: 8px;

        margin-top: 25px;

        color: #475569;

        font-size: 10px;
        font-weight: 800;

        letter-spacing: .5px;
        text-transform: uppercase;
    }


    .auth-register-security-dot {
        width: 7px;
        height: 7px;

        flex-shrink: 0;

        border-radius: 50%;

        background: #22c55e;

        box-shadow:
            0 0 0 4px rgba(34, 197, 94, .08),
            0 0 12px rgba(34, 197, 94, .3);

        animation:
            authRegisterPulse 2s ease-in-out infinite;
    }


    /* =========================================================
       RIGHT FORM AREA
    ========================================================= */

    .auth-register-form-area {
        position: relative;

        padding: 37px 42px 35px;

        display: flex;
        flex-direction: column;
        justify-content: center;
    }


    .auth-register-form-title {
        margin-bottom: 22px;
    }


    .auth-register-form-title h5 {
        margin: 0;

        color: #0f172a;

        font-size: 18px;
        font-weight: 850;
    }


    .auth-register-form-title p {
        margin: 5px 0 0;

        color: #94a3b8;

        font-size: 11px;
    }


    /* =========================================================
       FORM GRID
    ========================================================= */

    .auth-register-form-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 17px 18px;
    }


    .auth-register-group {
        margin: 0;
    }


    .auth-register-group.full {
        grid-column: 1 / -1;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .auth-register-label {
        display: flex;
        align-items: center;
        gap: 6px;

        margin-bottom: 7px;

        color: #334155;

        font-size: 12px;
        font-weight: 800;
    }


    .auth-register-label::before {
        content: "";

        width: 3px;
        height: 12px;

        border-radius: 10px;

        background:
            linear-gradient(
                180deg,
                #2563eb,
                #0f766e
            );
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .auth-register-input {
        width: 100%;

        height: 47px;

        border:
            1px solid
            #dbe3ef;

        border-radius: 12px;

        background:
            linear-gradient(
                180deg,
                #f9fbfd,
                #f6f9fc
            );

        color: #0f172a;

        padding: 0 14px;

        font-size: 13px;
        font-weight: 500;

        transition:
            border-color .25s ease,
            background .25s ease,
            box-shadow .25s ease,
            transform .25s ease;
    }


    .auth-register-input::placeholder {
        color: #a5b0bf;

        font-size: 12px;
    }


    .auth-register-input:hover {
        border-color: #c7d4e5;

        background: #fff;
    }


    .auth-register-input:focus {
        border-color: #2563eb;

        background: #fff;

        outline: none;

        box-shadow:
            0 0 0 4px rgba(37, 99, 235, .08),
            0 7px 18px rgba(37, 99, 235, .05);

        transform: translateY(-1px);
    }


    .auth-register-input.is-invalid {
        border-color: #ef4444;
    }


    /* =========================================================
       VALIDATION
    ========================================================= */

    .auth-register-form-area .invalid-feedback {
        margin-top: 5px;

        color: #dc2626;

        font-size: 10px;
        font-weight: 600;
    }


    /* =========================================================
       PASSWORD HINT
    ========================================================= */

    .auth-register-password-note {
        margin-top: 5px;

        color: #94a3b8;

        font-size: 9px;
        font-weight: 600;
    }


    /* =========================================================
       BUTTON
    ========================================================= */

    .auth-register-btn {
        position: relative;

        width: 100%;
        height: 49px;

        margin-top: 20px;

        overflow: hidden;

        border: 0;

        border-radius: 12px;

        color: #fff;

        font-size: 13px;
        font-weight: 850;

        letter-spacing: .15px;

        background:
            linear-gradient(
                135deg,
                #2563eb 0%,
                #1d4ed8 40%,
                #0f766e 100%
            );

        box-shadow:
            0 12px 25px rgba(37, 99, 235, .18),
            inset 0 1px 1px rgba(255, 255, 255, .25);

        transition:
            transform .25s ease,
            box-shadow .25s ease;
    }


    .auth-register-btn::before {
        content: "";

        position: absolute;

        top: 0;
        left: -120%;

        width: 75%;
        height: 100%;

        background:
            linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, .22),
                transparent
            );

        transform: skewX(-20deg);

        transition: left .65s ease;
    }


    .auth-register-btn:hover {
        color: #fff;

        transform: translateY(-2px);

        box-shadow:
            0 16px 32px rgba(37, 99, 235, .25),
            inset 0 1px 1px rgba(255, 255, 255, .3);
    }


    .auth-register-btn:hover::before {
        left: 140%;
    }


    .auth-register-btn:active {
        transform: translateY(0);
    }


    /* =========================================================
       BOTTOM NOTE
    ========================================================= */

    .auth-register-note {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        margin-top: 13px;

        color: #94a3b8;

        font-size: 9px;
        font-weight: 600;

        text-align: center;
    }


    .auth-register-note span:first-child {
        color: #0f766e;

        font-weight: 800;
    }


    .auth-register-note-divider {
        color: #cbd5e1;
    }


    /* =========================================================
       DECORATIVE TECH DOTS
    ========================================================= */

    .auth-register-tech-dot {
        position: absolute;

        width: 5px;
        height: 5px;

        border-radius: 50%;

        background: #2563eb;

        box-shadow:
            0 0 0 5px rgba(37, 99, 235, .06),
            0 0 15px rgba(37, 99, 235, .25);

        pointer-events: none;
    }


    .auth-register-tech-dot.one {
        top: 16%;
        left: -25px;
    }


    .auth-register-tech-dot.two {
        bottom: 18%;
        right: -25px;

        background: #0f766e;

        box-shadow:
            0 0 0 5px rgba(15, 118, 110, .06),
            0 0 15px rgba(15, 118, 110, .25);
    }


    /* =========================================================
       ANIMATIONS
    ========================================================= */

    @keyframes authRegisterAppear {

        from {
            opacity: 0;

            transform:
                translateY(25px)
                scale(.985);
        }

        to {
            opacity: 1;

            transform:
                translateY(0)
                scale(1);
        }
    }


    @keyframes authRegisterGradient {

        0% {
            background-position: 0% 50%;
        }

        100% {
            background-position: 300% 50%;
        }
    }


    @keyframes authRegisterIconFloat {

        0%,
        100% {
            transform:
                translateY(0)
                rotate(-2deg);
        }

        50% {
            transform:
                translateY(-5px)
                rotate(1deg);
        }
    }


    @keyframes authRegisterRing {

        0%,
        100% {
            transform: scale(1);

            opacity: .45;
        }

        50% {
            transform: scale(1.06);

            opacity: .85;
        }
    }


    @keyframes authRegisterPulse {

        0%,
        100% {
            opacity: 1;
            transform: scale(1);
        }

        50% {
            opacity: .55;
            transform: scale(.8);
        }
    }


    @keyframes authRegisterGlow {

        0%,
        100% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(45px, 25px);
        }
    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 991px) {

        .auth-register-page {
            padding:
                95px
                20px
                30px;
        }


        .auth-register-wrapper {
            max-width: 850px;
        }


        .auth-register-card {
            grid-template-columns: 31% 69%;

            min-height: 430px;
        }


        .auth-register-intro {
            padding: 30px;
        }


        .auth-register-form-area {
            padding:
                32px
                30px;
        }
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 767px) {

        .auth-register-page {
            min-height: auto;

            padding:
                100px
                15px
                60px;

            overflow: visible;
        }


        .auth-register-card {
            display: block;

            min-height: auto;

            border-radius: 24px;
        }


        .auth-register-intro {
            display: none;
        }


        .auth-register-form-area {
            padding:
                35px
                24px
                30px;
        }


        .auth-register-form-grid {
            grid-template-columns: 1fr;

            gap: 17px;
        }


        .auth-register-group.full {
            grid-column: auto;
        }


        .auth-register-tech-dot {
            display: none;
        }
    }


    /* =========================================================
       SMALL MOBILE
    ========================================================= */

    @media (max-width: 420px) {

        .auth-register-page {
            padding-top: 90px;
        }


        .auth-register-form-area {
            padding:
                30px
                18px
                25px;
        }


        .auth-register-form-title h5 {
            font-size: 17px;
        }


        .auth-register-input {
            height: 48px;
        }


        .auth-register-btn {
            height: 50px;
        }
    }


    /* =========================================================
       REDUCED MOTION
    ========================================================= */

    @media (prefers-reduced-motion: reduce) {

        .auth-register-card,
        .auth-register-wrapper,
        .auth-register-icon,
        .auth-register-page::after,
        .auth-register-card::before,
        .auth-register-icon::before,
        .auth-register-security-dot {
            animation: none !important;

            transition: none !important;
        }
    }

</style>


<div class="auth-register-page">

    <div class="auth-register-wrapper">

        <span class="auth-register-tech-dot one"></span>
        <span class="auth-register-tech-dot two"></span>


        <div class="auth-register-card">


            {{-- =================================================
                 LEFT — INTRO
            ================================================= --}}

            <div class="auth-register-intro">

                <div class="auth-register-icon">
                    ✦
                </div>


                <h4>
                    {{ __('language.Register') }}
                </h4>


                <p>
                    {{ __('language.Create your account and get started') }}
                </p>


                <div class="auth-register-security">

                    <span class="auth-register-security-dot"></span>

                    Secure Account Registration

                </div>

            </div>


            {{-- =================================================
                 RIGHT — FORM
            ================================================= --}}

            <div class="auth-register-form-area">


                <div class="auth-register-form-title">

                    <h5>
                        Create your Certified account
                    </h5>

                    <p>
                        Complete the information below to get started.
                    </p>

                </div>


                <form
                    method="POST"
                    action="{{ route('register') }}"
                >

                    @csrf


                    <div class="auth-register-form-grid">


                        {{-- =================================================
                             NAME
                        ================================================= --}}

                        <div class="auth-register-group">

                            <label
                                for="name"
                                class="auth-register-label"
                            >
                                {{ __('language.Name') }}
                            </label>


                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                autofocus
                                placeholder="Enter your name"
                                class="form-control auth-register-input @error('name') is-invalid @enderror"
                            >


                            @error('name')

                                <span class="invalid-feedback d-block">

                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>

                            @enderror

                        </div>


                        {{-- =================================================
                             EMAIL
                        ================================================= --}}

                        <div class="auth-register-group">

                            <label
                                for="email"
                                class="auth-register-label"
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
                                placeholder="example@email.com"
                                class="form-control auth-register-input @error('email') is-invalid @enderror"
                            >


                            @error('email')

                                <span class="invalid-feedback d-block">

                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>

                            @enderror

                        </div>


                        {{-- =================================================
                             PASSWORD
                        ================================================= --}}

                        <div class="auth-register-group">

                            <label
                                for="password"
                                class="auth-register-label"
                            >
                                {{ __('language.Password') }}
                            </label>


                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Enter your password"
                                class="form-control auth-register-input @error('password') is-invalid @enderror"
                            >


                            @error('password')

                                <span class="invalid-feedback d-block">

                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>

                            @enderror

                        </div>


                        {{-- =================================================
                             CONFIRM PASSWORD
                        ================================================= --}}

                        <div class="auth-register-group">

                            <label
                                for="password-confirm"
                                class="auth-register-label"
                            >
                                {{ __('language.Confirm Password') }}
                            </label>


                            <input
                                id="password-confirm"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your password"
                                class="form-control auth-register-input"
                            >

                        </div>


                    </div>


                    {{-- =================================================
                         BUTTON
                    ================================================= --}}

                    <button
                        type="submit"
                        class="btn auth-register-btn"
                    >
                        {{ __('language.Register') }}
                    </button>


                    {{-- =================================================
                         SECURITY NOTE
                    ================================================= --}}

                    <div class="auth-register-note">

                        <span>
                            Secure Registration
                        </span>

                        <span class="auth-register-note-divider">
                            •
                        </span>

                        <span>
                            Certified Platform
                        </span>

                    </div>


                </form>

            </div>

        </div>

    </div>

</div>

@endsection