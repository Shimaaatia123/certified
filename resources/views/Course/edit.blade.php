@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 pt-5 px-4">

        <div class="row">
            <div class="col-lg-11 col-xl-10 m-auto">

                <div class="card shadow border-0">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white text-center py-2">
                        <h6 class="mb-0">
                            <i class="fas fa-pen-to-square me-2"></i>
                            {{ __('language.Edit Course') }} #{{ $course->id }}
                        </h6>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body py-2">

                        <form action="{{ route('courses.update', $course->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="row">

                                {{-- LEFT COLUMN --}}
                                <div class="col-md-6">

                                    {{-- TITLE AR --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-language text-primary me-1"></i>
                                        {{ __('language.Title AR') }}
                                    </label>

                                    <input type="text" name="title_ar" class="form-control form-control-sm mb-2"
                                        value="{{ old('title_ar', $course->title_ar) }}">

                                    {{-- DESCRIPTION AR --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-align-right text-primary me-1"></i>
                                        {{ __('language.Description AR') }}
                                    </label>

                                    <textarea name="description_ar" class="form-control form-control-sm mb-2" rows="2">{{ old('description_ar', $course->description_ar) }}</textarea>

                                    {{-- PRICE --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-dollar-sign text-warning me-1"></i>
                                        {{ __('language.Price') }}
                                    </label>

                                    <input type="number" step="0.01" name="price" class="form-control form-control-sm mb-2"
                                        value="{{ old('price', $course->price) }}">

                                    {{-- BADGE --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-certificate text-warning me-1"></i>
                                        {{ __('language.Badge') }}
                                    </label>

                                    <input type="text" name="badge" class="form-control form-control-sm mb-2"
                                        value="{{ old('badge', $course->badge) }}">

                                    @error('badge')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">{{ $message }}</div>
                                    @enderror

                                </div>

                                {{-- RIGHT COLUMN --}}
                                <div class="col-md-6">

                                    {{-- TITLE EN --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-language text-success me-1"></i>
                                        {{ __('language.Title EN') }}
                                    </label>

                                    <input type="text" name="title_en" class="form-control form-control-sm mb-2"
                                        value="{{ old('title_en', $course->title_en) }}">

                                    {{-- DESCRIPTION EN --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-align-left text-success me-1"></i>
                                        {{ __('language.Description EN') }}
                                    </label>

                                    <textarea name="description_en" class="form-control form-control-sm mb-2" rows="2">{{ old('description_en', $course->description_en) }}</textarea>

                                    {{-- DURATION --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-clock text-info me-1"></i>
                                        {{ __('language.Duration') }}
                                    </label>

                                    <input type="text" name="duration" class="form-control form-control-sm mb-2"
                                        value="{{ old('duration', $course->duration) }}">

                                    @error('duration')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">{{ $message }}</div>
                                    @enderror

                                    {{-- IMAGE --}}
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <div class="flex-grow-1">
                                            <label class="small mb-1">
                                                <i class="fas fa-image text-info me-1"></i>
                                                {{ __('language.Image') }}
                                            </label>
                                            <input type="file" name="image" class="form-control form-control-sm">
                                        </div>

                                        @if ($course->image)
                                            <img src="{{ asset('storage/' . $course->image) }}" width="45" height="45"
                                                class="rounded shadow">
                                        @endif
                                    </div>

                                </div>

                            </div>

                            {{-- STATUS + BUTTON in one row --}}
                            <div class="row align-items-end">
                                <div class="col-md-8">
                                    <label class="small mb-1">
                                        <i class="fas fa-toggle-on text-success me-1"></i>
                                        {{ __('language.Status') }}
                                    </label>

                                    <select name="status" class="form-control form-control-sm">

                                        <option value="1" {{ $course->status == 1 ? 'selected' : '' }}>
                                            {{ __('language.Active') }}
                                        </option>

                                        <option value="0" {{ $course->status == 0 ? 'selected' : '' }}>
                                            {{ __('language.Inactive') }}
                                        </option>

                                    </select>
                                </div>

                                <div class="col-md-4">
                                    {{-- BUTTON --}}
                                    <button type="submit" class="btn btn-primary btn-sm w-100">
                                        <i class="fas fa-circle-check me-1"></i>
                                        {{ __('language.Update Course') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection