@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card shadow-lg border-0">

                    <div class="card-header bg-primary text-white text-center">
                        <i class="fa-solid fa-envelope me-2"></i>
                        {{ __('language.✨Create Contact Message') }}
                    </div>

                    <div class="card-body">

                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf

                            <!-- Name -->
                            <label class="form-label">
                                <i class="fa-solid fa-user text-primary me-2"></i>
                                {{ __('language.Name') }}
                            </label>
                            <input type="text" name="name" class="form-control mb-3" value="{{ old('name') }}">

                            <!-- Email -->
                            <label class="form-label">
                                <i class="fa-solid fa-at text-success me-2"></i>
                                {{ __('language.Email') }}
                            </label>
                            <input type="email" name="email" class="form-control mb-3" value="{{ old('email') }}">

                            <!-- Subject -->
                            <label class="form-label">
                                <i class="fa-solid fa-heading text-warning me-2"></i>
                                {{ __('language.Subject') }}
                            </label>
                            <input type="text" name="subject" class="form-control mb-3" value="{{ old('subject') }}">

                            <!-- Message -->
                            <label class="form-label">
                                <i class="fa-solid fa-message text-info me-2"></i>
                                {{ __('language.Message') }}
                            </label>
                            <textarea name="message" class="form-control mb-3" rows="4">{{ old('message') }}</textarea>

                            <!-- Status -->
                            <label class="form-label">
                                <i class="fa-solid fa-signal text-danger me-2"></i>
                                {{ __('language.Status') }}
                            </label>
                            <select name="status" class="form-control mb-3">
                                <option value="new">{{ __('language.New(✨)') }}</option>
                                <option value="read">{{ __('language.Read🔵') }}</option>
                                <option value="replied">{{ __('language.Replied🌸') }}</option>
                            </select>

                            <!-- Button -->
                            <button class="btn btn-success w-100 py-2">
                                <i class="fa-solid fa-paper-plane text-white me-2"></i>
                                 {{ __('language.Send') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
