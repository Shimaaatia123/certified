@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-success text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-file-circle-plus me-2"></i>
                            {{ __('language.Create New Exam🔵') }}
                        </h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('exams.store') }}" method="POST">
                            @csrf

                            <label>
                                <i class="fas fa-book-open text-primary me-1"></i>
                                {{ __('language.Course ID') }}
                            </label>
                            <input type="number" name="course_id" class="form-control mb-3" value="{{ old('course_id') }}">
                            @error('course_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label>
                                <i class="fas fa-language text-success me-1"></i>
                                {{ __('language.Title AR') }}
                            </label>
                            <input type="text" name="title_ar" class="form-control mb-3" value="{{ old('title_ar') }}">
                            @error('title_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label>
                                <i class="fas fa-language text-info me-1"></i>
                                {{ __('language.Title EN') }}
                            </label>
                            <input type="text" name="title_en" class="form-control mb-3" value="{{ old('title_en') }}">
                            @error('title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label>
                                <i class="fas fa-star text-warning me-1"></i>
                                {{ __('language.Total Marks') }}
                            </label>
                            <input type="number" name="total_marks" class="form-control mb-3"
                                value="{{ old('total_marks') }}">
                            @error('total_marks')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label>
                                <i class="fas fa-check-circle text-success me-1"></i>
                                {{ __('language.Pass Marks') }}
                            </label>
                            <input type="number" name="pass_marks" class="form-control mb-3"
                                value="{{ old('pass_marks') }}">
                            @error('pass_marks')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label>
                                <i class="fas fa-clock text-danger me-1"></i>
                                {{ __('language.Duration (Minutes)') }}
                            </label>
                            <input type="number" name="duration" class="form-control mb-3" value="{{ old('duration') }}">
                            @error('duration')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label>
                                <i class="fas fa-toggle-on text-primary me-1"></i>
                                {{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-4">
                                <option value="">
                                    {{ __('language.Choose Status') }}
                                </option>

                                <option value="1">
                                    {{ __('language.Active') }}
                                </option>

                                <option value="0">
                                    {{ __('language.Inactive') }}
                                </option>
                            </select>

                            <button class="btn btn-success w-100">
                                <i class="fas fa-file-circle-plus me-2"></i>
                                {{ __('language.Create Exam') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
