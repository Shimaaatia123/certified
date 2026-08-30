@extends('layouts.app')

@section('content')

<style>
    .auth-forgot-page {
        position: relative;
        min-height: calc(100vh - 76px);
        padding: 75px 15px 85px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background:
            radial-gradient(circle at 18% 20%, rgba(37, 99, 235, .12), transparent 30%),
            radial-gradient(circle at 82% 80%, rgba(15, 118, 110, .11), transparent 30%),
            linear-gradient(135deg, #f8fbff, #eef4ff, #f0fdfa);
    }

    .auth-forgot-wrapper {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 520px;
    }

    .auth-forgot-card {
        padding: 38px;
        border: 1px solid rgba(255,255,255,.85);
        border-radius: 26px;
        background: rgba(255,255,255,.9);
        backdrop-filter: blur(18px);
        box-shadow: 0 30px 70px rgba(15,23,42,.12);
    }

    .auth-forgot-icon {
        width: 72px;
        height: 72px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 22px;
        font-size: 29px;
        background: linear-gradient(135deg,#2563eb,#0f766e);
        box-shadow: 0 15px 30px rgba(37,99,235,.2);
    }

    .auth-forgot-title {
        text-align: center;
        color: #0f172a;
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .auth-forgot-description {
        text-align: center;
        color: #64748b;
        font-size: 14px;
        line-height: 1.7;
        margin-bottom: 30px;
    }

    .auth-forgot-label {
        display: block;
        margin-bottom: 8px;
        color: #334155;
        font-size: 14px;
        font-weight: 700;
    }

    .auth-forgot-input {
        height: 52px;
        border-radius: 13px;
        border: 1px solid #dbe3ef;
        background: #f8fafc;
    }

    .auth-forgot-input:focus {
        border-color: #2563eb;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(37,99,235,.1);
    }

    .auth-forgot-btn {
        width: 100%;
        height: 52px;
        margin-top: 22px;
        border: none;
        border-radius: 13px;
        color: #fff;
        font-weight: 800;
        background: linear-gradient(135deg,#2563eb,#0f766e);
        box-shadow: 0 12px 25px rgba(37,99,235,.18);
        transition: .25s ease;
    }

    .auth-forgot-btn:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 17px 30px rgba(37,99,235,.25);
    }

    .auth-forgot-security {
        margin-top: 22px;
        padding-top: 18px;
        border-top: 1px solid #e2e8f0;
        text-align: center;
        color: #94a3b8;
        font-size: 12px;
    }

    .auth-forgot-security strong {
        color: #0f766e;
    }

    @media (max-width:767px) {
        .auth-forgot-page {
            min-height: auto;
            padding: 45px 15px 60px;
        }

        .auth-forgot-card {
            padding: 28px 22px;
        }

        .auth-forgot-title {
            font-size: 24px;
        }
    }
</style>

<div class="auth-forgot-page">

    <div class="auth-forgot-wrapper">

        <div class="auth-forgot-card">

            <div class="auth-forgot-icon">
                🔑
            </div>

            <h4 class="auth-forgot-title">
                {{ __('language.Forgot Your Password?') }}
            </h4>

            <p class="auth-forgot-description">
                {{ __('language.Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>

            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <label for="email" class="auth-forgot-label">
                    {{ __('language.Email Address') }}
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="example@email.com"
                    class="form-control auth-forgot-input @error('email') is-invalid @enderror"
                >

                @error('email')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button type="submit" class="btn auth-forgot-btn">
                    {{ __('language.Email Password Reset Link') }}
                </button>

            </form>

            <div class="auth-forgot-security">
                <strong>● Secure Recovery</strong>
                &nbsp; • &nbsp;
                Your account remains protected
            </div>

        </div>

    </div>

</div>

@endsection