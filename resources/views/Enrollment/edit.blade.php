@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-7 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0"><i
                                class="fas fa-user-edit me-2"></i>{{ __('language.Edit Enrollment #') }}{{ $enrollment->id }}
                        </h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label> <i class="fas fa-user me-1 text-primary"></i>
                                {{ __('language.User ID') }}</label>
                            <input type="number" name="user_id" class="form-control mb-3"
                                value="{{ old('user_id', $enrollment->user_id) }}">

                            <label><i class="fas fa-book-open me-1 text-success"></i>{{ __('language.Course ID') }}</label>
                            <input type="number" name="course_id" class="form-control mb-3"
                                value="{{ old('course_id', $enrollment->course_id) }}">

                            <label> <i
                                    class="fas fa-calendar-alt me-1 text-warning"></i>{{ __('language.Enrollment Date') }}</label>
                            <input type="date" name="enrollment_date" class="form-control mb-3"
                                value="{{ old('enrollment_date', $enrollment->enrollment_date) }}">

                            <label>
                                <i class="fas fa-toggle-on me-1 text-info"></i>{{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-3">
                                <option value="pending"
                                    {{ old('status', $enrollment->status) == 'pending' ? 'selected' : '' }}>
                                    {{ __('language.Pending') }}
                                </option>

                                <option value="active"
                                    {{ old('status', $enrollment->status) == 'active' ? 'selected' : '' }}>
                                    {{ __('language.Active') }}
                                </option>

                                <option value="completed"
                                    {{ old('status', $enrollment->status) == 'completed' ? 'selected' : '' }}>
                                    {{ __('language.Completed') }}
                                </option>
                            </select>

                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <button class="btn btn-primary w-100">
                                <i class="fas fa-save me-2"></i>{{ __('language.Update Enrollment') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
