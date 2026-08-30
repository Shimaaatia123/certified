@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-7 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-success text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-circle-plus me-2"></i>
                            {{ __('language.Create Result🔴') }}
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <form action="{{ route('results.store') }}" method="POST">
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

                            {{-- EXAM --}}
                            <label>
                                <i class="fas fa-book me-1 text-success"></i>
                                {{ __('language.Exam') }}
                            </label>

                            <input type="number" name="exam_id" class="form-control mb-3" value="{{ old('exam_id') }}">

                            @error('exam_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- SCORE --}}
                            <label>
                                <i class="fas fa-arrow-trend-up me-1 text-info"></i>
                                {{ __('language.Score') }}
                            </label>

                            <input type="number" name="score" class="form-control mb-3" value="{{ old('score') }}">

                            @error('score')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- TOTAL --}}
                            <label>
                                <i class="fas fa-calculator me-1 text-dark"></i>
                                {{ __('language.Total') }}
                            </label>

                            <input type="number" name="total" class="form-control mb-3" value="{{ old('total') }}">

                            @error('total')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- STATUS --}}
                            <label>
                                <i class="fas fa-circle-check me-1 text-primary"></i>
                                {{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-4">

                                <option value="">
                                    {{ __('language.Choose Status') }}
                                </option>

                                <option value="pass">
                                    {{ __('language.Pass') }}
                                </option>

                                <option value="fail">
                                    {{ __('language.Fail') }}
                                </option>

                            </select>

                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- BUTTON --}}
                            <button class="btn btn-success w-100">
                                <i class="fas fa-floppy-disk me-2"></i>
                                {{ __('language.Save Result') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
