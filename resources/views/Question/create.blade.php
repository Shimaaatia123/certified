@extends('layouts.app')

@section('content')
    <div class="container mt-4 pt-5">

        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-success text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-circle-plus me-2"></i>
                            {{ __('language.Create Question') }}
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <form action="{{ route('questions.store') }}" method="POST">
                            @csrf

                            {{-- EXAM --}}
                            <label>
                                <i class="fas fa-file-lines me-1 text-primary"></i>
                                {{ __('language.Exam') }}
                            </label>

                            <input type="number" name="exam_id" class="form-control mb-3" value="{{ old('exam_id') }}">

                            @error('exam_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- QUESTION AR --}}
                            <label>
                                <i class="fas fa-language me-1 text-success"></i>
                                {{ __('language.Question AR') }}
                            </label>

                            <textarea name="question_ar" class="form-control mb-3" rows="3">{{ old('question_ar') }}</textarea>

                            @error('question_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- QUESTION EN --}}
                            <label>
                                <i class="fas fa-language me-1 text-info"></i>
                                {{ __('language.Question EN') }}
                            </label>

                            <textarea name="question_en" class="form-control mb-3" rows="3">{{ old('question_en') }}</textarea>

                            @error('question_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- MARK --}}
                            <label>
                                <i class="fas fa-star me-1 text-warning"></i>
                                {{ __('language.Mark') }}
                            </label>

                            <input type="number" name="mark" class="form-control mb-3" value="{{ old('mark', 1) }}">

                            @error('mark')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- TYPE --}}
                            <label>
                                <i class="fas fa-list-check me-1 text-primary"></i>
                                {{ __('language.Type') }}
                            </label>

                            <select name="type" class="form-control mb-4">

                                <option value="">
                                    {{ __('language.Choose Type') }}
                                </option>

                                <option value="mcq">
                                    {{ __('language.MCQ') }}
                                </option>

                                <option value="true_false">
                                    {{ __('language.True/False') }}
                                </option>

                                <option value="text">
                                    {{ __('language.Text') }}
                                </option>

                            </select>

                            @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- BUTTON --}}
                            <button class="btn btn-success w-100">
                                <i class="fas fa-circle-plus me-2"></i>
                                {{ __('language.Create Question') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
