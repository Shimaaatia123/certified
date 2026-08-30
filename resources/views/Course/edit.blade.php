@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-4">

        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card shadow border-0">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-pen-to-square me-2"></i>
                            {{ __('language.Edit Course') }} #{{ $course->id }}
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <form action="{{ route('courses.update', $course->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            {{-- TITLE AR --}}
                            <label>
                                <i class="fas fa-language text-primary me-1"></i>
                                {{ __('language.Title AR') }}
                            </label>

                            <input type="text" name="title_ar" class="form-control mb-3"
                                value="{{ old('title_ar', $course->title_ar) }}">

                            {{-- TITLE EN --}}
                            <label>
                                <i class="fas fa-language text-success me-1"></i>
                                {{ __('language.Title EN') }}
                            </label>

                            <input type="text" name="title_en" class="form-control mb-3"
                                value="{{ old('title_en', $course->title_en) }}">

                            {{-- DESCRIPTION AR --}}
                            <label>
                                <i class="fas fa-align-right text-primary me-1"></i>
                                {{ __('language.Description AR') }}
                            </label>

                            <textarea name="description_ar" class="form-control mb-3" rows="3">{{ old('description_ar', $course->description_ar) }}</textarea>

                            {{-- DESCRIPTION EN --}}
                            <label>
                                <i class="fas fa-align-left text-success me-1"></i>
                                {{ __('language.Description EN') }}
                            </label>

                            <textarea name="description_en" class="form-control mb-3" rows="3">{{ old('description_en', $course->description_en) }}</textarea>

                            {{-- PRICE --}}
                            <label>
                                <i class="fas fa-dollar-sign text-warning me-1"></i>
                                {{ __('language.Price') }}
                            </label>

                            <input type="number" step="0.01" name="price" class="form-control mb-3"
                                value="{{ old('price', $course->price) }}">

                            {{-- DURATION --}}
                            <label>
                                <i class="fas fa-clock text-info me-1"></i>
                                {{ __('language.Duration') }}
                            </label>

                            <input type="text" name="duration" class="form-control mb-3"
                                value="{{ old('duration', $course->duration) }}">

                            @error('duration')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            {{-- BADGE --}}
                            <label>
                                <i class="fas fa-certificate text-warning me-1"></i>
                                {{ __('language.Badge') }}
                            </label>

                            <input type="text" name="badge" class="form-control mb-3"
                                value="{{ old('badge', $course->badge) }}">

                            @error('badge')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            {{-- IMAGE --}}
                            <label>
                                <i class="fas fa-image text-info me-1"></i>
                                {{ __('language.Image') }}
                            </label>

                            <input type="file" name="image" class="form-control mb-3">

                            @if ($course->image)
                                <div class="mb-3 text-center">
                                    <img src="{{ asset('storage/' . $course->image) }}" width="90" height="90"
                                        class="rounded shadow">
                                </div>
                            @endif

                            {{-- STATUS --}}
                            <label>
                                <i class="fas fa-toggle-on text-success me-1"></i>
                                {{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-4">

                                <option value="1" {{ $course->status == 1 ? 'selected' : '' }}>
                                    {{ __('language.Active') }}
                                </option>

                                <option value="0" {{ $course->status == 0 ? 'selected' : '' }}>
                                    {{ __('language.Inactive') }}
                                </option>

                            </select>

                            {{-- BUTTON --}}
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-circle-check me-1"></i>
                                {{ __('language.Update Course') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
