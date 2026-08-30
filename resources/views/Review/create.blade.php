@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-success text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-star me-2"></i>
                            {{ __('language.Create Review') }}
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf

                            {{-- USER --}}
                            <label>
                                <i class="fas fa-user me-1 text-primary"></i>
                                {{ __('language.User') }}
                            </label>

                            <input type="number" name="user_id" class="form-control mb-3" value="{{ old('user_id') }}">

                            @error('user_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- COURSE --}}
                            <label>
                                <i class="fas fa-book me-1 text-success"></i>
                                {{ __('language.Course') }}
                            </label>

                            <input type="number" name="course_id" class="form-control mb-3" value="{{ old('course_id') }}">

                            @error('course_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- RATING --}}
                            <label>
                                <i class="fas fa-star me-1 text-warning"></i>
                                {{ __('language.Rating (1-5)') }}
                            </label>

                            <input type="number" name="rating" min="1" max="5" class="form-control mb-3"
                                value="{{ old('rating') }}">

                            @error('rating')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- COMMENT --}}
                            <label>
                                <i class="fas fa-comment-dots me-1 text-info"></i>
                                {{ __('language.Comment') }}
                            </label>

                            <textarea name="comment" rows="4" class="form-control mb-3">{{ old('comment') }}</textarea>

                            @error('comment')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- STATUS --}}
                            <label>
                                <i class="fas fa-toggle-on me-1 text-primary"></i>
                                {{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-4">
                                <option value="">
                                    {{ __('language.Choose Status') }}
                                </option>

                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                                    {{ __('language.Approved') }}
                                </option>

                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                                    {{ __('language.Pending') }}
                                </option>
                            </select>

                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- BUTTON --}}
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-circle-plus me-2"></i>
                                {{ __('language.Save Review') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
