@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 pt-5 px-4">

        <div class="row">
            <div class="col-lg-11 col-xl-10 m-auto">

                <div class="card border-0 shadow-lg">

                    {{-- HEADER --}}
                    <div class="card-header bg-success text-white text-center py-2">
                        <h6 class="mb-0">
                            <i class="fas fa-circle-plus me-2"></i>
                            {{ __('language.Create Lesson') }}
                        </h6>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body py-2">

                        <form action="{{ route('lessons.store') }}" method="POST">
                            @csrf

                            <div class="row">

                                {{-- LEFT COLUMN --}}
                                <div class="col-md-6">

                                    {{-- COURSE --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-book me-1 text-primary"></i>
                                        {{ __('language.Course') }}
                                    </label>
                                    <input type="number" name="course_id" class="form-control form-control-sm mb-2" value="{{ old('course_id') }}">

                                    @error('course_id')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">{{ $message }}</div>
                                    @enderror

                                    {{-- TITLE AR --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-language me-1 text-success"></i>
                                        {{ __('language.Title AR') }}
                                    </label>
                                    <input type="text" name="title_ar" class="form-control form-control-sm mb-2" value="{{ old('title_ar') }}">

                                    @error('title_ar')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">{{ $message }}</div>
                                    @enderror

                                    {{-- CONTENT AR --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-file-lines me-1 text-success"></i>
                                        {{ __('language.Content AR') }}
                                    </label>
                                    <textarea name="content_ar" class="form-control form-control-sm mb-2" rows="2">{{ old('content_ar') }}</textarea>

                                    @error('content_ar')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">{{ $message }}</div>
                                    @enderror

                                    {{-- VIDEO --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-video me-1 text-danger"></i>
                                        {{ __('language.Video URL') }}
                                    </label>
                                    <input type="url" name="video_url" class="form-control form-control-sm mb-2"
                                        value="{{ old('video_url') }}">

                                    @error('video_url')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">{{ $message }}</div>
                                    @enderror

                                </div>

                                {{-- RIGHT COLUMN --}}
                                <div class="col-md-6">

                                    {{-- TITLE EN --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-language me-1 text-info"></i>
                                        {{ __('language.Title EN') }}
                                    </label>
                                    <input type="text" name="title_en" class="form-control form-control-sm mb-2" value="{{ old('title_en') }}">

                                    @error('title_en')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">{{ $message }}</div>
                                    @enderror

                                    {{-- CONTENT EN --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-file-lines me-1 text-info"></i>
                                        {{ __('language.Content EN') }}
                                    </label>
                                    <textarea name="content_en" class="form-control form-control-sm mb-2" rows="2">{{ old('content_en') }}</textarea>

                                    @error('content_en')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">{{ $message }}</div>
                                    @enderror

                                    {{-- ORDER --}}
                                    <label class="small mb-1">
                                        <i class="fas fa-list-ol me-1 text-warning"></i>
                                        {{ __('language.Order') }}
                                    </label>
                                    <input type="number" name="order" class="form-control form-control-sm mb-2" value="{{ old('order') }}">

                                    @error('order')
                                        <div class="alert alert-danger py-1 px-2 small mb-2">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            {{-- STATUS + BUTTON in one row --}}
                            <div class="row align-items-end">
                                <div class="col-md-8">
                                    <label class="small mb-1">
                                        <i class="fas fa-toggle-on me-1 text-primary"></i>
                                        {{ __('language.Status') }}
                                    </label>

                                    <select name="status" class="form-control form-control-sm">

                                        <option value="">
                                            {{ __('language.Choose Status') }}
                                        </option>

                                        <option value="1">
                                            {{ __('language.Active') }}
                                        </option>

                                        <option value="0">
                                            {{ __('language.Inactive') }}
                                        </option>

                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <button class="btn btn-success btn-sm w-100">
                                        <i class="fas fa-circle-plus me-2"></i>
                                        {{ __('language.Create Lesson') }}
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