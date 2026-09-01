@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-5">

        <div class="row">
            <div class="col-md-7 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-warning text-dark text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-pen-to-square me-2"></i>
                            {{ __('language.Edit Result') }}

                            <span class="badge bg-dark ms-2">
                                #{{ $result->id }}
                            </span>
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <form action="{{ route('results.update', $result->id) }}" method="POST">

                            @csrf
                            @method('PUT')

                            {{-- USER --}}
                            <label>
                                <i class="fas fa-user me-1 text-primary"></i>
                                {{ __('language.User') }}
                            </label>

                            <input type="number" name="user_id" class="form-control mb-3"
                                value="{{ old('user_id', $result->user_id) }}">

                            {{-- EXAM --}}
                            <label>
                                <i class="fas fa-book me-1 text-success"></i>
                                {{ __('language.Exam') }}
                            </label>

                            <input type="number" name="exam_id" class="form-control mb-3"
                                value="{{ old('exam_id', $result->exam_id) }}">

                            {{-- SCORE --}}
                            <label>
                                <i class="fas fa-arrow-trend-up me-1 text-info"></i>
                                {{ __('language.Score') }}
                            </label>

                            <input type="number" name="score" class="form-control mb-3"
                                value="{{ old('score', $result->score) }}">

                            {{-- TOTAL --}}
                            <label>
                                <i class="fas fa-calculator me-1 text-dark"></i>
                                {{ __('language.Total') }}
                            </label>

                            <input type="number" name="total" class="form-control mb-3"
                                value="{{ old('total', $result->total) }}">

                            {{-- STATUS --}}
                            <label>
                                <i class="fas fa-circle-check me-1 text-primary"></i>
                                {{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-4">

                                <option value="pass" {{ $result->status == 'pass' ? 'selected' : '' }}>
                                    <i class="fas fa-check"></i>
                                    {{ __('language.Pass') }}
                                </option>

                                <option value="fail" {{ $result->status == 'fail' ? 'selected' : '' }}>
                                    <i class="fas fa-xmark"></i>
                                    {{ __('language.Fail') }}
                                </option>

                            </select>

                            {{-- BUTTON --}}
                            <button class="btn btn-warning w-100">
                                <i class="fas fa-floppy-disk me-2"></i>
                                {{ __('language.Update Result') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
