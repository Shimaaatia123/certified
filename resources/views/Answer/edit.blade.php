@extends('layouts.app')

@section('content')
    <div class="container mt-3 pt-5">

        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card shadow border-0">

                    <div class="card-header bg-warning text-dark text-center">
                        <i class="fa-solid fa-pen-to-square me-2"></i>
                        {{ __('language.✨Edit Answer #') }}{{ $answer->id }}
                    </div>

                    <div class="card-body">

                        <form action="{{ route('answers.update', $answer->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- ID -->
                            <label class="form-label">
                                <i class="fa-solid fa-hashtag text-info me-2"></i>
                                {{ __('language.ID💎') }}
                            </label>
                            <input type="text" name="id" value="{{ $answer->id }}" class="form-control mb-3">

                            <!-- Question ID -->
                            <label class="form-label">
                                <i class="fa-solid fa-circle-question text-primary me-2"></i>
                                {{ __('language.Question ID') }}
                            </label>
                            <input type="number" name="question_id" value="{{ $answer->question_id }}"
                                class="form-control mb-3">

                            <!-- Answer Arabic -->
                            <label class="form-label">
                                <i class="fa-solid fa-language text-success me-2"></i>
                                {{ __('language.Answer Arabic') }}
                            </label>
                            <textarea name="answer_ar" class="form-control mb-3" rows="3">{{ $answer->answer_ar }}</textarea>

                            <!-- Answer English -->
                            <label class="form-label">
                                <i class="fa-solid fa-font text-warning me-2"></i>
                                {{ __('language.Answer English') }}
                            </label>
                            <textarea name="answer_en" class="form-control mb-3" rows="3">{{ $answer->answer_en }}</textarea>

                            <!-- Is Correct -->
                            <label class="form-label">
                                <i class="fa-solid fa-check-circle text-danger me-2"></i>
                                {{ __('language.Is Correct?') }}
                            </label>

                            <select name="is_correct" class="form-control mb-3">
                                <option value="1" {{ $answer->is_correct == 1 ? 'selected' : '' }}>
                                    ✔ {{ __('language.Yes') }}
                                </option>

                                <option value="0" {{ $answer->is_correct == 0 ? 'selected' : '' }}>
                                    ✖ {{ __('language.No') }}
                                </option>
                            </select>

                            <!-- Submit -->
                            <button class="btn btn-primary w-100 py-2">
                                <i class="fa-solid fa-floppy-disk me-2"></i>
                                {{ __('language.Update Answer') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
