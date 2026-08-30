@extends('layouts.app')
@section('title', 'Confirm Password | Certified')
@section('content')

    <style>
        .auth-confirm-page {
            position: relative;
            min-height: calc(100vh - 76px);
            padding: 80px 15px 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background:
                radial-gradient(circle at 15% 20%, rgba(37, 99, 235, .11), transparent 30%),
                radial-gradient(circle at 85% 80%, rgba(15, 118, 110, .12), transparent 30%),
                linear-gradient(135deg, #f8fbff, #eef4ff, #f0fdfa);
        }

        .auth-confirm-wrapper {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 500px;
        }

        .auth-confirm-card {
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, .85);
            border-radius: 27px;
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(18px);
            box-shadow: 0 30px 70px rgba(15, 23, 42, .12);
        }

        .auth-confirm-icon {
            width: 72px;
            height: 72px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 22px;
            font-size: 29px;
            background: linear-gradient(135deg, #2563eb, #0f766e);
            box-shadow: 0 15px 32px rgba(37, 99, 235, .2);
        }

        .auth-confirm-title {
            margin: 0 0 12px;
            text-align: center;
            color: #0f172a;
            font-size: 27px;
            font-weight: 800;
        }

        .auth-confirm-text {
            margin: 0 0 28px;
            text-align: center;
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
        }

        .auth-confirm-label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 14px;
            font-weight: 700;
        }

        .auth-confirm-input {
            height: 52px;
            border-radius: 13px;
            border: 1px solid #dbe3ef;
            background: #f8fafc;
        }

        .auth-confirm-input:focus {
            border-color: #2563eb;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .1);
        }

        .auth-confirm-btn {
            width: 100%;
            height: 52px;
            margin-top: 22px;
            border: none;
            border-radius: 13px;
            color: #fff;
            font-weight: 800;
            background: linear-gradient(135deg, #2563eb, #0f766e);
            box-shadow: 0 12px 25px rgba(37, 99, 235, .18);
            transition: .25s ease;
        }

        .auth-confirm-btn:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(37, 99, 235, .25);
        }

        .auth-confirm-security {
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
        }

        .auth-confirm-security strong {
            color: #0f766e;
        }

        @media(max-width:767px) {
            .auth-confirm-page {
                min-height: auto;
                padding: 45px 15px 60px;
            }

            .auth-confirm-card {
                padding: 30px 22px;
            }

            .auth-confirm-title {
                font-size: 24px;
            }
        }
    </style>

    <div class="auth-confirm-page">

        <div class="auth-confirm-wrapper">

            <div class="auth-confirm-card">

                <div class="auth-confirm-icon">
                    🔒
                </div>

                <h4 class="auth-confirm-title">
                    {{ __('language.Confirm') }}
                </h4>

                <p class="auth-confirm-text">
                    {{ __('language.This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <label for="password" class="auth-confirm-label">
                        {{ __('language.Password') }}
                    </label>

                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="form-control auth-confirm-input @error('password') is-invalid @enderror">

                    @error('password')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="btn auth-confirm-btn">
                        {{ __('language.Confirm') }}
                    </button>

                </form>

                <div class="auth-confirm-security">
                    <strong>● Protected Area</strong>
                    &nbsp; • &nbsp;
                    Certified Security
                </div>

            </div>

        </div>

    </div>

@endsection
