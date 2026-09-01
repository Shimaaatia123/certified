@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-4">

        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-warning text-dark text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-pen-to-square me-2"></i>
                            {{ __('language.Edit Review') }}
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- USER --}}
                            <label>
                                <i class="fas fa-user me-1 text-primary"></i>
                                {{ __('language.User') }}
                            </label>

                            <input type="number" name="user_id" class="form-control mb-3"
                                value="{{ old('user_id', $review->user_id) }}">

                            {{-- COURSE --}}
                            <label>
                                <i class="fas fa-book me-1 text-success"></i>
                                {{ __('language.Course') }}
                            </label>

                            <input type="number" name="course_id" class="form-control mb-3"
                                value="{{ old('course_id', $review->course_id) }}">

                            {{-- RATING --}}
                            <label>
                                <i class="fas fa-star me-1 text-warning"></i>
                                {{ __('language.Rating') }}
                            </label>

                            <input type="number" name="rating" min="1" max="5" class="form-control mb-3"
                                value="{{ old('rating', $review->rating) }}">

                            {{-- COMMENT --}}
                            <label>
                                <i class="fas fa-comment-dots me-1 text-info"></i>
                                {{ __('language.Comment') }}
                            </label>

                            <textarea name="comment" rows="4" class="form-control mb-3">{{ old('comment', $review->comment) }}</textarea>
                            {{-- STATUS --}}
                            <label>
                                <i class="fas fa-toggle-on me-1 text-primary"></i>
                                {{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-4">
                                <option value="1" {{ old('status', $review->status) == 1 ? 'selected' : '' }}>
                                    {{ __('language.Approved') }}
                                </option>

                                <option value="0" {{ old('status', $review->status) == 0 ? 'selected' : '' }}>
                                    {{ __('language.Pending') }}
                                </option>
                            </select>

                            {{-- BUTTON --}}
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-circle-check me-2"></i>
                                {{ __('language.Update Review') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
