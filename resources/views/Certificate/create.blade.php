@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-success text-white text-center">
                        <i class="fa-solid fa-certificate me-2"></i>
                        {{ __('language.✨Create Certificate') }}
                    </div>

                    <div class="card-body">

                        <form action="{{ route('certificates.store') }}" method="POST">
                            @csrf

                            <label><i class="fa-solid fa-user"></i> {{ __('language.User ID') }}</label>
                            <input type="number" name="user_id" class="form-control mb-3">

                            <label><i class="fa-solid fa-book"></i> {{ __('language.Course ID') }}</label>
                            <input type="number" name="course_id" class="form-control mb-3">

                            <label><i class="fa-solid fa-key"></i> {{ __('language.Certificate Code') }}</label>
                            <input type="text" name="certificate_code" class="form-control mb-3">

                            <label><i class="fa-solid fa-calendar"></i> {{ __('language.Issue Date') }}</label>
                            <input type="date" name="issue_date" class="form-control mb-3">

                            <label><i class="fa-solid fa-signal"></i> {{ __('language.Status') }}</label>
                            <select name="status" class="form-control mb-3">
                                <option value="valid">{{ __('language.Valid') }}</option>
                                <option value="revoked">{{ __('language.Revoked') }}</option>
                            </select>

                            <button class="btn btn-success w-100">
                                <i class="fa-solid fa-floppy-disk"></i> {{ __('language.Save Certificate') }}
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
