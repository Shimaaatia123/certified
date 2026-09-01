@extends('layouts.app')

@section('content')
    <div class="container mt-3 pt-3" style="margin-top: 100px !important;">
        <div class="row">
            <div class="col-md-7 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-dark text-white text-center">
                        <h5 class="mb-0"><i class="fas fa-user-graduate me-2"></i>{{ __('language.Create Enrollment') }}
                        </h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('enrollments.store') }}" method="POST">
                            @csrf

                            <label><i class="fas fa-user me-1 text-primary"></i>{{ __('language.User ID') }}</label>
                            <input type="number" name="user_id" class="form-control mb-3" value="{{ old('user_id') }}">
                            @error('user_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label><i class="fas fa-book-open me-1 text-success"></i>{{ __('language.Course ID') }}</label>
                            <input type="number" name="course_id" class="form-control mb-3" value="{{ old('course_id') }}">
                            @error('course_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label><i class="fas fa-calendar-alt me-1 text-warning"></i>
                                {{ __('language.Enrollment Date') }}</label>
                            <input type="date" name="enrollment_date" class="form-control mb-3"
                                value="{{ old('enrollment_date') }}">
                            @error('enrollment_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label>
                                <i class="fas fa-toggle-on me-1 text-info"></i>{{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-3">
                                <option value="">{{ __('language.Choose Status') }}</option>
                                <option value="pending">{{ __('language.Pending') }}</option>
                                <option value="active">{{ __('language.Active') }}</option>
                                <option value="completed">{{ __('language.Completed') }}</option>
                            </select>

                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <button class="btn btn-success w-100">
                                <i class="fas fa-plus-circle me-2"></i>{{ __('language.✨Create NEW Enrollment') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
