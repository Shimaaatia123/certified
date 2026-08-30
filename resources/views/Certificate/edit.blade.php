@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-warning text-dark text-center">
                        <i class="fa-solid fa-pen-to-square me-2"></i>
                        {{ __('language.Edit Certificate #') }}{{ $certificate->id }}
                    </div>

                    <div class="card-body">

                        <form action="{{ route('certificates.update', $certificate->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- User ID -->
                            <label class="form-label">
                                <i class="fa-solid fa-user text-primary me-2"></i>
                                {{ __('language.User ID') }}
                            </label>
                            <input type="number" name="user_id" value="{{ $certificate->user_id }}"
                                class="form-control mb-3">

                            <!-- Course ID -->
                            <label class="form-label">
                                <i class="fa-solid fa-book text-success me-2"></i>
                                {{ __('language.Course ID') }}
                            </label>
                            <input type="number" name="course_id" value="{{ $certificate->course_id }}"
                                class="form-control mb-3">

                            <!-- Certificate Code -->
                            <label class="form-label">
                                <i class="fa-solid fa-barcode text-warning me-2"></i>
                                {{ __('language.Certificate Code') }}
                            </label>
                            <input type="text" name="certificate_code" value="{{ $certificate->certificate_code }}"
                                class="form-control mb-3">

                            <!-- Issue Date -->
                            <label class="form-label">
                                <i class="fa-solid fa-calendar text-info me-2"></i>
                                {{ __('language.Issue Date') }}
                            </label>
                            <input type="date" name="issue_date" value="{{ $certificate->issue_date }}"
                                class="form-control mb-3">

                            <!-- Status -->
                            <label class="form-label">
                                <i class="fa-solid fa-signal text-danger me-2"></i>
                                {{ __('language.Status') }}
                            </label>
                            <select name="status" class="form-control mb-3">
                                <option value="valid" {{ $certificate->status == 'valid' ? 'selected' : '' }}>
                                    <i class="fa-solid fa-circle-check"></i>
                                    {{ __('language.Valid') }}
                                </option>

                                <option value="revoked" {{ $certificate->status == 'revoked' ? 'selected' : '' }}>
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    {{ __('language.Revoked') }}
                                </option>
                            </select>

                            <!-- Button -->
                            <button class="btn btn-primary w-100 py-2">
                                <i class="fa-solid fa-floppy-disk me-2"></i>
                                {{ __('language.Update Certificate') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
