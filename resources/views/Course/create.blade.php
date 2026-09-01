@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 pt-5 px-4">

        <div class="row">
            <div class="col-lg-11 col-xl-10 m-auto">

                <div class="card shadow border-0">

                    {{-- HEADER --}}
                    <div class="card-header bg-success text-white text-center">
                        <h5 class="mb-0">
                            <i class="fas fa-layer-group me-2"></i>
                            {{ __('language.Create Course') }}
                        </h5>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                {{-- LEFT COLUMN --}}
                                <div class="col-md-6">

                                    {{-- TITLE AR --}}
                                    <label>
                                        <i class="fas fa-language text-primary me-1"></i>
                                        {{ __('language.Title AR') }}
                                    </label>

                                    <input type="text" name="title_ar" class="form-control mb-3" value="{{ old('title_ar') }}">

                                    @error('title_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    {{-- DESCRIPTION AR --}}
                                    <label>
                                        <i class="fas fa-align-right text-primary me-1"></i>
                                        {{ __('language.Description AR') }}
                                    </label>

                                    <textarea name="description_ar" class="form-control mb-3" rows="3">{{ old('description_ar') }}</textarea>

                                    {{-- PRICE --}}
                                    <label>
                                        <i class="fas fa-dollar-sign text-warning me-1"></i>
                                        {{ __('language.Price') }}
                                    </label>

                                    <input type="number" step="0.01" name="price" class="form-control mb-3"
                                        value="{{ old('price') }}">

                                    {{-- BADGE --}}
                                    <label>
                                        <i class="fas fa-certificate text-warning me-1"></i>
                                        {{ __('language.Badge') }}
                                    </label>

                                    <input type="text" name="badge" class="form-control mb-3" value="{{ old('badge') }}"
                                        placeholder="{{ __('language.Badge') }}">

                                    @error('badge')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                {{-- RIGHT COLUMN --}}
                                <div class="col-md-6">

                                    {{-- TITLE EN --}}
                                    <label>
                                        <i class="fas fa-language text-success me-1"></i>
                                        {{ __('language.Title EN') }}
                                    </label>

                                    <input type="text" name="title_en" class="form-control mb-3" value="{{ old('title_en') }}">

                                    @error('title_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    {{-- DESCRIPTION EN --}}
                                    <label>
                                        <i class="fas fa-align-left text-success me-1"></i>
                                        {{ __('language.Description EN') }}
                                    </label>

                                    <textarea name="description_en" class="form-control mb-3" rows="3">{{ old('description_en') }}</textarea>

                                    {{-- DURATION --}}
                                    <label>
                                        <i class="fas fa-clock text-info me-1"></i>
                                        {{ __('language.Duration') }}
                                    </label>

                                    <input type="text" name="duration" class="form-control mb-3" value="{{ old('duration') }}"
                                        placeholder="{{ __('language.Duration') }}">

                                    @error('duration')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    {{-- IMAGE --}}
                                    <label>
                                        <i class="fas fa-image text-info me-1"></i>
                                        {{ __('language.Image') }}
                                    </label>

                                    <input type="file" name="image" class="form-control mb-3">

                                </div>

                            </div>

                            {{-- STATUS (full width) --}}
                            <label>
                                <i class="fas fa-toggle-on text-success me-1"></i>
                                {{ __('language.Status') }}
                            </label>

                            <select name="status" class="form-control mb-4">

                                <option value="">
                                    {{ __('language.Choose Status') }}
                                </option>

                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                    {{ __('language.Active') }}
                                </option>

                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                    {{ __('language.Inactive') }}
                                </option>

                            </select>

                            {{-- BUTTON --}}
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-circle-plus me-1"></i>
                                {{ __('language.Create Course') }}
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection