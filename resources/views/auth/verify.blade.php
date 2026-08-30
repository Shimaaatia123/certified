@extends('layouts.app')

@section('content')
    <style>
        /* =========================================================
           CERTIFIED AUTH — EMAIL VERIFICATION
           Scoped only to .auth-verify-page
        ========================================================= */

        .auth-verify-page {
            position: relative;
            min-height: calc(100vh - 76px);
            padding: 38px 15px 45px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            overflow: hidden;

            background:
                radial-gradient(circle at 15% 20%,
                    rgba(37, 99, 235, .10),
                    transparent 30%),
                radial-gradient(circle at 85% 80%,
                    rgba(15, 118, 110, .10),
                    transparent 30%),
                linear-gradient(135deg,
                    #f8fbff 0%,
                    #eef4ff 50%,
                    #f0fdfa 100%);
        }

        /* Decorative Glow */

        .auth-verify-page::before,
        .auth-verify-page::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(2px);
        }

        .auth-verify-page::before {
            width: 260px;
            height: 260px;
            top: -120px;
            left: -100px;
            background: rgba(37, 99, 235, .07);
        }

        .auth-verify-page::after {
            width: 300px;
            height: 300px;
            right: -120px;
            bottom: -150px;
            background: rgba(15, 118, 110, .07);
        }

        /* Wrapper */

        .auth-verify-wrapper {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 620px;
        }

        /* Main Card */

        .auth-verify-card {
            position: relative;
            overflow: hidden;

            border: 1px solid rgba(255, 255, 255, .85);
            border-radius: 24px;

            background: rgba(255, 255, 255, .90);

            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);

            box-shadow:
                0 25px 55px rgba(15, 23, 42, .11),
                0 8px 22px rgba(37, 99, 235, .05);
        }

        /* Animated Top Line */

        .auth-verify-card::before {
            content: "";
            position: absolute;

            top: 0;
            left: 0;
            right: 0;

            height: 4px;

            background:
                linear-gradient(90deg,
                    #2563eb,
                    #0f766e,
                    #2563eb);

            background-size: 200% 100%;

            animation: authVerifyGradient 5s linear infinite;
        }

        /* Header */

        .auth-verify-header {
            padding: 28px 30px 18px;
            text-align: center;
        }

        /* Icon */

        .auth-verify-icon {
            width: 64px;
            height: 64px;

            margin: 0 auto 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 19px;

            color: #ffffff;
            font-size: 26px;

            background:
                linear-gradient(135deg,
                    #2563eb,
                    #0f766e);

            box-shadow:
                0 12px 28px rgba(37, 99, 235, .20);
        }

        /* Title */

        .auth-verify-title {
            margin: 0;

            color: #0f172a;

            font-size: 25px;
            font-weight: 800;

            letter-spacing: -.4px;
        }

        /* Description */

        .auth-verify-description {
            max-width: 500px;

            margin: 8px auto 0;

            color: #64748b;

            font-size: 14px;
            line-height: 1.65;
        }

        /* Success Message */

        .auth-verify-success {
            margin: 8px 30px 0;

            padding: 12px 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            border: 1px solid rgba(22, 163, 74, .16);
            border-radius: 12px;

            background: rgba(22, 163, 74, .07);

            color: #15803d;

            font-size: 13px;
            font-weight: 600;

            text-align: center;
        }

        .auth-verify-success-icon {
            display: inline-flex;

            width: 20px;
            height: 20px;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #16a34a;
            color: #ffffff;

            font-size: 11px;
            font-weight: 800;
        }

        /* Body */

        .auth-verify-body {
            padding: 20px 30px 28px;
        }

        /* Info Box */

        .auth-verify-info {
            position: relative;

            padding: 17px 18px;

            border: 1px solid #e2e8f0;
            border-radius: 14px;

            background: rgba(248, 250, 252, .75);

            color: #64748b;

            font-size: 13px;
            line-height: 1.7;

            text-align: center;
        }

        .auth-verify-info strong {
            color: #334155;
            font-weight: 700;
        }

        /* Actions */

        .auth-verify-actions {
            margin-top: 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 12px;
        }

        /* Resend Button */

        .auth-verify-resend {
            min-width: 230px;
            height: 48px;

            border: none;
            border-radius: 12px;

            color: #ffffff;

            font-size: 13px;
            font-weight: 800;

            background:
                linear-gradient(135deg,
                    #2563eb,
                    #0f766e);

            box-shadow:
                0 10px 22px rgba(37, 99, 235, .18);

            transition: .25s ease;
        }

        .auth-verify-resend:hover {
            color: #ffffff;

            transform: translateY(-2px);

            box-shadow:
                0 14px 27px rgba(37, 99, 235, .25);
        }

        .auth-verify-resend:active {
            transform: translateY(0);
        }

        /* Logout */

        .auth-verify-logout {
            height: 48px;

            padding: 0 20px;

            border: 1px solid #dbe3ef;
            border-radius: 12px;

            background: #ffffff;

            color: #64748b;

            font-size: 13px;
            font-weight: 700;

            transition: .25s ease;
        }

        .auth-verify-logout:hover {
            background: #f8fafc;

            color: #0f172a;

            border-color: #cbd5e1;
        }

        /* Footer */

        .auth-verify-security {
            margin-top: 18px;

            text-align: center;

            color: #94a3b8;

            font-size: 11px;
        }

        .auth-verify-security span {
            color: #0f766e;
            font-weight: 700;
        }

        /* Animation */

        @keyframes authVerifyGradient {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 200% 50%;
            }
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 767px) {

            .auth-verify-page {
                min-height: auto;

                padding:
                    28px 15px 40px;
            }

            .auth-verify-header {
                padding:
                    25px 20px 15px;
            }

            .auth-verify-body {
                padding:
                    16px 20px 24px;
            }

            .auth-verify-title {
                font-size: 22px;
            }

            .auth-verify-description {
                font-size: 13px;
            }

            .auth-verify-success {
                margin-left: 20px;
                margin-right: 20px;
            }

            .auth-verify-actions {
                flex-direction: column;
            }

            .auth-verify-resend,
            .auth-verify-logout {
                width: 100%;
            }
        }
    </style>


    <div class="auth-verify-page">

        <div class="auth-verify-wrapper">

            <div class="auth-verify-card">

                {{-- Header --}}

                <div class="auth-verify-header">

                    <div class="auth-verify-icon">
                        ✉
                    </div>

                    <h4 class="auth-verify-title">
                        {{ __('language.Verify Your Email Address') }}
                    </h4>

                    <p class="auth-verify-description">
                        {{ __('language.Before proceeding, please check your email for a verification link.') }}
                    </p>

                </div>


                {{-- Success Message --}}

                @if (session('resent'))
                    <div class="auth-verify-success">

                        <span class="auth-verify-success-icon">
                            ✓
                        </span>

                        <span>
                            {{ __('language.A fresh verification link has been sent to your email address.') }}
                        </span>

                    </div>
                @endif


                {{-- Body --}}

                <div class="auth-verify-body">

                    <div class="auth-verify-info">

                        {{ __('language.If you did not receive the email') }}

                        <strong>
                            {{ __('language.click here to request another') }}
                        </strong>

                    </div>


                    {{-- Actions --}}

                    <div class="auth-verify-actions">

                        <form method="POST" action="{{ route('verification.resend') }}">

                            @csrf

                            <button type="submit" class="btn auth-verify-resend">
                                {{ __('language.click here to request another') }}
                            </button>

                        </form>


                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button type="submit" class="auth-verify-logout">
                                {{ __('language.Log Out') }}
                            </button>

                        </form>

                    </div>


                    <div class="auth-verify-security">

                        <span>● Secure Verification</span>

                        &nbsp; • &nbsp;

                        Certified Platform

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
