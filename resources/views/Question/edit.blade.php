@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-warning text-dark text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-pen-to-square me-2"></i>
                            {{ __('language.Edit Question') }}

                            <span class="badge bg-dark ms-2">
                                #{{ $question->id }}
                            </span>
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <form action="{{ route('questions.update', $question->id) }}" method="POST">

                            @csrf
                            @method('PUT')

                            {{-- EXAM --}}
                            <label>
                                <i class="fas fa-file-lines me-1 text-primary"></i>
                                {{ __('language.Exam') }}
                            </label>

                            <input type="number" name="exam_id" class="form-control mb-3"
                                value="{{ old('exam_id', $question->exam_id) }}">

                            {{-- QUESTION AR --}}
                            <label>
                                <i class="fas fa-language me-1 text-success"></i>
                                {{ __('language.Question AR') }}
                            </label>

                            <textarea name="question_ar" class="form-control mb-3" rows="3">{{ old('question_ar', $question->question_ar) }}</textarea>

                            {{-- QUESTION EN --}}
                            <label>
                                <i class="fas fa-language me-1 text-info"></i>
                                {{ __('language.Question EN') }}
                            </label>

                            <textarea name="question_en" class="form-control mb-3" rows="3">{{ old('question_en', $question->question_en) }}</textarea>

                            {{-- MARK --}}
                            <label>
                                <i class="fas fa-star me-1 text-warning"></i>
                                {{ __('language.Mark') }}
                            </label>

                            <input type="number" name="mark" class="form-control mb-3"
                                value="{{ old('mark', $question->mark) }}">

                            {{-- TYPE --}}
                            <label>
                                <i class="fas fa-list-check me-1 text-primary"></i>
                                {{ __('language.Type') }}
                            </label>

                            <select name="type" class="form-control mb-4">

                                <option value="mcq" {{ $question->type == 'mcq' ? 'selected' : '' }}>
                                    {{ __('language.MCQ') }}
                                </option>

                                <option value="true_false" {{ $question->type == 'true_false' ? 'selected' : '' }}>
                                    {{ __('language.True/False') }}
                                </option>

                                <option value="text" {{ $question->type == 'text' ? 'selected' : '' }}>
                                    {{ __('language.Text') }}
                                </option>

                            </select>

                            {{-- BUTTON --}}
                            <button class="btn btn-warning w-100">
                                <i class="fas fa-floppy-disk me-2"></i>
                                {{ __('language.Update Question') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
