@extends('layouts.app')

@section('content')
<div class="container mt-4 pt-5">

    <div class="row">
        <div class="col-md-10 m-auto">

            <div class="card shadow border-0">

                <div class="card-header bg-success text-white text-center">
                    <i class="fa-solid fa-circle-plus me-2"></i>
                    {{ __('language.Create New Answer') }}
                </div>

                <div class="card-body">

                    <form action="{{ route('answers.store') }}" method="POST">
                        @csrf

                        <!-- ID -->
                        <label class="form-label">
                            <i class="fa-solid fa-fingerprint text-info me-2"></i>
                            {{ __('language.ID💎') }}
                        </label>
                        <input type="text" name="id" class="form-control mb-2" value="{{ old('id') }}">

                        @error('id')
                            <div class="alert alert-danger py-1">{{ $message }}</div>
                        @enderror


                        <!-- Question ID -->
                        <label class="form-label">
                            <i class="fa-solid fa-circle-question text-primary me-2"></i>
                            {{ __('language.Question ID') }}
                        </label>
                        <input type="number" name="question_id" class="form-control mb-2" value="{{ old('question_id') }}">

                        @error('question_id')
                            <div class="alert alert-danger py-1">{{ $message }}</div>
                        @enderror


                        <!-- Answer Arabic -->
                        <label class="form-label">
                            <i class="fa-solid fa-language text-success me-2"></i>
                            {{ __('language.Answer Arabic') }}
                        </label>
                        <textarea name="answer_ar" class="form-control mb-2" rows="3">{{ old('answer_ar') }}</textarea>

                        @error('answer_ar')
                            <div class="alert alert-danger py-1">{{ $message }}</div>
                        @enderror


                        <!-- Answer English -->
                        <label class="form-label">
                            <i class="fa-solid fa-font text-warning me-2"></i>
                            {{ __('language.Answer English') }}
                        </label>
                        <textarea name="answer_en" class="form-control mb-2" rows="3">{{ old('answer_en') }}</textarea>

                        @error('answer_en')
                            <div class="alert alert-danger py-1">{{ $message }}</div>
                        @enderror


                        <!-- Is Correct -->
                        <label class="form-label">
                            <i class="fa-solid fa-check-circle text-danger me-2"></i>
                            {{ __('language.Is Correct?') }}
                        </label>

                        <select name="is_correct" class="form-control mb-3">
                            <option value="">{{ __('language.Is Correct?') }}</option>

                            <option value="1" {{ old('is_correct') == '1' ? 'selected' : '' }}>
                                ✔ {{ __('language.Yes') }}
                            </option>

                            <option value="0" {{ old('is_correct') == '0' ? 'selected' : '' }}>
                                ✖ {{ __('language.No') }}
                            </option>
                        </select>

                        @error('is_correct')
                            <div class="alert alert-danger py-1">{{ $message }}</div>
                        @enderror


                        <!-- Submit -->
                        <button type="submit" class="btn btn-success w-100 py-2">
                            <i class="fa-solid fa-floppy-disk me-2"></i>
                            {{ __('language.Create New Answer') }}
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection