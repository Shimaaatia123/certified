@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-warning text-dark text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-pen-to-square me-2"></i>
                            {{ __('language.Edit Exam') }}
                            <span class="badge bg-dark ms-2">
                                #{{ $exam->id }}
                            </span>
                        </h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('exams.update', $exam->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label>
                                <i class="fas fa-book-open text-primary me-1"></i>
                                {{ __('language.Course ID') }}
                            </label>
                            <input type="number" name="course_id" class="form-control mb-3"
                                value="{{ old('course_id', $exam->course_id) }}">

                            <label>
                                <i class="fas fa-language text-success me-1"></i>
                                {{ __('language.Title AR') }}
                            </label>
                            <input type="text" name="title_ar" class="form-control mb-3"
                                value="{{ old('title_ar', $exam->title_ar) }}">

                            <label>
                                <i class="fas fa-language text-info me-1"></i>
                                {{ __('language.Title EN') }}
                            </label>
                            <input type="text" name="title_en" class="form-control mb-3"
                                value="{{ old('title_en', $exam->title_en) }}">

                            <label>
                                <i class="fas fa-star text-warning me-1"></i>
                                {{ __('language.Total Marks') }}
                            </label>
                            <input type="number" name="total_marks" class="form-control mb-3"
                                value="{{ old('total_marks', $exam->total_marks) }}">

                            <label>
                                <i class="fas fa-check-circle text-success me-1"></i>
                                {{ __('language.Pass Marks') }}
                            </label>
                            <input type="number" name="pass_marks" class="form-control mb-3"
                                value="{{ old('pass_marks', $exam->pass_marks) }}">

                            <label>
                                <i class="fas fa-clock text-danger me-1"></i>
                                {{ __('language.Duration') }}
                            </label>
                            <input type="number" name="duration" class="form-control mb-3"
                                value="{{ old('duration', $exam->duration) }}">

                            <label>
                                <i class="fas fa-toggle-on text-primary me-1"></i>
                                {{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-4">
                                <option value="1" {{ $exam->status == 1 ? 'selected' : '' }}>
                                    {{ __('language.Active') }}
                                </option>

                                <option value="0" {{ $exam->status == 0 ? 'selected' : '' }}>
                                    {{ __('language.Inactive') }}
                                </option>
                            </select>

                            <button class="btn btn-warning w-100">
                                <i class="fas fa-save me-2"></i>
                                {{ __('language.Update Exam') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
