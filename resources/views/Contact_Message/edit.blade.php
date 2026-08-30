@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card shadow-lg border-0">

                    <div class="card-header bg-warning text-dark text-center">
                        <i class="fa-solid fa-pen-to-square me-2"></i>
                        {{ __('language.Edit Contact Message #') }}{{ $contact->id }}
                    </div>

                    <div class="card-body">

                        <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Name -->
                            <label class="form-label">
                                <i class="fa-solid fa-user text-primary me-2"></i>
                                {{ __('language.Name') }}
                            </label>
                            <input type="text" name="name" value="{{ $contact->name }}" class="form-control mb-3">

                            <!-- Email -->
                            <label class="form-label">
                                <i class="fa-solid fa-envelope text-success me-2"></i>
                                {{ __('language.Email') }}
                            </label>
                            <input type="email" name="email" value="{{ $contact->email }}" class="form-control mb-3">

                            <!-- Subject -->
                            <label class="form-label">
                                <i class="fa-solid fa-tag text-warning me-2"></i>
                                {{ __('language.Subject') }}
                            </label>
                            <input type="text" name="subject" value="{{ $contact->subject }}" class="form-control mb-3">

                            <!-- Message -->
                            <label class="form-label">
                                <i class="fa-solid fa-message text-info me-2"></i>
                                {{ __('language.Message') }}
                            </label>
                            <textarea name="message" class="form-control mb-3">{{ $contact->message }}</textarea>

                            <!-- Status -->
                            <label class="form-label">
                                <i class="fa-solid fa-signal text-danger me-2"></i>
                                {{ __('language.Status') }}
                            </label>
                            <select name="status" class="form-control mb-3">
                                <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>
                                    {{ __('language.New(✨)') }}
                                </option>
                                <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>
                                    {{ __('language.Read🔵') }}
                                </option>
                                <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>
                                    {{ __('language.Replied🌸') }}
                                </option>
                            </select>

                            <!-- Button -->
                            <button class="btn btn-primary w-100 py-2">
                                <i class="fa-solid fa-floppy-disk me-2"></i>
                                {{ __('language.Update') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
