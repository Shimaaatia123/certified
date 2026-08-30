@extends('layouts.app')
@section('title', 'Verify Email')
@section('content')

    <style>
        /* =========================================================
           CERTIFIED AUTH — VERIFY EMAIL
           Premium Compact Layout
           Same Visual System as LOGIN / RESET PASSWORD
           Fully Scoped
        ========================================================= */


        /* =========================================================
           PAGE
        ========================================================= */

        .auth-verify-page {
            position: relative;

            /*
             * Same Navbar separation as Login
             */
            min-height: calc(100vh - 76px);

            padding: 150px 22px 45px;

            display: flex;
            align-items: flex-start;
            justify-content: center;

            overflow: hidden;

            background:
                radial-gradient(circle at 8% 15%,
                    rgba(37, 99, 235, .10),
                    transparent 27%),
                radial-gradient(circle at 92% 85%,
                    rgba(15, 118, 110, .09),
                    transparent 27%),
                linear-gradient(135deg,
                    #f8fbff 0%,
                    #f1f6ff 50%,
                    #f2fcfa 100%);
        }


        /* =========================================================
           AMBIENT LIGHT
        ========================================================= */

        .auth-verify-page::before {
            content: "";

            position: absolute;

            width: 380px;
            height: 380px;

            top: -190px;
            right: -120px;

            border-radius: 50%;

            background:
                radial-gradient(circle,
                    rgba(37, 99, 235, .11),
                    transparent 68%);

            pointer-events: none;
        }


        .auth-verify-page::after {
            content: "";

            position: absolute;

            width: 340px;
            height: 340px;

            bottom: -210px;
            left: -140px;

            border-radius: 50%;

            background:
                radial-gradient(circle,
                    rgba(15, 118, 110, .09),
                    transparent 68%);

            pointer-events: none;
        }


        /* =========================================================
           WRAPPER
        ========================================================= */

        .auth-verify-wrapper {
            position: relative;

            z-index: 2;

            width: 100%;

            max-width: 920px;

            margin: 0 auto;
        }


        /* =========================================================
           MAIN SHELL
        ========================================================= */

        .auth-verify-shell {
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

        .auth-verify-shell::before {
            content: "";

            position: absolute;

            top: 0;
            left: 0;
            right: 0;

            height: 3px;

            background:
                linear-gradient(90deg,
                    #2563eb,
                    #38bdf8,
                    #0f766e,
                    #2563eb);

            background-size: 300% 100%;

            animation:
                authVerifyFlow 7s linear infinite;

            z-index: 10;
        }


        /* =========================================================
           LEFT — CERTIFIED SECURITY PANEL
        ========================================================= */

        .auth-verify-visual {
            position: relative;

            display: flex;

            align-items: center;

            padding: 34px 38px;

            overflow: hidden;

            color: #fff;

            background:
                linear-gradient(145deg,
                    #0f172a 0%,
                    #172554 52%,
                    #064e3b 100%);
        }


        /* =========================================================
           TECH GRID
        ========================================================= */

        .auth-verify-visual::before {
            content: "";

            position: absolute;

            inset: 0;

            opacity: .13;

            background-image:
                linear-gradient(rgba(255, 255, 255, .18) 1px,
                    transparent 1px),
                linear-gradient(90deg,
                    rgba(255, 255, 255, .18) 1px,
                    transparent 1px);

            background-size: 34px 34px;

            pointer-events: none;
        }


        /* =========================================================
           GLOW
        ========================================================= */

        .auth-verify-visual::after {
            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            top: -145px;
            right: -125px;

            border-radius: 50%;

            background:
                radial-gradient(circle,
                    rgba(56, 189, 248, .24),
                    transparent 67%);

            pointer-events: none;
        }


        .auth-verify-visual-content {
            position: relative;

            z-index: 2;

            width: 100%;
        }


        /* =========================================================
           BRAND BADGE
        ========================================================= */

        .auth-verify-brand {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 18px;

            padding: 6px 11px;

            border: 1px solid rgba(255, 255, 255, .13);

            border-radius: 999px;

            background: rgba(255, 255, 255, .065);

            color: rgba(255, 255, 255, .82);

            font-size: 10px;

            font-weight: 700;

            letter-spacing: .65px;

            text-transform: uppercase;
        }


        .auth-verify-brand-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: #34d399;

            box-shadow:
                0 0 0 4px rgba(52, 211, 153, .10),
                0 0 12px rgba(52, 211, 153, .7);
        }


        /* =========================================================
           ICON
        ========================================================= */

        .auth-verify-visual-icon {
            width: 54px;
            height: 54px;

            margin-bottom: 17px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255, 255, 255, .14);

            border-radius: 17px;

            background:
                linear-gradient(135deg,
                    rgba(37, 99, 235, .95),
                    rgba(15, 118, 110, .95));

            box-shadow:
                0 14px 28px rgba(0, 0, 0, .20);

            font-size: 22px;
        }


        /* =========================================================
           LEFT TITLE
        ========================================================= */

        .auth-verify-visual h1 {
            max-width: 350px;

            margin: 0 0 9px;

            color: #fff;

            font-size: 27px;

            font-weight: 800;

            line-height: 1.18;

            letter-spacing: -.6px;
        }


        .auth-verify-visual p {
            max-width: 335px;

            margin: 0;

            color: rgba(255, 255, 255, .62);

            font-size: 12px;

            line-height: 1.65;
        }


        /* =========================================================
           TRUST ROW
        ========================================================= */

        .auth-verify-trust {
            display: flex;

            align-items: center;

            gap: 15px;

            margin-top: 20px;
        }


        .auth-verify-trust-item {
            display: flex;

            align-items: center;

            gap: 5px;

            color: rgba(255, 255, 255, .62);

            font-size: 10px;
        }


        .auth-verify-trust-item strong {
            color: rgba(255, 255, 255, .88);

            font-weight: 700;
        }


        .auth-verify-check {
            color: #34d399;

            font-weight: 900;
        }


        /* =========================================================
           RIGHT — VERIFICATION CONTENT PANEL
        ========================================================= */

        .auth-verify-content-panel {
            display: flex;

            align-items: center;

            padding: 30px 40px;

            background:
                linear-gradient(145deg,
                    rgba(255, 255, 255, .97),
                    rgba(248, 250, 252, .90));
        }


        .auth-verify-content {
            width: 100%;

            max-width: 365px;

            margin: 0 auto;
        }


        /* =========================================================
           HEADING
        ========================================================= */

        .auth-verify-heading {
            margin-bottom: 18px;
        }


        .auth-verify-heading h2 {
            margin: 0;

            color: #0f172a;

            font-size: 23px;

            font-weight: 800;

            letter-spacing: -.4px;
        }


        .auth-verify-heading p {
            margin: 5px 0 0;

            color: #94a3b8;

            font-size: 11px;

            line-height: 1.6;
        }


        /* =========================================================
           INFO MESSAGE
        ========================================================= */

        .auth-verify-message {
            margin-bottom: 17px;

            padding: 13px 14px;

            border: 1px solid rgba(37, 99, 235, .10);

            border-radius: 11px;

            background:
                rgba(37, 99, 235, .045);

            color: #64748b;

            font-size: 11px;

            line-height: 1.7;
        }


        .auth-verify-message strong {
            color: #334155;

            font-weight: 800;
        }


        /* =========================================================
           SUCCESS MESSAGE
        ========================================================= */

        .auth-verify-alert {
            display: flex;

            align-items: flex-start;

            gap: 8px;

            margin-bottom: 17px;

            padding: 11px 13px;

            border: 1px solid rgba(22, 163, 74, .14);

            border-radius: 11px;

            background:
                rgba(22, 163, 74, .07);

            color: #15803d;

            font-size: 10px;

            font-weight: 600;

            line-height: 1.6;
        }


        .auth-verify-alert-icon {
            flex-shrink: 0;

            font-weight: 900;
        }


        /* =========================================================
           ACTION AREA
        ========================================================= */

        .auth-verify-actions {
            display: flex;

            flex-direction: column;

            gap: 10px;
        }


        /* =========================================================
           RESEND BUTTON
        ========================================================= */

        .auth-verify-btn {
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
                linear-gradient(135deg,
                    #2563eb,
                    #0f766e);

            box-shadow:
                0 10px 20px rgba(37, 99, 235, .16);

            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }


        .auth-verify-btn::after {
            content: "";

            position: absolute;

            top: 0;

            left: -110%;

            width: 65%;

            height: 100%;

            background:
                linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, .22),
                    transparent);

            transform: skewX(-20deg);

            transition: left .55s ease;
        }


        .auth-verify-btn:hover {
            color: #fff;

            transform: translateY(-2px);

            box-shadow:
                0 14px 25px rgba(37, 99, 235, .22);
        }


        .auth-verify-btn:hover::after {
            left: 135%;
        }


        .auth-verify-btn:active {
            transform: translateY(0);
        }


        /* =========================================================
           LOGOUT BUTTON
        ========================================================= */

        .auth-verify-logout {
            width: 100%;

            height: 44px;

            border: 1px solid #dbe3ef;

            border-radius: 11px;

            background: #fff;

            color: #64748b;

            font-size: 11px;

            font-weight: 700;

            transition:
                border-color .2s ease,
                color .2s ease,
                background .2s ease,
                transform .2s ease;
        }


        .auth-verify-logout:hover {
            border-color: #cbd5e1;

            color: #0f172a;

            background: #f8fafc;

            transform: translateY(-1px);
        }


        /* =========================================================
           SECURITY FOOTER
        ========================================================= */

        .auth-verify-security {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 6px;

            margin-top: 13px;

            color: #a1adbd;

            font-size: 9px;
        }


        .auth-verify-security span:first-child {
            color: #0f766e;

            font-weight: 800;
        }


        /* =========================================================
           ANIMATION
        ========================================================= */

        @keyframes authVerifyFlow {

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

            .auth-verify-page {
                padding-top: 125px;
                padding-bottom: 25px;
            }

            .auth-verify-shell {
                min-height: 365px;
            }

            .auth-verify-visual {
                padding: 28px 34px;
            }

            .auth-verify-content-panel {
                padding: 25px 36px;
            }

            .auth-verify-heading {
                margin-bottom: 14px;
            }

            .auth-verify-message {
                margin-bottom: 13px;
            }

        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 850px) {

            .auth-verify-page {
                padding-top: 100px;
                padding-bottom: 35px;
            }

            .auth-verify-shell {
                grid-template-columns: 1fr;

                max-width: 520px;

                min-height: auto;
            }

            .auth-verify-visual {
                min-height: 205px;

                padding: 27px 30px;
            }

            .auth-verify-visual-icon {
                width: 50px;
                height: 50px;

                margin-bottom: 13px;

                border-radius: 15px;

                font-size: 21px;
            }

            .auth-verify-visual h1 {
                font-size: 24px;
            }

            .auth-verify-visual p {
                display: none;
            }

            .auth-verify-trust {
                margin-top: 15px;
            }

            .auth-verify-content-panel {
                padding: 27px 30px;
            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 576px) {

            .auth-verify-page {
                min-height: auto;

                padding:
                    85px 13px 30px;
            }

            .auth-verify-wrapper {
                margin: 0;
            }

            .auth-verify-shell {
                border-radius: 20px;
            }

            .auth-verify-visual {
                min-height: 175px;

                padding: 23px 20px;
            }

            .auth-verify-brand {
                margin-bottom: 14px;

                font-size: 9px;
            }

            .auth-verify-visual h1 {
                font-size: 21px;
            }

            .auth-verify-trust {
                gap: 10px;
            }

            .auth-verify-trust-item {
                font-size: 9px;
            }

            .auth-verify-content-panel {
                padding: 25px 20px;
            }

            .auth-verify-heading h2 {
                font-size: 21px;
            }

        }
    </style>


    <div class="auth-verify-page">

        <div class="auth-verify-wrapper">

            <div class="auth-verify-shell">


                {{-- =================================================
                 LEFT — CERTIFIED SECURITY PANEL
            ================================================== --}}

                <div class="auth-verify-visual">

                    <div class="auth-verify-visual-content">


                        <div class="auth-verify-brand">

                            <span class="auth-verify-brand-dot"></span>

                            Certified Account Security

                        </div>


                        <div class="auth-verify-visual-icon">
                            ✉️
                        </div>


                        <h1>
                            Verify your email address
                        </h1>


                        <p>
                            Confirm your email address to secure your
                            Certified account and unlock your complete
                            learning experience.
                        </p>


                        <div class="auth-verify-trust">


                            <div class="auth-verify-trust-item">

                                <span class="auth-verify-check">
                                    ✓
                                </span>

                                <strong>
                                    Secure
                                </strong>

                            </div>


                            <div class="auth-verify-trust-item">

                                <span class="auth-verify-check">
                                    ✓
                                </span>

                                <strong>
                                    Verified
                                </strong>

                            </div>


                            <div class="auth-verify-trust-item">

                                <span class="auth-verify-check">
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
                 RIGHT — VERIFICATION CONTENT
            ================================================== --}}

                <div class="auth-verify-content-panel">

                    <div class="auth-verify-content">


                        <div class="auth-verify-heading">

                            <h2>
                                {{ __('language.Verify Your Email Address') }}
                            </h2>

                            <p>
                                Confirm your email before continuing.
                            </p>

                        </div>


                        <div class="auth-verify-message">

                            {{ __('language.Before proceeding, please check your email for a verification link.') }}

                            <br>

                            <strong>
                                {{ __('language.If you did not receive the email') }}.
                            </strong>

                        </div>


                        @if (session('resent'))
                            <div class="auth-verify-alert">

                                <span class="auth-verify-alert-icon">
                                    ✓
                                </span>

                                <span>
                                    {{ __('language.A fresh verification link has been sent to your email address.') }}
                                </span>

                            </div>
                        @endif


                        <div class="auth-verify-actions">


                            {{-- RESEND VERIFICATION EMAIL --}}

                            <button type="button" class="btn auth-verify-btn">
                                {{ __('language.click here to request another') }}
                            </button>


                            {{-- LOGOUT --}}
                            <button type="button" class="auth-verify-logout">
                                {{ __('language.Log Out') }}
                            </button>


                        </div>


                        {{-- SECURITY --}}

                        <div class="auth-verify-security">

                            <span>
                                ● Secure Verification
                            </span>

                            <span>
                                •
                            </span>

                            Certified Platform

                        </div>


                    </div>

                </div>


            </div>

        </div>

    </div>

@endsection
